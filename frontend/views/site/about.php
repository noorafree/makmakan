<?php

use yii\helpers\Html;

?>

<div class="container-fluid site-content">
    <div class="container">
        <div class="row">
            <div class="col-md-2 col-sm-2 hidden-xs">                
                <div class="glossymenu" style="margin:auto; width: 135%">
                    <?= Html::a('Profil Pengguna', ['site/profile'], ['class' => 'menuitem']); ?>
                    <a class="menuitem submenuheader" href="http://www.cssdrive.com">Pembelian</a>
                    <div class="submenu">
                        <ul>
                            <li><a href="http://www.cssdrive.com">Pemesanan Saya</a></li>
                            <li><a href="http://www.cssdrive.com">Status Pemesanan</a></li>
                        </ul>
                    </div>
                    <a class="menuitem submenuheader" href="http://www.cssdrive.com">Penjualan</a>
                    <div class="submenu">
                        <ul>
                            <li><a href="http://www.cssdrive.com">Daftar Produk</a></li>
                            <li><a href="http://www.cssdrive.com">Pendaftaran Produk</a></li>
                            <li><a href="http://www.cssdrive.com">Saldo & Mutasi</a></li>
                            <li><a href="http://www.cssdrive.com">Laporan Pembayaran</a></li>
                            <li><a href="http://www.cssdrive.com">Laporan Penjualan</a></li>
                            <li><a href="http://www.cssdrive.com">Top 5 Food</a></li>
                            <li><a href="http://www.cssdrive.com">Rating Penilaian User</a></li>
                            <li><a href="http://www.cssdrive.com">Rating Menurut Waktu</a></li>
                        </ul>
                    </div>
                    <a class="menuitem" href="http://www.cssdrive.com">Keluar</a>
                </div>
            </div>
            <div class="col-md-8 col-md-offset-1 col-sm-8 col-sm-offset-1 col-xs-10 col-xs-offset-1">
                <p>Assuming the current page is named "current.htm", the below links when navigated to expands a particular header on that page:</p>
                <p>
                    - <a href="current.htm?submenuheader=0">Expand 1st header within "submenuheader" header group</a><br />
                </p>
            </div>
        </div>
    </div>
</div>
