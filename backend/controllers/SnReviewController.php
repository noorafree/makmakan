<?php

namespace backend\controllers;

use Yii;
use common\models\SnReview;
use common\models\SnReviewSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\models\Status;
use yii\web\UploadedFile;

/**
 * SnReviewController implements the CRUD actions for SnReview model.
 */
class SnReviewController extends Controller {

    public function behaviors() {
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
     * Lists all SnReview models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new SnReviewSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single SnReview model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new SnReview model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new SnReview(['scenario' => 'sn-review-create']);

        if ($model->load(Yii::$app->request->post())) {
            $model->created_by = Yii::$app->user->identity->username;
            $model->created_date = date('Y-m-d h:m:s');
            $model->modified_by = Yii::$app->user->identity->username;
            $model->modified_date = date('Y-m-d h:m:s');
            $model->status = Status::STATUS_ACTIVE;

            $imageName = substr(md5(rand()), 0, 7);
            if (UploadedFile::getInstance($model, 'file')) {
                $model->file = UploadedFile::getInstance($model, 'file');
                $model->icon_path = 'uploads/sn-review/' . $imageName . '.' . $model->file->extension;
            }

            if ($model->validate() && $model->save()) {
                $model->file->saveAs('uploads/sn-review/' . $imageName . '.' . $model->file->extension);
                return $this->redirect(['view', 'id' => $model->id]);
            }
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing SnReview model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);
        $model->setScenario('sn-review-update');
        if ($model->load(Yii::$app->request->post())) {
            $model->modified_by = Yii::$app->user->identity->username;
            $model->modified_date = date('Y-m-d h:m:s');

            $model->file = UploadedFile::getInstance($model, 'file');
            if (isset($model->file->extension)) {
                unlink(getcwd() . '/' . $model->icon_path);

                $imageName = substr(md5(rand()), 0, 7);
                if (UploadedFile::getInstance($model, 'file')) {
                    $model->file = UploadedFile::getInstance($model, 'file');
                    $model->icon_path = 'uploads/sn-review/' . $imageName . '.' . $model->file->extension;
                }
            }

            if ($model->validate() && $model->save()) {
                if (isset($model->file->extension)) {
                    $model->file->saveAs('uploads/sn-review/' . $imageName . '.' . $model->file->extension);
                }
                return $this->redirect(['view', 'id' => $model->id]);
            }
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Faq model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        $model = $this->findModel($id);
        $model->setScenario('sn-review-status');
        if (Yii::$app->request->post()) {
            if ($model !== null) {
                $model->status = Status::STATUS_DELETED;
                $model->update(array('status'));
            }

            if (!isset($_GET['ajax']))
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionInactive($id) {
        $model = $this->findModel($id);
        $model->setScenario('sn-review-status');
        if (Yii::$app->request->post()) {
            if ($model !== null) {
                $model->status = Status::STATUS_INACTIVE;
                $model->update(array('status'));
            }

            if (!isset($_GET['ajax']))
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionActive($id) {
        $model = $this->findModel($id);
        $model->setScenario('sn-review-status');
        if (Yii::$app->request->post()) {
            if ($model !== null) {
                $model->status = Status::STATUS_ACTIVE;
                $model->update(array('status'));
            }

            if (!isset($_GET['ajax']))
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    /**
     * Finds the SnReview model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return SnReview the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = SnReview::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
