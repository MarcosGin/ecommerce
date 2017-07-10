$(document).ready(function() {
    $(".learDescri").on('click', function() {
        if ($(".descri").css("display") == "none") {
            $(".descri").slideDown(250);
        } else {
            $(".descri").slideUp(500);
        }
    });
    $('.slider-for').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        fade: true,
        asNavFor: '.slider-nav'
    });
    $('.slider-nav').slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        asNavFor: '.slider-for',
        dots: true,
        centerMode: true,
        focusOnSelect: true
    });
});