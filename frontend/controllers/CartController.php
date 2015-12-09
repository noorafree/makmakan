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

        return $this->renderAjax('cart');
    }

    public function actionRemove($id) {
        if (Yii::$app->request->post()) {
            $cart = new \common\models\Cart();

            $cart->remove($id);

            $this->redirect(array('cart'));
        }
    }

}
