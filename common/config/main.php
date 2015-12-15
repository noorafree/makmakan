<?php

return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'class' => 'funson86\auth\User',
            'enableAutoLogin' => true,
        ],
        'authManager' => [
            'class' => 'yii\rbac\DbManager',
        //'defaultRoles' => ['guest'],
        ],
        'formatter' => [
            'dateFormat' => 'yyyy-MM-dd',
            'datetimeFormat' => 'yyyy-MM-dd HH:mm:ss',
            'decimalSeparator' => '.',
            'thousandSeparator' => ' ',
            'currencyCode' => 'IDR',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'useFileTransport' => false,
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => 'mail.makmakan.com',
                'username' => 'admin@makmakan.com',
                'password' => 'admin123',
                'port' => '465',
                'encryption' => 'ssl',
            ],
//            'messageConfig' => [
//            'from' => ['admin@makmakan.com' => 'Admin'], // this is needed for sending emails
//            'charset' => 'UTF-8',],
        ],
    ],
];
