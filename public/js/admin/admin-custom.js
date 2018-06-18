//Delete User Ajax
$(document).ready(function(){

    // Flash message timeout
    setTimeout(function(){
        $('#flash-message').slideUp(300);
    },7000);



    $(".user.del").click(function(){

        var data = {
            user_id : $(this).data('user_id'),
            user_name : $(this).data('user_name'),
        };

        if (confirm("Are you sure you want to delete user " + $(this).data('user_name') + '?')){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });

            $.ajax({
                url: '/admin/user/delete',
                method: "post",
                data: data,
                success: function (res) {
                    $('[id=' + data['user_id'] + ']').remove();

                    $('#flash-message').fadeIn().text(res.response);
                    setTimeout(function(){
                        $('#flash-message').fadeOut().text(res.response);
                    },5000);
                }
            });
        }else {
            return false;
        }


    });


//Delete Article Ajax
    $(".article.del").click(function(){

        var data = {
            article_id : $(this).data('article_id'),
            article_name : $(this).data('article_name'),
        };

        if (confirm("Are you sure you want to delete article " + $(this).data('article_name') + '?')){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });

            $.ajax({
                url: '/admin/article/delete',
                method: "post",
                data: data,
                success: function (res) {
                    $('[id=' + data['article_id'] + ']').remove();

                    $('#flash-message').fadeIn().text(res.response);
                    setTimeout(function(){
                        $('#flash-message').fadeOut().text(res.response);
                    },5000);
                }
            });
        }else {
            return false;
        }



    });


//Delete Category Ajax

    $(".category.del").click(function(){

        var data = {
            category_id : $(this).data('category_id'),
            category_name : $(this).data('category_name'),
        };

        if (confirm("Are you sure you want to delete category " + $(this).data('category_name') + '?')){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });

            $.ajax({
                url: '/admin/category/delete',
                method: "post",
                data: data,
                success: function (res) {
                    $('[id=' + data['category_id'] + ']').remove();

                    $('#flashs').fadeIn().text(res.response);
                    setTimeout(function(){
                        $('#flashs').fadeOut().text(res.response);
                    },5000);
                }
            });
        }else {
            return false;
        }
    });


//Delete Portfolio Ajax

        $(".portfolio.del").click(function(){

            var data = {
                portfolio_id : $(this).data('portfolio_id'),
                portfolio_name : $(this).data('portfolio_name'),
            };

            if (confirm("Are you sure you want to delete portfolio item " + $(this).data('portfolio_name') + '?')){
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    }
                });

                $.ajax({
                    url: '/admin/portfolio/delete',
                    method: "post",
                    data: data,
                    success: function (res) {
                        $('[id=' + data['portfolio_id'] + ']').remove();

                        $('#flashs').fadeIn().text(res.response);
                        setTimeout(function(){
                            $('#flashs').fadeOut().text(res.response);
                        },5000);
                    }
                });
            }else {
                return false;
            }

        });


//Delete Comment Ajax

    $(".comment.del").click(function(){

        var data = {
            comment_id : $(this).data('comment_id'),
        };

        if (confirm('Are you sure you want to delete comment ?')){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });

            $.ajax({
                url: '/admin/comment/delete',
                method: "post",
                data: data,
                success: function (res) {
                    $('[id=' + data['comment_id'] + ']').remove();

                    $('#flashs').fadeIn().text(res.response);
                    setTimeout(function(){
                        $('#flashs').fadeOut().text(res.response);
                    },5000);
                }
            });
        }else {
            return false;
        }

    });


// MultiSelect Form
    $("#category_id").select2();
    $("#checkbox").click(function(){
        if($("#checkbox").is(':checked') ){
            $("#category_id > option").prop("selected","selected");
            $("#category_id").trigger("change");
        }else{
            $("#category_id > option").removeAttr("selected");
            $("#category_id").trigger("change");
        }
    });

    $("#button").click(function(){
        alert($("#e1").val());
    });



});

