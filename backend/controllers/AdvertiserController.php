<?php

namespace backend\controllers;

use Yii;
use common\models\Advertiser;
use common\models\AdvertiserSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\models\Status;

/**
 * AdvertiserController implements the CRUD actions for Advertiser model.
 */
class AdvertiserController extends Controller {

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
     * Lists all Advertiser models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new AdvertiserSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Advertiser model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Advertiser model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new Advertiser();

        if ($model->load(Yii::$app->request->post())) {
            $model->created_by = Yii::$app->user->identity->username;
            $model->created_date = date('Y-m-d h:m:s');
            $model->modified_by = Yii::$app->user->identity->username;
            $model->modified_date = date('Y-m-d h:m:s');
            $model->status = Status::STATUS_ACTIVE;
            $model->save();
            Yii::$app->session->setFlash('success', 'Insert Success.');
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Advertiser model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $model->modified_by = Yii::$app->user->identity->username;
            $model->modified_date = date('Y-m-d h:m:s');
            $model->save();
            Yii::$app->session->setFlash('success', 'Update Success.');
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Advertiser model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        if ($id == Yii::$app->user->identity->id)
            throw new NotFoundHttpException('The requested page does not exist.');

      $model = $this->findModel($id);
        if (Yii::$app->request->post()) {
            if ($model !== null)
            {
                $model->status = STATUS::STATUS_DELETED;
                $model->modified_by = Yii::$app->user->identity->username;
                $model->modified_date = date('Y-m-d h:m:s');
                $model->update(array('status'));
            }

            if (!isset($_GET['ajax']))
                    Yii::$app->session->setFlash('success', 'Delete Success.');
                    $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    /**
     * Finds the Advertiser model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Advertiser the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Advertiser::findOne(['id' => $id, 'status' => [STATUS::STATUS_ACTIVE, STATUS::STATUS_INACTIVE]])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

     public function actionInactive($id) {
        //if(!Yii::$app->user->can('deleteUser')) throw new ForbiddenHttpException(Yii::t('app', 'No Auth'));
        //$this->findModel($id)->delete();
        //return $this->redirect(['index']);
        if ($id == Yii::$app->user->identity->id)
            throw new NotFoundHttpException('The requested page does not exist.');

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
    
    public function actionActive($id) {
        if ($id == Yii::$app->user->identity->id)
            throw new NotFoundHttpException('The requested page does not exist.');

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
