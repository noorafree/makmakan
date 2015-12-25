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
use common\models\Cart;

class CartController extends Controller {

    public function actionCart() {
        if (isset($_POST['Proceed'])) {
             if (Yii::$app->user->isGuest) {
                return $this->redirect(['method']);
             } else {
                return $this->redirect(['delivery-information']);
             }
        }
        
        return $this->render('cart');
    }
    
    public function actionMethod() {
        return $this->render('method');
    }
    
    public function actionDeliveryInformation() {
        $personalData = (Yii::$app->session['PersonalData'] === null) ? new \common\models\InformationForm() : Yii::$app->session['PersonalData'];
        
        if (!Yii::$app->user->isGuest) {
            $user = \common\models\User::findOne(Yii::$app->user->id);
            if ($user !== null) {
                $personalData->first_name = $user->first_name;
                $personalData->last_name = $user->last_name;
                $personalData->delivery_address = $user->address;
                $personalData->delivery_contact = $user->phone;
                
                if (isset($_POST['IsDifferentAddress']))
                     $this->checkDifferentAddress();
            }
        }

        Yii::$app->session['PersonalData'] = $personalData;

        return $this->render('deliveryInformation', array(
            'personalData' => $personalData,
        ));
    }
    
    public function actionDestination() {
        $destination = (Yii::$app->session['Destination'] === null) ? new \common\models\InformationForm() : Yii::$app->session['Destination'];
   
        if ($destination->load(Yii::$app->request->post())) {
            $destination->attributes = Yii::$app->request->post();
            if ($destination->validate())
                $this->redirect(array('checkout'));
        }

        Yii::$app->session['Destination'] = $destination;

        return $this->render('destination', array(
            'destination' => $destination,
        ));
    }
    
    public function actionCheckout() {
        $cart = new Cart();
        $personalData = (Yii::$app->session['PersonalData'] === null) ? new \common\models\InformationForm() : Yii::$app->session['PersonalData'];
        $destination = (Yii::$app->session['Destination'] === null) ? new \common\models\InformationForm() : Yii::$app->session['Destination'];

        return $this->render('checkout', array(
            'cart' => $cart,
            'personalData' => $personalData,
            'destination' => $destination->validate() ? $destination : null,
        ));
    }
    
    public function checkDifferentAddress() {
        if ($_POST['IsDifferentAddress'])
            return $this->redirect(['destination']);
        else {
            Yii::$app->session->remove('Destination');
            return $this->redirect(['checkout']);
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
