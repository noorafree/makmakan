/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

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

// Can also be used with $(document).ready()
$(window).load(function () {
    $('.flexslider').flexslider({
        animation: "slide",
        controlNav: "thumbnails"
    });
});

$(".add-re").click(function () {
    $(".form-comment").show("slow");
    $("a.add-re").hide("slow");
});
