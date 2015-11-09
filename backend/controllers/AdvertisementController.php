<?php

namespace backend\controllers;

use Yii;
use common\models\Advertisement;
use common\models\AdvertisementSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\models\Status;
use yii\web\UploadedFile;
use yii\data\ActiveDataProvider;
use common\models\AdvertisementPicture;

/**
 * AdvertisementController implements the CRUD actions for Advertisement model.
 */
class AdvertisementController extends Controller {

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
     * Lists all Advertisement models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new AdvertisementSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Advertisement model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        $query = AdvertisementPicture::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query->where(['advertisement_id' => $id, 'status' => Status::STATUS_ACTIVE]),
        ]);
        return $this->render('view', [
                    'model' => $this->findModel($id),
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Creates a new Advertisement model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new Advertisement();

        if ($model->load(Yii::$app->request->post())) {
            $model->created_by = Yii::$app->user->identity->username;
            $model->created_date = date('Y-m-d h:m:s');
            $model->modified_by = Yii::$app->user->identity->username;
            $model->modified_date = date('Y-m-d h:m:s');
            $model->status = Status::STATUS_ACTIVE;
            $model->save();

            $model->files = UploadedFile::getInstances($model, 'files');
            if ($model->files) {
                foreach ($model->files as $file) {
                    $advertisementPicture = new AdvertisementPicture();
                    $imageName = $file->baseName . substr(md5(rand()), 0, 7);
//                    $advertisementPicture->caption = $imageName;
                    $advertisementPicture->advertisement_id = $model->id;
                    $advertisementPicture->advertisement_picture_order = 0;
                    $advertisementPicture->created_by = Yii::$app->user->identity->username;
                    $advertisementPicture->created_date = date('Y-m-d h:m:s');
                    $advertisementPicture->modified_by = Yii::$app->user->identity->username;
                    $advertisementPicture->modified_date = date('Y-m-d h:m:s');
                    $advertisementPicture->status = Status::STATUS_ACTIVE;
                    $advertisementPicture->image_link = 'www.google.com';
                    $advertisementPicture->image_path = 'uploads/advertisement/' . $imageName . '.' . $file->extension;
                    if ($advertisementPicture->validate() && $advertisementPicture->save()) {
                        $file->saveAs('uploads/advertisement/' . $imageName . '.' . $file->extension);
                    }
                }
                Yii::$app->session->setFlash('success', 'Insert Success.');
                return $this->redirect(['view', 'id' => $model->id]);
            } else {
                Yii::$app->session->setFlash('success', 'Insert Failed.');
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            return $this->render('create', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Advertisement model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
           $model->modified_by = Yii::$app->user->identity->username;
            $model->modified_date = date('Y-m-d h:m:s');
            $model->status = Status::STATUS_ACTIVE;
            $model->save();
            
            $model->files = UploadedFile::getInstances($model, 'files');

            if ($model->files) {
                foreach ($model->files as $file) {
                    $advertisementPicture = new AdvertisementPicture();
                    $imageName = $file->baseName . substr(md5(rand()), 0, 7);
//                    $advertisementPicture->caption = $imageName;
                    $advertisementPicture->advertisement_id = $model->id;
                    $advertisementPicture->advertisement_picture_order = 0;
                    $advertisementPicture->created_by = Yii::$app->user->identity->username;
                    $advertisementPicture->created_date = date('Y-m-d h:m:s');
                    $advertisementPicture->modified_by = Yii::$app->user->identity->username;
                    $advertisementPicture->modified_date = date('Y-m-d h:m:s');
                    $advertisementPicture->status = Status::STATUS_ACTIVE;
                    $advertisementPicture->image_link = 'www.google.com';
                    $advertisementPicture->image_path = 'uploads/advertisement/' . $imageName . '.' . $file->extension;
                    if ($advertisementPicture->validate() && $advertisementPicture->save()) {
                        $file->saveAs('uploads/advertisement/' . $imageName . '.' . $file->extension);
                    }
                }
                Yii::$app->session->setFlash('success', 'Insert Success.');
                return $this->redirect(['view', 'id' => $model->id]);
            } else {
                Yii::$app->session->setFlash('success', 'Insert Failed.');
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            return $this->render('update', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Advertisement model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        $model = $this->findModel($id);
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
//        $model->setScenario('product-status');
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

    public function actionRemove($id) {
        $advertisementPicture = $this->loadState($id);
        echo $id;
        if (Yii::$app->request->post()) {
            if ($advertisementPicture !== null) {
                unlink(getcwd() . '/' . $advertisementPicture->image_path);
                $advertisementPicture->status = Status::STATUS_DELETED;
                $advertisementPicture->update(array('status'));
            }

            if (!isset($_GET['ajax']))
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('view', 'id' => $advertisementPicture->advertisement_id));
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionActive($id) {
        $model = $this->findModel($id);
//        $model->setScenario('product-status');
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
     * Finds the Advertisement model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Advertisement the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Advertisement::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    protected function loadState($id) {
        if (($advertisementPicture = AdvertisementPicture::findOne($id)) !== null) {
            return $advertisementPicture;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
