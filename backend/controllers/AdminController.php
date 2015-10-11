<?php

namespace backend\controllers;

use Yii;
use backend\models\Admin;
use backend\models\AdminSearch;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\ForbiddenHttpException;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * UserController implements the CRUD actions for Admin model.
 */
class AdminController extends Controller
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
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['signup'],
                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index', 'signup'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            /*'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@']
                    ]
                ]
            ],*/
        ];
    }

    /**
     * Lists all Admin models.
     * @return mixed
     */
    public function actionIndex()
    {
        //if(!Yii::$app->user->can('viewUser')) throw new ForbiddenHttpException(Yii::t('app', 'No Auth'));

        $searchModel = new AdminSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $arrayStatus = Admin::getArrayStatus();

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'arrayStatus' => $arrayStatus,
        ]);
    }

    /**
     * Displays a single User model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        //if(!Yii::$app->user->can('viewUser')) throw new ForbiddenHttpException(Yii::t('app', 'No Auth'));

        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Admin model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        //if(!Yii::$app->user->can('createUser')) throw new ForbiddenHttpException(Yii::t('app', 'No Auth'));

        $model = new Admin(['scenario' => 'admin-create']);

        if ($model->load(Yii::$app->request->post())) {
            $imageName = $model->username;
            if (UploadedFile::getInstance($model,'file'))
            {
                $model->file = UploadedFile::getInstance($model, 'file');
                $model->file->saveAs( 'uploads/admin/'.$imageName.'.'.$model->file->extension );
                
                $model->image = 'uploads/admin/'.$imageName.'.'.$model->file->extension;
            }
            $model->save();

            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Admin model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        //if(!Yii::$app->user->can('updateUser')) throw new ForbiddenHttpException(Yii::t('app', 'No Auth'));

        $model = $this->findModel($id);
        $model->setScenario('admin-update');

        if ($model->load(Yii::$app->request->post())) {
            $imageName = $model->username;
            if (UploadedFile::getInstance($model,'file'))
            {
                $model->file = UploadedFile::getInstance($model, 'file');
                $model->file->saveAs( 'uploads/admin/'.$imageName.'.'.$model->file->extension );
                
                $model->image = 'uploads/admin/'.$imageName.'.'.$model->file->extension;
            }
            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing User model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        //if(!Yii::$app->user->can('deleteUser')) throw new ForbiddenHttpException(Yii::t('app', 'No Auth'));

        //$this->findModel($id)->delete();
        //return $this->redirect(['index']);
        if($id == Yii::$app->user->identity->id)
             throw new NotFoundHttpException('The requested page does not exist.'); 

        $model = $this->findModel($id);
        $model->setScenario('admin-delete');
        if (Yii::$app->request->post()) {
            if ($model !== null)
            {
                $model->status = Admin::STATUS_DELETED;
                $model->update(array('status'));
            }

            if (!isset($_GET['ajax']))
                    $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }

        
    }


    public function actionInactive($id)
    {
        //if(!Yii::$app->user->can('deleteUser')) throw new ForbiddenHttpException(Yii::t('app', 'No Auth'));

        //$this->findModel($id)->delete();
        //return $this->redirect(['index']);
        if($id == Yii::$app->user->identity->id)
             throw new NotFoundHttpException('The requested page does not exist.'); 

        $model = $this->findModel($id);
        $model->setScenario('admin-inactive');
        if (Yii::$app->request->post()) {
            if ($model !== null)
            {
                $model->status = Admin::STATUS_INACTIVE;
                $model->update(array('status'));
            }

            if (!isset($_GET['ajax']))
                    $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    /**
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return User the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Admin::findOne(['id' => $id, 'status' => [Admin::STATUS_ACTIVE, Admin::STATUS_INACTIVE]])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
