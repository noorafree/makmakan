<?php

namespace backend\controllers;

use Yii;
use common\models\Product;
use common\models\ProductSearch;
use common\models\ProductPhoto;
use common\models\Ingredients;
use common\models\Model;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\models\Status;
use yii\web\UploadedFile;
use yii\data\ActiveDataProvider;
use yii\helpers\ArrayHelper;
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
        $ingredients = new ActiveDataProvider([
            'query' => Ingredients::find()->where(['product_id' => $id, 'status' => [Status::STATUS_ACTIVE]]),
        ]);
        
        $productReviews = new ActiveDataProvider([
            'query' => \common\models\ProductReview::find()->where(['product_id' => $id, 'status' => [Status::STATUS_ACTIVE]]),
        ]);
        
        $productPhotos = new ActiveDataProvider([
            'query' => ProductPhoto::find()->where(['product_id' => $id, 'status' => [Status::STATUS_ACTIVE]]),
        ]);

        return $this->render('view', [
                    'model' => $this->findModel($id),
                    'ingredients' => $ingredients,
            'productReviews' => $productReviews,
                    'productPhotos' => $productPhotos,
        ]);
    }

    /**
     * Creates a new Product model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $product = new Product(['scenario' => 'product-create']);
        $ingredients = [new Ingredients];

        if ($product->load(Yii::$app->request->post())) {
            $ingredients = Model::createMultiple(Ingredients::classname());
            Model::loadMultiple($ingredients, Yii::$app->request->post());
            // ajax validation
            if (Yii::$app->request->isAjax) {
                Yii::$app->response->format = Response::FORMAT_JSON;
                return ArrayHelper::merge(
                                ActiveForm::validateMultiple($ingredients), ActiveForm::validate($product)
                );
            }

            $product->seen = 0;
            $product->sold = 0;
            $product->user_id = 0; // change to admin id or user id
            $product->created_by = Yii::$app->user->identity->username;
            $product->created_date = date('Y-m-d h:m:s');
            $product->modified_by = Yii::$app->user->identity->username;
            $product->modified_date = date('Y-m-d h:m:s');
            $product->status = Status::STATUS_ACTIVE;

            // validate all models
            $valid = $product->validate();

            foreach ($ingredients as $detail) {
                $fields = array('ingredient');
                $valid = $detail->validate($fields) && $valid;
            }

            if ($valid) {
                $transaction = \Yii::$app->db->beginTransaction();
                try {
                    if ($flag = $product->save(false)) {
                        foreach ($ingredients as $ingredient) {
                            $ingredient->created_by = Yii::$app->user->identity->username;
                            $ingredient->created_date = date('Y-m-d h:m:s');
                            $ingredient->modified_by = Yii::$app->user->identity->username;
                            $ingredient->modified_date = date('Y-m-d h:m:s');
                            $ingredient->status = Status::STATUS_ACTIVE;
                            $ingredient->product_id = $product->id;
                            if (!($flag = $ingredient->save(false))) {
                                $transaction->rollBack();
                                break;
                            }
                        }

                        $product->files = UploadedFile::getInstances($product, 'files');

                        if ($product->files) {
                            foreach ($product->files as $file) {
                                $productPhoto = new ProductPhoto();
                                $imageName = $file->baseName . substr(md5(rand()), 0, 7);
                                $productPhoto->caption = $imageName;
                                $productPhoto->product_id = $product->id;
                                $productPhoto->product_photo_order = 0;
                                $productPhoto->created_by = Yii::$app->user->identity->username;
                                $productPhoto->created_date = date('Y-m-d h:m:s');
                                $productPhoto->last_modified_by = Yii::$app->user->identity->username;
                                $productPhoto->last_modified_date = date('Y-m-d h:m:s');
                                $productPhoto->status = Status::STATUS_ACTIVE;
                                $productPhoto->image_path = 'uploads/product/' . $imageName . '.' . $file->extension;

                                if (!($flag = $productPhoto->save(false))) {
                                    $transaction->rollBack();
                                    break;
                                }else {
                                    $file->saveAs('uploads/product/' . $imageName . '.' . $file->extension);
                                }
                            }
                        }
                    }
                    if ($flag) {
                        $transaction->commit();
                        return $this->redirect(['view', 'id' => $product->id]);
                    }
                } catch (Exception $e) {
                    $transaction->rollBack();
                }
            }
        } else {
            return $this->render('create', [
                        'product' => $product,
                        'ingredients' => (empty($ingredients)) ? [new Ingredients] : $ingredients,
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
        $product = $this->findModel($id);
        $product->setScenario('product-update');
        $ingredients = $product->ingredients;

        if ($product->load(Yii::$app->request->post())) {
            $oldIDs = ArrayHelper::map($ingredients, 'id', 'id');
            $ingredients = Model::createMultiple(Ingredients::classname(), $ingredients);
            Model::loadMultiple($ingredients, Yii::$app->request->post());
            $deletedIDs = array_diff($oldIDs, array_filter(ArrayHelper::map($ingredients, 'id', 'id')));

            // ajax validation
            if (Yii::$app->request->isAjax) {
                Yii::$app->response->format = Response::FORMAT_JSON;
                return ArrayHelper::merge(
                                ActiveForm::validateMultiple($ingredients), ActiveForm::validate($product)
                );
            }

            $product->seen = 0;
            $product->sold = 0;
            $product->user_id = 0; // change to admin id or user id
            $product->created_by = Yii::$app->user->identity->username;
            $product->created_date = date('Y-m-d h:m:s');
            $product->modified_by = Yii::$app->user->identity->username;
            $product->modified_date = date('Y-m-d h:m:s');
            $product->status = Status::STATUS_ACTIVE;

            // validate all models
            $valid = $product->validate();

            foreach ($ingredients as $detail) {
                $fields = array('ingredient');
                $valid = $detail->validate($fields) && $valid;
            }

            if ($valid) {
                $transaction = \Yii::$app->db->beginTransaction();
                try {
                    if ($flag = $product->save(false)) {
                        if (! empty($deletedIDs)) {
                            //Ingredients::updateAll(array( 'status' => Status::STATUS_DELETED ), 'id IN ( ' . implode(",", $deletedIDs) .')' );
                            Ingredients::deleteAll(['id' => $deletedIDs]);
                        }
                        foreach ($ingredients as $ingredient) {
                            $ingredient->created_by = Yii::$app->user->identity->username;
                            $ingredient->created_date = date('Y-m-d h:m:s');
                            $ingredient->modified_by = Yii::$app->user->identity->username;
                            $ingredient->modified_date = date('Y-m-d h:m:s');
                            $ingredient->status = Status::STATUS_ACTIVE;
                            $ingredient->product_id = $product->id;
                            if (!($flag = $ingredient->save(false))) {
                                $transaction->rollBack();
                                break;
                            }
                        }

                        $product->files = UploadedFile::getInstances($product, 'files');

                        if ($product->files) {
                            foreach ($product->files as $file) {
                                $productPhoto = new ProductPhoto();
                                $imageName = $file->baseName . substr(md5(rand()), 0, 7);
                                $productPhoto->caption = $imageName;
                                $productPhoto->product_id = $product->id;
                                $productPhoto->product_photo_order = 0;
                                $productPhoto->created_by = Yii::$app->user->identity->username;
                                $productPhoto->created_date = date('Y-m-d h:m:s');
                                $productPhoto->last_modified_by = Yii::$app->user->identity->username;
                                $productPhoto->last_modified_date = date('Y-m-d h:m:s');
                                $productPhoto->status = Status::STATUS_ACTIVE;
                                $productPhoto->image_path = 'uploads/product/' . $imageName . '.' . $file->extension;

                                if (!($flag = $productPhoto->save(false))) {
                                    $transaction->rollBack();
                                    break;
                                }else {
                                    $file->saveAs('uploads/product/' . $imageName . '.' . $file->extension);
                                }
                            }
                        }
                    }
                    if ($flag) {
                        $transaction->commit();
                        return $this->redirect(['view', 'id' => $product->id]);
                    }
                } catch (Exception $e) {
                    $transaction->rollBack();
                }
            }
        } else {
            return $this->render('create', [
                        'product' => $product,
                        'ingredients' => (empty($ingredients)) ? [new Ingredients] : $ingredients,
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
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('view', 'id' => $productPhoto->product_id));
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
