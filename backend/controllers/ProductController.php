<?php

namespace backend\controllers;

use Yii;
use common\models\Product;
use common\models\ProductSearch;
use common\models\ProductPhoto;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\models\Status;
use yii\web\UploadedFile;
use yii\data\ActiveDataProvider;
/**
 * ProductController implements the CRUD actions for Product model.
 */
class ProductController extends Controller {

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
     * Lists all Product models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new ProductSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
//$criteria = new CDbCriteria;
//		$criteria->compare('receive_header_id', $receiveHeader->id);
//		$detailsDataProvider = new CActiveDataProvider('ReceiveDetail', array(
//			'criteria'=>$criteria,
//		));
        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Product model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        $query = ProductPhoto::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query->where(['product_id' => $id, 'status' => [Status::STATUS_ACTIVE]]),
        ]);

        return $this->render('view', [
                    'model' => $this->findModel($id),
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Creates a new Product model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new Product(['scenario' => 'product-create']);

        if ($model->load(Yii::$app->request->post())) {
            $model->seen = 0;
            $model->sold = 0;
            $model->user_id = 0; // change to admin id or user id
            $model->created_by = Yii::$app->user->identity->username;
            $model->created_date = date('Y-m-d h:m:s');
            $model->modified_by = Yii::$app->user->identity->username;
            $model->modified_date = date('Y-m-d h:m:s');
            $model->status = Status::STATUS_ACTIVE;
            $model->save();

            $model->files = UploadedFile::getInstances($model, 'files');

            if ($model->files) {
                foreach ($model->files as $file) {
                    $productPhoto = new ProductPhoto();
                    $imageName = $file->baseName . substr(md5(rand()), 0, 7);
                    $productPhoto->caption = $imageName;
                    $productPhoto->product_id = $model->id;
                    $productPhoto->product_photo_order = 0;
                    $productPhoto->created_by = Yii::$app->user->identity->username;
                    $productPhoto->created_date = date('Y-m-d h:m:s');
                    $productPhoto->last_modified_by = Yii::$app->user->identity->username;
                    $productPhoto->last_modified_date = date('Y-m-d h:m:s');
                    $productPhoto->status = Status::STATUS_ACTIVE;
                    $productPhoto->image_path = 'uploads/product/' . $imageName . '.' . $file->extension;

                    if ($productPhoto->validate() && $productPhoto->save()) {
                        $file->saveAs('uploads/product/' . $imageName . '.' . $file->extension);
                    }
                }
            }
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Product model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);
        $model->setScenario('product-update');
        if ($model->load(Yii::$app->request->post())) {
            $model->seen = 0;
            $model->sold = 0;
            $model->user_id = 0; // change to admin id or user id
            $model->created_by = Yii::$app->user->identity->username;
            $model->created_date = date('Y-m-d h:m:s');
            $model->modified_by = Yii::$app->user->identity->username;
            $model->modified_date = date('Y-m-d h:m:s');
            $model->status = Status::STATUS_ACTIVE;
            $model->save();

            $model->files = UploadedFile::getInstances($model, 'files');

            if ($model->files) {
                foreach ($model->files as $file) {
                    $productPhoto = new ProductPhoto();
                    $imageName = $file->baseName . substr(md5(rand()), 0, 7);
                    $productPhoto->caption = $imageName;
                    $productPhoto->product_id = $model->id;
                    $productPhoto->product_photo_order = 0;
                    $productPhoto->created_by = Yii::$app->user->identity->username;
                    $productPhoto->created_date = date('Y-m-d h:m:s');
                    $productPhoto->last_modified_by = Yii::$app->user->identity->username;
                    $productPhoto->last_modified_date = date('Y-m-d h:m:s');
                    $productPhoto->status = Status::STATUS_ACTIVE;
                    $productPhoto->image_path = 'uploads/product/' . $imageName . '.' . $file->extension;

                    if ($productPhoto->validate() && $productPhoto->save()) {
                        $file->saveAs('uploads/product/' . $imageName . '.' . $file->extension);
                    }
                }
            }
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Product model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        $model = $this->findModel($id);
        $model->setScenario('product-status');
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
        $model->setScenario('product-status');
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
        $productPhoto = $this->loadState($id);
        echo $id;
        if (Yii::$app->request->post()) {
            if ($productPhoto !== null) {
                unlink(getcwd() . '/' . $productPhoto->image_path);
                $productPhoto->status = Status::STATUS_DELETED;
                $productPhoto->update(array('status'));
            }

            if (!isset($_GET['ajax']))
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('view', 'id'=>$productPhoto->product_id));
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionActive($id) {
        $model = $this->findModel($id);
        $model->setScenario('product-status');
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
     * Finds the Product model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Product the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Product::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    protected function loadState($id) {
        if (($productPhoto = ProductPhoto::findOne($id)) !== null) {
            return $productPhoto;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
