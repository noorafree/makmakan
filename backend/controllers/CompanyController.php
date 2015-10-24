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
            return $this->redirect(['general', 'id' => $model->id]);
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
            return $this->redirect(['purchasing-guide', 'id' => $model->id]);
        } else {
            return $this->render('purchasing-guide', [
                        'model' => $model,
            ]);
        }
    }

    /*  public function actionViewPurchasingGuide($id)
      {
      return $this->render('view', [
      'model' => $this->findModel($id),
      ]);
      }
     */

    public function actionReturnPolicy($id = 1) {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            $model->last_modified_by = Yii::$app->user->identity->username;
            $model->last_modified_date = date('Y-m-d h:m:s');
            $model->save();
            return $this->redirect(['return-policy', 'id' => $model->id]);
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
            return $this->redirect(['terms-and-agreement', 'id' => $model->id]);
        } else {
            return $this->render('terms-and-agreement', [
                        'model' => $model,
            ]);
        }
    }

    /*
      public function actionViewTermsAndAgreement($id)
      {
      return $this->render('view', [
      'model' => $this->findModel($id),
      ]);
      }
     */
}
