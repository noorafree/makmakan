<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $user common\models\User */

$activationLink = Yii::$app->urlManager->createAbsoluteUrl(['site/user-activation', 'token' => $user->activation_code]);
?>
<div class="password-reset">
    <p>Hello <?= Html::encode($user->username) ?>,</p>

    <p>Silahkan klik link di bawah ini untuk mengaktifkan akun anda:</p>

    <p><?= Html::a(Html::encode($activationLink), $activationLink) ?></p>
</div>
