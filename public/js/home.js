$(document).ready(function(){
    $('#shop-name').animate({fontSize: "6em" }, 1500 );

    $('#back-to-top').on('click', function(){
        $('html, body').animate({
            scrollTop: 0
        }, 400)
    })

    $('#to-feature').on('click', function(e){
        e.preventDefault();
        $('html, body').animate({
            scrollTop: $('.feature-product').offset().top
        }, 800)
    })
})
