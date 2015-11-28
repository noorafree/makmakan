<?php

namespace backend\controllers;

use Yii;
use common\models\Carousel;
use common\models\CarouselSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\models\Status;
use yii\web\UploadedFile;

/**
 * CarouselController implements the CRUD actions for Carousel model.
 */
class CarouselController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Carousel models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CarouselSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Carousel model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Carousel model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Carousel();

        if ($model->load(Yii::$app->request->post())) {
            $model->created_by = Yii::$app->user->identity->username;
            $model->created_date = date('Y-m-d h:m:s');
            $model->modified_by = Yii::$app->user->identity->username;
            $model->modified_date = date('Y-m-d h:m:s');
            $model->status = Status::STATUS_ACTIVE;

            $imageName = substr(md5(rand()), 0, 7);
            if (UploadedFile::getInstance($model, 'file')) {
                $model->file = UploadedFile::getInstance($model, 'file');
                $model->caption = $imageName;
                $model->image_path = 'uploads/carousel/' . $model->file->baseName . $imageName . '.' . $model->file->extension;
            }

            if ($model->save()) {
                $model->file->saveAs('uploads/carousel/' . $model->file->baseName . $imageName . '.' . $model->file->extension);
                Yii::$app->session->setFlash('success', 'Insert Success.');
                return $this->redirect(['view', 'id' => $model->id]);
            } else {
                Yii::$app->session->setFlash('error', 'Insert Failed.');
                return $this->render('create', [
                    'model' => $model,
                ]);
            }

        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Carousel model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $imageName = "";
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $model->modified_by = Yii::$app->user->identity->username;
            $model->modified_date = date('Y-m-d h:m:s');

            $model->file = UploadedFile::getInstance($model, 'file');
            if (isset($model->file->extension)) {
                unlink(getcwd() . '/' . $model->image_path);

                $imageName = substr(md5(rand()), 0, 7);
                if (UploadedFile::getInstance($model, 'file')) {
                    $model->file = UploadedFile::getInstance($model, 'file');
                    $model->caption = $imageName;
                    $model->image_path = 'uploads/carousel/' . $model->file->baseName . $imageName . '.' . $model->file->extension;
                }
            }

            if ($model->validate() && $model->save()) {
                if (isset($model->file->extension)) {
                    $model->file->saveAs('uploads/carousel/' . $model->file->baseName . $imageName . '.' . $model->file->extension);
                }
                Yii::$app->session->setFlash('success', 'Update Success.');
                return $this->redirect(['view', 'id' => $model->id]);
            }

            Yii::$app->session->setFlash('success', 'Update Success.');
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Carousel model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);

        if (Yii::$app->request->post()) {
            if ($model !== null) {
                $model->status = STATUS::STATUS_DELETED;
                $model->update(array('status'));
            }

            if (!isset($_GET['ajax'])) {
                Yii::$app->session->setFlash('success', 'Delete Success.');
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
            }
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    /**
     * Finds the Carousel model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Carousel the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Carousel::findOne(['id' => $id, 'status' => [STATUS::STATUS_ACTIVE, STATUS::STATUS_INACTIVE]])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionInactive($id)
    {
        $model = $this->findModel($id);
        if (Yii::$app->request->post()) {
            if ($model !== null) {
                $model->status = STATUS::STATUS_INACTIVE;
                $model->update(array('status'));
            }

            if (!isset($_GET['ajax'])) {
                Yii::$app->session->setFlash('success', 'Inactive Success.');
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
            }
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionActive($id)
    {
        $model = $this->findModel($id);
        if (Yii::$app->request->post()) {
            if ($model !== null) {
                $model->status = Status::STATUS_ACTIVE;
                $model->update(array('status'));
            }

            if (!isset($_GET['ajax'])) {
                Yii::$app->session->setFlash('success', 'Activate Success.');
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
            }
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
