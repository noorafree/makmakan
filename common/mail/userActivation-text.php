<?php

/* @var $this yii\web\View */
/* @var $user common\models\User */

$activationLink = Yii::$app->urlManager->createAbsoluteUrl(['site/user-activation', 'token' => $user->activation_code]);
?>
Hello <?= $user->username ?>,

Silahkan klik link di bawah ini untuk mengaktifkan akun anda:

<?= $activationLink ?>
