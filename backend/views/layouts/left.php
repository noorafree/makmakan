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
                <?= Html::Img(Html::Encode(Yii::$app->user->identity->image), ['alt' => 'User Image', 'class' => 'img-circle']); ?>
            </div>
            <div class="pull-left info">
                <p><?= Html::Encode(Yii::$app->user->identity->name); ?></p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <?=
        dmstr\widgets\Menu::widget(
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
                                ['label' => 'Purchasing Guide', 'icon' => 'fa fa-edit', 'url' => ['/company/purchasing-guide']],
                                ['label' => 'Delivery Guide', 'icon' => 'fa fa-edit', 'url' => ['/company/delivery-guide']],
                                ['label' => 'Return Policy', 'icon' => 'fa fa-edit', 'url' => ['/company/return-policy']],
                                ['label' => 'Privacy Policy', 'icon' => 'fa fa-edit', 'url' => ['/company/privacy-policy']],
                                ['label' => 'Terms And Agreement', 'icon' => 'fa fa-edit', 'url' => ['/company/terms-and-agreement']],
                                [
                                    'label' => 'FAQ',
                                    'url' => '#',
                                    'items' => [
                                        ['label' => 'FAQ List', 'icon' => 'fa fa-list-ul', 'url' => ['/faq/index']],
                                        ['label' => 'Create FAQ', 'icon' => 'fa fa-edit', 'url' => ['/faq/create']],
                                    ],
                                ],
                            ],
                        ],
                        [
                            'label' => 'Carousel',
                            'url' => '#',
                            'items' => [
                                ['label' => 'Carousel List', 'icon' => 'fa fa-list-ul', 'url' => ['/carousel/index']],
                                ['label' => 'Create Carousel', 'icon' => 'fa fa-edit', 'url' => ['/carousel/create']],
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
                                        ['label' => 'Advertiser List', 'icon' => 'fa fa-list-ul', 'url' => ['/advertiser/index']],
                                        ['label' => 'Create Advertiser', 'icon' => 'fa fa-edit', 'url' => ['/advertiser/create']],
                                    ],
                                ],
                                [
                                    'label' => 'Advertising',
                                    'url' => '#',
                                    'items' => [
                                        ['label' => 'Advertising List', 'icon' => 'fa fa-list-ul', 'url' => ['/advertisement/index']],
                                        ['label' => 'Create Advertising', 'icon' => 'fa fa-edit', 'url' => ['/advertisement/create']],
                                    ],
                                ],
                            ],
                        ],
                        [
                            'label' => 'User Management',
                            'url' => '#',
                            'items' => [
                                ['label' => 'User List', 'icon' => 'fa fa-list-ul', 'url' => ['/user/index']],
                                ['label' => 'Create User', 'icon' => 'fa fa-edit', 'url' => ['/user/create']],
                            ],
                        ],
                        [
                            'label' => 'Product Management',
                            'url' => '#',
                            'items' => [
                                ['label' => 'Product List', 'icon' => 'fa fa-list-ul', 'url' => ['/product/index']],
                                ['label' => 'Create Product', 'icon' => 'fa fa-edit', 'url' => ['/product/create']],
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
                                [
                                    'label' => 'Subscriber',
                                    'url' => '#',
                                    'items' => [ 
                                       ['label' => 'Subscriber List', 'icon' => 'fa fa-list-ul', 'url' => ['/subscriber/index']],
                                        ['label' => 'Create Subscriber', 'icon' => 'fa fa-edit', 'url' => ['/subscriber/create']],
                                    ],
                                ],
                                ['label' => 'Complaint List', 'icon' => 'fa fa-list-ul', 'url' => ['/user-complaint/index']],
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
                                        ['label' => 'Review List', 'icon' => 'fa fa-list-ul', 'url' => ['/sn-review/index']],
                                        ['label' => 'Create Review', 'icon' => 'fa fa-edit', 'url' => ['/sn-review/create']],
                                    ],
                                ],
                                [
                                    'label' => 'Delivery Agent',
                                    'url' => '#',
                                    'items' => [
                                        ['label' => 'Delivery Agent List', 'icon' => 'fa fa-list-ul', 'url' => ['/sn-delivery-agent/index']],
                                        ['label' => 'Create Delivery Agent', 'icon' => 'fa fa-edit', 'url' => ['/sn-delivery-agent/create']],
                                    ],
                                ],
                                [
                                    'label' => 'Payment Method',
                                    'url' => '#',
                                    'items' => [
                                        ['label' => 'Payment Method List', 'icon' => 'fa fa-list-ul', 'url' => ['/sn-payment-method/index']],
                                        ['label' => 'Create Payment Method', 'icon' => 'fa fa-edit', 'url' => ['/sn-payment-method/create']],
                                    ],
                                ],
                            ],
                        ],
                        [
                            'label' => 'Administrator',
                            'url' => '#',
                            'items' => [
                                [
                                    'label' => 'Access Level',
                                    'url' => '#',
                                    'items' => [
                                        ['label' => 'Access Level List', 'icon' => 'fa fa-list-ul', 'url' => ['/auth']],
                                        ['label' => 'Create Access Level', 'icon' => 'fa fa-edit', 'url' => ['/auth/default/create']],
                                    ],
                                ],
                                [
                                    'label' => 'Admin',
                                    'url' => '#',
                                    'items' => [
                                        ['label' => 'Admin List', 'icon' => 'fa fa-list-ul', 'url' => ['/admin/index']],
                                        ['label' => 'Create Admin', 'icon' => 'fa fa-edit', 'url' => ['/admin/create']],
                                    ],
                                ],
                            ],
                        ],
                    ],
                ]
        )
        ?>

    </section>
</aside>
