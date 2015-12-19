<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace frontend\controllers;

use Yii;
use common\models\Product;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

class CartController extends Controller {

    public function actionCart() {

        if (isset($_POST['Proceed'])) {
             if (Yii::$app->user->isGuest) {
                return $this->redirect(['method']);
             } else {
                return $this->redirect(['billing']);
             }
        }
        
        return $this->render('cart');
    }
    
    public function actionMethod() {
        return $this->render('method');
    }
    
    public function actionDeliveryInformation() {
        $information = new \common\models\InformationForm();
        $personalData = (Yii::$app->session['PersonalData'] === null) ? new \common\models\InformationForm() : Yii::$app->session['PersonalData'];
        
        if (!Yii::$app->user->isGuest) {
            $user = \common\models\User::findOne(Yii::$app->user->id);
            if ($user !== null) {
                $information->delivery_address = $user->address;
                $information->delivery_contact = $user->phone;
                
                if (isset($_POST['IsDifferentAddress']))
                    $this->checkDifferentAddress();
            }
        }

        Yii::app()->session['PersonalData'] = $personalData;

        return $this->render('deliveryInformation', array(
            'personalData' => $personalData,
        ));
    }
    
    public function actionDestination() {
        $information = (Yii::$app->session['Destination'] === null) ? new \common\models\InformationForm() : Yii::$app->session['Destination'];

        if (isset($_POST['Information'])) {
            $information->attributes = $_POST['Information'];
            if ($information->validate())
                $this->redirect(array('checkout'));
        }

        Yii::app()->session['Destination'] = $information;

        return $this->render('destination', array(
            'information' => $information,
        ));
    }
    
    public function checkDifferentAddress() {
        if ($_POST['IsDifferentAddress'])
            return $this->redirect(['destination']);
        else {
            Yii::$app->session->remove('Destination');
            return $this->redirect(['shipment']);
        }
    }

    public function actionRemove($id) {
        if (Yii::$app->request->post()) {
            $cart = new \common\models\Cart();

            $cart->remove($id);

            $this->redirect(array('cart'));
        }
    }

}
