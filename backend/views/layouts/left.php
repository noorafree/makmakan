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
                    ['label' => 'Main Navigation', 'options' => ['class' => 'header']],
                    ['label' => 'Gii', 'icon' => 'fa fa-file-code-o', 'url' => ['/gii']],
                    [
                        'label' => 'Company',
                        'url' => '#',
                        'items' => [
                            ['label' => 'General', 'icon' => 'fa fa-edit', 'url' => ['/company/general']],
                            ['label' => 'About Us', 'icon' => 'fa fa-edit', 'url' => ['/company/about-us', 'id' => 1]],
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
                        'url' => '#',
                        'items' => [
                            ['label' => 'Slider List', 'icon' => 'fa fa-list-ul', 'url' => ['/slider/index']],
                            ['label' => 'Create Slider', 'icon' => 'fa fa-edit', 'url' => ['#']],
                        ],
                    ],
                    [
                        'label' => 'Advertising',
                        'url' => '#',
                        'items' => [
                            [
                                'label' => 'Advertiser', 
                                'url' => '#',
                                'items' => [
                                    ['label' => 'Advertiser List', 'icon' => 'fa fa-list-ul', 'url' => ['#']],
                                    ['label' => 'Create Advertiser', 'icon' => 'fa fa-edit', 'url' => ['#']],
                                ],
                            ],
                            [
                                'label' => 'Advertising', 
                                'url' => '#',
                                'items' => [
                                    ['label' => 'Advertising List', 'icon' => 'fa fa-list-ul', 'url' => ['#']],
                                    ['label' => 'Create Advertising', 'icon' => 'fa fa-edit', 'url' => ['#']],
                                ],
                            ],
                        ],
                    ],
                    [
                        'label' => 'User Management',
                        'url' => '#',
                        'items' => [
                            ['label' => 'User List', 'icon' => 'fa fa-list-ul', 'url' => ['#']],
                            ['label' => 'Create User', 'icon' => 'fa fa-edit', 'url' => ['#']],
                        ],
                    ],
                    [
                        'label' => 'Product Management',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Product List', 'icon' => 'fa fa-list-ul', 'url' => ['#']],
                            ['label' => 'Create Product', 'icon' => 'fa fa-edit', 'url' => ['#']],
                        ],
                    ],
                    [
                        'label' => 'Order Management',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Order List', 'icon' => 'fa fa-list-ul', 'url' => ['#']],
                        ],
                    ],
                    [
                        'label' => 'Promotion Management',
                        'url' => '#',
                        'items' => [
                            [
                                'label' => 'Voucher', 
                                'url' => '#',
                                'items' => [
                                    ['label' => 'Voucher List', 'icon' => 'fa fa-list-ul', 'url' => ['#']],
                                    ['label' => 'Create Voucher', 'icon' => 'fa fa-edit', 'url' => ['#']],
                                ],
                            ],
                            [
                                'label' => 'Discount', 
                                'url' => '#',
                                'items' => [
                                    ['label' => 'Discount List', 'icon' => 'fa fa-list-ul', 'url' => ['#']],
                                    ['label' => 'Create Discount', 'icon' => 'fa fa-edit', 'url' => ['#']],
                                ],
                            ],
                            ['label' => 'Reward Point', 'icon' => 'fa fa-edit', 'url' => ['#']],
                        ],
                    ],
                    [
                        'label' => 'CR Management',
                        'url' => '#',
                        'items' => [
                            [
                                'label' => 'Newsletter', 
                                'url' => '#',
                                'items' => [
                                    ['label' => 'Newsletter List', 'icon' => 'fa fa-list-ul', 'url' => ['/newsletter/index']],
                                    ['label' => 'Create Newsletter', 'icon' => 'fa fa-edit', 'url' => ['/newsletter/create']],
                                ],
                            ],
							['label' => 'Subscriber List', 'icon' => 'fa fa-list-ul', 'url' => ['#']],
							['label' => 'Complaint List', 'icon' => 'fa fa-list-ul', 'url' => ['#']],
                        ],
                    ],
                    [
                        'label' => 'Report',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Report By User', 'icon' => 'fa fa-bar-chart', 'url' => ['#']],
                            ['label' => 'Report By Category', 'icon' => 'fa fa-bar-chart', 'url' => ['#']],
                            ['label' => 'Report By Time', 'icon' => 'fa fa-bar-chart', 'url' => ['#']],
                        ],
                    ],
                    [
                        'label' => 'Structured Naming',
                        'url' => '#',
                        'items' => [
                            [
                                'label' => 'Product Category',
                                'url' => '#',
                                'items' => [
                                    ['label' => 'Product Category List', 'icon' => 'fa fa-list-ul', 'url' => ['/sn-product-category/index']],
                                    ['label' => 'Create Product Category', 'icon' => 'fa fa-edit', 'url' => ['/sn-product-category/create']],
                                ],
                            ],
                            [
                                'label' => 'Bank', 
                                'url' => '#',
                                'items' => [
                                    ['label' => 'Bank List', 'icon' => 'fa fa-list-ul', 'url' => ['/sn-bank/index']],
                                    ['label' => 'Create Bank', 'icon' => 'fa fa-edit', 'url' => ['/sn-bank/create']],
                                ],
                            ],
                            [
                                'label' => 'Review', 
                                'url' => '#',
                                'items' => [
                                    ['label' => 'Review List', 'icon' => 'fa fa-list-ul', 'url' => ['#']],
                                    ['label' => 'Create Review', 'icon' => 'fa fa-edit', 'url' => ['#']],
                                ],
                            ],
                            [
                                'label' => 'Delivery Agent', 
                                'url' => '#',
                                'items' => [
                                    ['label' => 'Delivery Agent List', 'icon' => 'fa fa-list-ul', 'url' => ['#']],
                                    ['label' => 'Create Delivery Agent', 'icon' => 'fa fa-edit', 'url' => ['#']],
                                ],
                            ],
                            [
                                'label' => 'Payment Method', 
                                'url' => '#',
                                'items' => [
                                    ['label' => 'Cart Status List', 'icon' => 'fa fa-list-ul', 'url' => ['#']],
                                    ['label' => 'Create Cart Status', 'icon' => 'fa fa-edit', 'url' => ['#']],
                                ],
                            ],
                        ],
                    ],
                    [
                        'label' => 'Administrator',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Access Level', 'icon' => 'fa fa-list-ul', 'url' => ['/auth'],],
                            ['label' => 'Admin List', 'icon' => 'fa fa-list-ul', 'url' => ['/admin/index'],],
                            ['label' => 'Create Administrator', 'icon' => 'fa fa-edit', 'url' => ['/admin/create'],],
                        ],
                    ],
                ],
            ]
        ) ?>

    </section>
    
</aside>
