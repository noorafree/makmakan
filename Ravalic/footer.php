<?php
/**
 * Created by PhpStorm.
 * User: Chandra
 * Date: 11/14/2015
 * Time: 6:06 PM
 */ ?>

<div class="container-fluid footer" id="section4">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-3 col-sm-6 col-xs-12 division">
                    <h3>CATEGORIES</h3>

                    <p>American Foods</p>

                    <p>Indonesian Foods</p>

                    <p>Asian Foods</p>

                    <p>Indian Foods</p>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12 division">
                    <h3>CONTACT US</h3>

                    <p>Ruko Garden Shopping Arcade Jl. Letjen S.Parman Kav. 28</p

                    <p>Grogol - Petamburan Jakarta Barat 11470</p>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12 division">
                    <br/><br/>

                    <p>Email: sales@makmakan.com

                    <p>Senin - Jumat: 10.00 - 19.00</p>

                    <p>Sabtu: 10.00 - 17.00</p>

                    <p>Minggu: 12.00 - 17.00</p>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12 division">
                    <h3>KEEP IN TOUCH</h3>
                    <input style="border-radius: 0;" id="subscriber" type="text" class="form-control"
                           placeholder="enter your email here"/>

                    <h3>BE SOCIAL</h3>
                    <a href="#"><img src="images/facebook.gif" style="width: 20%; height: auto;"/></a>
                    <a href="#"><img src="images/twitter.gif" style="width: 20%; height: auto;"/></a>
                    <a href="#"><img src="images/gplus.gif" style="width: 20%; height: auto;"/></a>
                </div>
            </div>
            <div class="col-md-12 copyright">
                <p>Copyright &copy; 2015 Makmakan is a registered trademark</p>
            </div>
        </div>
    </div>
</div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/jquery.countTo.js"></script>
<script type="text/javascript" src="js/jquery.waypoints.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js"></script>
<script src="js/lightbox.min.js"></script>
<script>
    function initialize() {
        var mapCanvas = document.getElementById('map-canvas');
        var mapOptions = {
            center: new google.maps.LatLng(26.802100, 75.822739),
            zoom: 8,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        }
        var map = new google.maps.Map(mapCanvas, mapOptions)
    }
    google.maps.event.addDomListener(window, 'load', initialize);
</script>
<script>
    $(document).ready(function () {
        $(document).on("scroll", onScroll);

        $('a[href^="#"]').on('click', function (e) {
            e.preventDefault();
            $(document).off("scroll");

            $('a').each(function () {
                $(this).removeClass('active');
            })
            $(this).addClass('active');

            var target = this.hash;
            $target = $(target);
            $('html, body').stop().animate({
                'scrollTop': $target.offset().top
            }, 500, 'swing', function () {
                window.location.hash = target;
                $(document).on("scroll", onScroll);
            });
        });
    });

    function onScroll(event) {
        var scrollPosition = $(document).scrollTop();
        $('nav a').each(function () {
            var currentLink = $(this);
            var refElement = $(currentLink.attr("href"));
            if (refElement.position().top <= scrollPosition && refElement.position().top + refElement.height() > scrollPosition) {
                $('nav ul li a').removeClass("active");
                currentLink.addClass("active");
            }
            else {
                currentLink.removeClass("active");
            }
        });
    }
</script>
<script type="text/javascript">
    jQuery(function ($) {
        // custom formatting example
        $('.timer').data('countToOptions', {
            formatter: function (value, options) {
                return value.toFixed(options.decimals).replace(/\B(?=(?:\d{3})+(?!\d))/g, ',');
            }
        });

        // start all the timers
        $('#starts').waypoint(function () {
            $('.timer').each(count);
        });

        function count(options) {
            var $this = $(this);
            options = $.extend({}, options || {}, $this.data('countToOptions') || {});
            $this.countTo(options);
        }
    });
</script>

</body>
</html>
