<?php

namespace backend\controllers;

use Yii;
use common\models\Status;
use common\models\SnProductCategory;
use common\models\SnProductCategorySearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * SnProductCategoryController implements the CRUD actions for SnProductCategory model.
 */
class SnProductCategoryController extends Controller {

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
     * Lists all SnProductCategory models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new SnProductCategorySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $arrayStatus = SnProductCategory::getArrayStatus();

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
                    'arrayStatus' => $arrayStatus,
        ]);
    }

    /**
     * Displays a single SnProductCategory model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new SnProductCategory model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new SnProductCategory(['scenario' => 'sn-product-category-create']);

        if ($model->load(Yii::$app->request->post())) {
            $model->created_by = Yii::$app->user->identity->username;
            $model->created_date = date('Y-m-d h:m:s');
            $model->modified_by = Yii::$app->user->identity->username;
            $model->modified_date = date('Y-m-d h:m:s');
            $model->status = Status::STATUS_ACTIVE;
            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing SnProductCategory model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);
        $model->setScenario('sn-product-category-update');

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing SnProductCategory model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        //$this->findModel($id)->delete();
        //$model->setScenario('sn-product-category-delete');
        //return $this->redirect(['index']);

        if ($id == Yii::$app->user->identity->id)
            throw new NotFoundHttpException('The requested page does not exist.');

        $model = $this->findModel($id);
        $model->setScenario('sn-product-category-delete');
        if (Yii::$app->request->post()) {
            if ($model !== null) {
                $model->status = SnProductCategory::STATUS_DELETED;
                $model->update(array('status'));
            }

            if (!isset($_GET['ajax']))
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
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
        $model->setScenario('sn-product-category-inactive');
        if (Yii::$app->request->post()) {
            if ($model !== null) {
                $model->status = SnProductCategory::STATUS_INACTIVE;
                $model->update(array('status'));
            }

            if (!isset($_GET['ajax']))
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    /**
     * Finds the SnProductCategory model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return SnProductCategory the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
       if (($model = SnProductCategory::findOne(['id' => $id, 'status' => [SnProductCategory::STATUS_ACTIVE, SnProductCategory::STATUS_INACTIVE]])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
