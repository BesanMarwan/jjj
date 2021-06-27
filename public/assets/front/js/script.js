$(function () {
    new WOW().init();
    $('.closeIcon').click(function () {
        $('.search-page').fadeOut();
    });
    $('.search').click(function () {
        $('.search-page').fadeIn();
    });

    $('.euro').mouseenter(function () {
        $('.euro-box').fadeIn();
    });
    $('.wheather').mouseenter(function () {
        $('.wheather-box').fadeIn();
    });
     $('.euro').mouseleave(function () {
        $('.euro-box').fadeOut();
    });
    $('.wheather').mouseleave(function () {
        $('.wheather-box').fadeOut();
    });

    
  

    $(document).scroll(function () {
        var $nav = $(".menu-web");
        $nav.toggleClass('stick', $(this).scrollTop() > $nav.height());

    });
    $('ul li a').click(function () {
        $('li a').removeClass("active");
        $(this).addClass("active");
    });
    //  nav menu mobile
    $('.close').click(function () {
        $('.navmo-menu').fadeOut();
    });
    $('.navbar-toggler').click(function () {
        $('.navmo-menu').fadeIn();
    });
    
  
})
