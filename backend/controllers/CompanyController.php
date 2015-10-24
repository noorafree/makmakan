<?php

namespace backend\controllers;

use Yii;
use common\models\Company;
use common\models\CompanySearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CompanyController implements the CRUD actions for Company model.
 */
class CompanyController extends Controller {

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
    
    public function actionGeneral($id = 1) {
        $model = $this->findModel($id);

         if ($model->load(Yii::$app->request->post())) {
            $model->last_modified_by = Yii::$app->user->identity->username;
            $model->last_modified_date = date('Y-m-d h:m:s');
            $model->save();
            Yii::$app->session->setFlash('success', 'Update Success.');
            return $this->refresh();
        } else {
            return $this->render('general', [
                        'model' => $model,
            ]);
        }
    }

    public function actionAboutUs($id = 1) {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            $model->last_modified_by = Yii::$app->user->identity->username;
            $model->last_modified_date = date('Y-m-d h:m:s');
            $model->save();
            Yii::$app->session->setFlash('success', 'Update Success.');
            return $this->refresh();
        } else {
            return $this->render('about-us', [
                        'model' => $model,
            ]);
        }
    }

    public function actionPrivacyPolicy($id = 1) {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            $model->last_modified_by = Yii::$app->user->identity->username;
            $model->last_modified_date = date('Y-m-d h:m:s');
            $model->save();
            Yii::$app->session->setFlash('success', 'Update Success.');
            return $this->refresh();
        } else {
            return $this->render('privacy-policy', [
                        'model' => $model,
            ]);
        }
    }

    public function actionDeliveryGuide($id = 1) {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            $model->last_modified_by = Yii::$app->user->identity->username;
            $model->last_modified_date = date('Y-m-d h:m:s');
            $model->save();
            Yii::$app->session->setFlash('success', 'Update Success.');
            return $this->refresh();
        } else {
            return $this->render('delivery-guide', [
                        'model' => $model,
            ]);
        }
    }

    public function actionPurchasingGuide($id = 1) {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            $model->last_modified_by = Yii::$app->user->identity->username;
            $model->last_modified_date = date('Y-m-d h:m:s');
            $model->save();
            Yii::$app->session->setFlash('success', 'Update Success.');
            return $this->refresh();
        } else {
            return $this->render('purchasing-guide', [
                        'model' => $model,
            ]);
        }
    }
    public function actionReturnPolicy($id = 1) {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            $model->last_modified_by = Yii::$app->user->identity->username;
            $model->last_modified_date = date('Y-m-d h:m:s');
            $model->save();
            Yii::$app->session->setFlash('success', 'Update Success.');
            return $this->refresh();
        } else {
            return $this->render('return-policy', [
                        'model' => $model,
            ]);
        }
    }

    /*
      public function actionViewReturnPolicy($id)
      {
      return $this->render('view', [
      'model' => $this->findModel($id),
      ]);
      }
     */

    public function actionTermsAndAgreement($id = 1) {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            $model->last_modified_by = Yii::$app->user->identity->username;
            $model->last_modified_date = date('Y-m-d h:m:s');
            $model->save();
            Yii::$app->session->setFlash('success', 'Update Success.');
            return $this->refresh();
        } else {
            return $this->render('terms-and-agreement', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Finds the Faq model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Faq the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Company::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
