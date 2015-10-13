<?php
use yii\helpers\Html;

/* @var $this \yii\web\View */
/* @var $content string */
?>

<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                 <?= Html::Img(Html::Encode(Yii::$app->user->identity->image), ['alt'=>'User Image', 'class'=>'img-circle']);  ?>
            </div>
            <div class="pull-left info">
                <p><?= Html::Encode(Yii::$app->user->identity->name);  ?></p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu'],
                'items' => [
                    ['label' => 'Dashboard', 'options' => ['class' => 'header']],
                    ['label' => 'Gii', 'icon' => 'fa fa-file-code-o', 'url' => ['/gii']],
                    [
                        'label' => 'Company',
                        'icon' => 'fa fa-folder',
                        'url' => '#',
                        'items' => [
                            ['label' => 'General', 'icon' => 'fa fa-edit', 'url' => ['/general/index']],
                            ['label' => 'About Us', 'icon' => 'fa fa-edit', 'url' => ['/aboutUs/index']],
                            ['label' => 'Purchasing Guide', 'icon' => 'fa fa-edit', 'url' => ['/purchsingGuide/index']],
                            ['label' => 'Delivery Guide', 'icon' => 'fa fa-edit', 'url' => ['/deliveryGuide/index']],
                            ['label' => 'Return Policy', 'icon' => 'fa fa-edit', 'url' => ['/returnPolicy/index']],
                            ['label' => 'Privacy Policy', 'icon' => 'fa fa-edit', 'url' => ['/privacyPolicy/index']],
                            ['label' => 'Terms And Agreement', 'icon' => 'fa fa-edit', 'url' => ['/termsAndAgreement/index']],
                            ['label' => 'FAQ', 'icon' => 'fa fa-edit', 'url' => ['/faq/index']],
                        ],
                    ],
                    [
                        'label' => 'Slider',
                        'icon' => 'fa fa-folder',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Slider', 'icon' => 'fa fa-table', 'url' => ['/slider/index']],
                            ['label' => 'Create Slider', 'icon' => 'fa fa-edit', 'url' => ['/aboutUs/index']],
                        ],
                    ],
                    [
                        'label' => 'Advertising',
                        'icon' => 'fa fa-folder',
                        'url' => '#',
                        'items' => [
                            [
                                'label' => 'Advertiser', 
                                'icon' => 'fa fa-share',
                                'url' => '#',
                                'items' => [
                                    ['label' => 'Advertiser List', 'icon' => 'fa fa-table', 'url' => ['/advertiser/index']],
                                    ['label' => 'Create Advertiser', 'icon' => 'fa fa-edit', 'url' => ['/advertiser/create']],
                                ],
                            ],
                            [
                                'label' => 'Advertising', 
                                'icon' => 'fa fa-share',
                                'url' => '#',
                                'items' => [
                                    ['label' => 'Advertising List', 'icon' => 'fa fa-table', 'url' => ['/advertising/index']],
                                    ['label' => 'Create Advertising', 'icon' => 'fa fa-edit', 'url' => ['/advertising/create']],
                                ],
                            ],
                        ],
                    ],
                    [
                        'label' => 'User Management',
                        'icon' => 'fa fa-table',
                        'url' => '#',
                        'items' => [
                            ['label' => 'User List', 'icon' => 'fa fa-table', 'url' => ['/user/index']],
                            ['label' => 'Create User', 'icon' => 'fa fa-edit', 'url' => ['/user/index']],
                        ],
                    ],
                    [
                        'label' => 'Product Management',
                        'icon' => 'fa fa-table',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Product List', 'icon' => 'fa fa-table', 'url' => ['/product/index']],
                            ['label' => 'Create Product', 'icon' => 'fa fa-edit', 'url' => ['/product/index']],
                        ],
                    ],
                    [
                        'label' => 'Order Management',
                        'icon' => 'fa fa-table',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Order List', 'icon' => 'fa fa-table', 'url' => ['/order/index']],
                            ['label' => 'Create Order', 'icon' => 'fa fa-edit', 'url' => ['/order/index']],
                        ],
                    ],
                    [
                        'label' => 'Promotion Management',
                        'icon' => 'fa fa-folder',
                        'url' => '#',
                        'items' => [
                            [
                                'label' => 'Voucher', 
                                'icon' => 'fa fa-share',
                                'url' => '#',
                                'items' => [
                                    ['label' => 'Voucher List', 'icon' => 'fa fa-table', 'url' => ['/voucher/index']],
                                    ['label' => 'Create Voucher', 'icon' => 'fa fa-edit', 'url' => ['/voucher/create']],
                                ],
                            ],
                            [
                                'label' => 'Discount', 
                                'icon' => 'fa fa-share',
                                'url' => '#',
                                'items' => [
                                    ['label' => 'Discount List', 'icon' => 'fa fa-table', 'url' => ['/discount/index']],
                                    ['label' => 'Create Discount', 'icon' => 'fa fa-edit', 'url' => ['/discount/create']],
                                ],
                            ],
                            ['label' => 'Reward Point', 'icon' => 'fa fa-table', 'url' => ['/reward/index']],
                        ],
                    ],
                    [
                        'label' => 'CRM',
                        'icon' => 'fa fa-folder',
                        'url' => '#',
                        'items' => [
                            [
                                'label' => 'Newsletter', 
                                'icon' => 'fa fa-share',
                                'url' => '#',
                                'items' => [
                                    ['label' => 'Newsletter List', 'icon' => 'fa fa-table', 'url' => ['/newsletter/index']],
                                    ['label' => 'Create Newsletter', 'icon' => 'fa fa-edit', 'url' => ['/newsletter/create']],
                                ],
                            ],
                            [
                                'label' => 'Subscriber', 
                                'icon' => 'fa fa-share',
                                'url' => '#',
                                'items' => [
                                    ['label' => 'Subscriber List', 'icon' => 'fa fa-table', 'url' => ['/advertiser/index']],
                                ],
                            ],
                            [
                                'label' => 'User Complaint', 
                                'icon' => 'fa fa-share',
                                'url' => '#',
                                'items' => [
                                    ['label' => 'User Complaint List', 'icon' => 'fa fa-table', 'url' => ['/advertising/index']],
                                ],
                            ],
                        ],
                    ],
                    [
                        'label' => 'Report',
                        'icon' => 'fa fa-folder',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Report By User', 'icon' => 'fa fa-bar-chart', 'url' => ['/reward/index']],
                            ['label' => 'Report By Category', 'icon' => 'fa fa-bar-chart', 'url' => ['/reward/index']],
                            ['label' => 'Report By Time', 'icon' => 'fa fa-bar-chart', 'url' => ['/reward/index']],
                        ],
                    ],
                    [
                        'label' => 'Structured Naming',
                        'icon' => 'fa fa-folder',
                        'url' => '#',
                        'items' => [
                            [
                                'label' => 'Product Category', 
                                'icon' => 'fa fa-share',
                                'url' => '#',
                                'items' => [
                                    ['label' => 'Product Category List', 'icon' => 'fa fa-table', 'url' => ['/advertising/index']],
                                    ['label' => 'Create Product Category', 'icon' => 'fa fa-edit', 'url' => ['/advertising/index']],
                                ],
                            ],
                            [
                                'label' => 'Bank', 
                                'icon' => 'fa fa-share',
                                'url' => '#',
                                'items' => [
                                    ['label' => 'Bank List', 'icon' => 'fa fa-table', 'url' => ['/sn-bank/index']],
                                    ['label' => 'Create Bank', 'icon' => 'fa fa-edit', 'url' => ['/sn-bank/create']],
                                ],
                            ],
                            [
                                'label' => 'Tag', 
                                'icon' => 'fa fa-share',
                                'url' => '#',
                                'items' => [
                                    ['label' => 'Tag List', 'icon' => 'fa fa-table', 'url' => ['/advertising/index']],
                                    ['label' => 'Create Tag', 'icon' => 'fa fa-edit', 'url' => ['/advertising/index']],
                                ],
                            ],
                            [
                                'label' => 'Review', 
                                'icon' => 'fa fa-share',
                                'url' => '#',
                                'items' => [
                                    ['label' => 'Review List', 'icon' => 'fa fa-table', 'url' => ['/advertising/index']],
                                    ['label' => 'Create Review', 'icon' => 'fa fa-edit', 'url' => ['/advertising/index']],
                                ],
                            ],
                            [
                                'label' => 'Delivery Agent', 
                                'icon' => 'fa fa-share',
                                'url' => '#',
                                'items' => [
                                    ['label' => 'Delivery Agent List', 'icon' => 'fa fa-table', 'url' => ['/advertising/index']],
                                    ['label' => 'Create Delivery Agent', 'icon' => 'fa fa-edit', 'url' => ['/advertising/index']],
                                ],
                            ],
                            [
                                'label' => 'Cart Status', 
                                'icon' => 'fa fa-share',
                                'url' => '#',
                                'items' => [
                                    ['label' => 'Cart Status List', 'icon' => 'fa fa-table', 'url' => ['/advertising/index']],
                                    ['label' => 'Create Cart Status', 'icon' => 'fa fa-edit', 'url' => ['/advertising/index']],
                                ],
                            ],
                            [
                                'label' => 'Payment Method', 
                                'icon' => 'fa fa-share',
                                'url' => '#',
                                'items' => [
                                    ['label' => 'Cart Status List', 'icon' => 'fa fa-table', 'url' => ['/advertising/index']],
                                    ['label' => 'Create Cart Status', 'icon' => 'fa fa-edit', 'url' => ['/advertising/index']],
                                ],
                            ],
                            [
                                'label' => 'Advertisement Type', 
                                'icon' => 'fa fa-share',
                                'url' => '#',
                                'items' => [
                                    ['label' => 'Advertisement Type List', 'icon' => 'fa fa-table', 'url' => ['/advertising/index']],
                                    ['label' => 'Create Advertisement Type', 'icon' => 'fa fa-edit', 'url' => ['/advertising/index']],
                                ],
                            ],
                            [
                                'label' => 'Review', 
                                'icon' => 'fa fa-share',
                                'url' => '#',
                                'items' => [
                                    ['label' => 'Review List', 'icon' => 'fa fa-table', 'url' => ['/advertising/index']],
                                    ['label' => 'Create Review', 'icon' => 'fa fa-edit', 'url' => ['/advertising/index']],
                                ],
                            ],
                            [
                                'label' => 'Complaint Type', 
                                'icon' => 'fa fa-share',
                                'url' => '#',
                                'items' => [
                                    ['label' => 'Complaint Type List', 'icon' => 'fa fa-table', 'url' => ['/advertising/index']],
                                    ['label' => 'Create Complaint Type', 'icon' => 'fa fa-edit', 'url' => ['/advertising/index']],
                                ],
                            ],
                            [
                                'label' => 'Voucher Type Type', 
                                'icon' => 'fa fa-share',
                                'url' => '#',
                                'items' => [
                                    ['label' => 'Voucher Type Type List', 'icon' => 'fa fa-table', 'url' => ['/advertising/index']],
                                    ['label' => 'Create Voucher Type Type', 'icon' => 'fa fa-edit', 'url' => ['/advertising/index']],
                                ],
                            ],
                        ],
                    ],
                    [
                        'label' => 'Administrator',
                        'icon' => 'fa fa-folder',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Access Level', 'icon' => 'fa fa-table', 'url' => ['/auth'],],
                            ['label' => 'Admin List', 'icon' => 'fa fa-table', 'url' => ['/admin/index'],],
                            ['label' => 'Create Administrator', 'icon' => 'fa fa-edit', 'url' => ['/admin/create'],],
                        ],
                    ],
                ],
            ]
        ) ?>

    </section>

</aside>
