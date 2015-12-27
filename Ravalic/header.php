<?php
/**
 * Created by PhpStorm.
 * User: Chandra
 * Date: 11/14/2015
 * Time: 6:02 PM
 */ ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Makmakan - Homemade food right into your doorstep!</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    <link href="css/bootstrap.min.css" rel="stylesheet"/>
    <!--    <link href="css/bootstrap.css" rel="stylesheet"/>-->
    <link rel="stylesheet" href="style.css" type="text/css"/>
    <link rel="stylesheet" href="style2.css" type="text/css"/>
    <link rel="stylesheet" href="style3.css" type="text/css" media="all"/>
    <link href="css/lightbox.css" rel="stylesheet"/>
    <link href='https://fonts.googleapis.com/css?family=Lato:400,400italic,700,700italic' rel='stylesheet'
          type='text/css'/>


    <script src="js/jquery-2.1.4.min.js"></script>
    <script src="js/nouislider.js"></script>

    <link rel="stylesheet" href="css/nouislider.css" type="text/css" media="all"/>
    <link rel="stylesheet" href="css/nouislider.pips.css" type="text/css" media="all"/>
    <link rel="stylesheet" href="css/nouislider.tooltips.css" type="text/css" media="all"/>
    <script src="js/imagezoom.js"></script>
    <script src="js/jquery.flexslider.js"></script>
    <link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen"/>

    <script type="text/javascript">
        $(document).ready(function () {
            var snapSlider = document.getElementById('slider-snap');

            noUiSlider.create(snapSlider, {
                start: [25000, 200000],
                connect: true,
                step: 1000,
                range: {
                    'min': 0,
                    'max': 250000
                }
            });

            var snapValues = [
                document.getElementById('slider-snap-value-lower'),
                document.getElementById('slider-snap-value-upper')
            ];

            snapSlider.noUiSlider.on('update', function (values, handle) {
                snapValues[handle].innerHTML = values[handle];
            });
        });
    </script>

</head>
<body>
<header class="header">
    <div class="container">
        <div class="row">
            <div class="col-md-4 ">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle menu-button" data-toggle="collapse"
                            data-target="#myNavbar">
                        <span class="glyphicon glyphicon-align-justify"></span>
                    </button>
                    <a class="navbar-brand logo"><img src="images/makmakanlogo.gif" class="img-responsive"/></a>
                </div>
            </div>
            <div class="col-md-8">
                <nav class="collapse navbar-collapse" id="myNavbar" role="navigation">
                    <ul class="nav navbar-nav navbar-right menu">
                        <li><a href="#" class="active">Home</a></li>
                        <li><a href="center.php">Menu</a></li>
                        <li><a href="#">Sign In</a></li>
                        <li><a href="#"><span class="glyphicon glyphicon-shopping-cart"></span> Cart (0)</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</header>
