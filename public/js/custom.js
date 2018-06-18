//Contact Form Ajax (start)
$(document).ready(function(){
    $("#submit").click(function(){

        var data = {
            name : $('input[name=name]').val(),
            email : $('input[name=email]').val(),
            message : $('textarea[name=message]').val(),
            _token: $('input[name=_token]').val()
        };


        $.ajax({
            url: '/contact',
            method: 'POST',
            data:  data,

            success: function(data) {
                alert(data);
            }
        });

    });

if($('.owl-carousel.articles').imagesLoaded()){
    $('.owl-carousel.articles').owlCarousel({
        autoplay:true,
        loop:true,
        margin:0,
        items:3,
        dots:true,
        lazyLoad:true,
        autoplayTimeout:3000,
        autoplayHoverPause:true

    })
}

    if($('.owl-carousel.portfolios').imagesLoaded()){
        $('.owl-carousel.portfolios').owlCarousel({
            autoplay:true,
            loop:true,
            margin:0,
            items:3,
            dots:true,
            lazyLoad:true,
            autoplayTimeout:4500,
            autoplayHoverPause:true
        })
    }

});