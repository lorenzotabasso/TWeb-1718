<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>Kinon Store</title>

    <!-- CSS -->
    <link rel="stylesheet" href="css/font-awesome-4.6.3/css/font-awesome.min.css"> <!-- font-awesome -->
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/> <!--Import materialize.css-->
    <link rel="stylesheet" href="css/animate.css-master/animate.min.css"> <!-- animate css -->
    <link rel='stylesheet' href='css/nprogress.css'/> <!-- Progress bar -->
    <link type="text/css" rel="stylesheet" href="css/style.css" /> <!-- My own style -->

    <!-- SCRIPTS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> <!-- jQuery -->
    <script type="text/javascript" src="js/typed.js"></script> <!-- Typed Js -->
    <script src='js/nprogress.js'></script> <!-- Progress bar -->
    <script src="js/wow.min.js"></script> <!-- wow js-->
    <script src="js/materialize.min.js"></script> <!-- Materialize Js -->
    <script src="js/bootstrap.min.js" ></script> <!-- Load bootstrap js -->
    <script src="js/client.js" type="text/javascript"></script> <!-- Load custom js -->
    <script>

        // SMOOTH SCROLL

        $(document).on('click', 'a[href*="#"]:not([href="#"])', function(e) {
            if (location.pathname.replace(/^\//,'') === this.pathname.replace(/^\//,'') && location.hostname === this.hostname) {
                var target = $(this.hash);
                target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
                if (target.length && target.selector.indexOf("#top") > -1) {
                    $('html, body').animate({
                        scrollTop: (target.offset().top-55)
                    }, 1000);
                    e.preventDefault();
                }
                else if (target.length && target.selector.indexOf("#top") < 1 && target.selector != '') {
                    $('html, body').animate({
                        scrollTop: target.offset().top
                    }, 1000);
                    e.preventDefault();
                }
            }
        });


        $(document).ready(function() {
            $('select').material_select();
        });

        $(document).ready(function(){
            $('.tooltipped').tooltip({delay: 50});
        });

        new WOW().init();


        $('.searching').on('click', function(e){
            $(this).data('typed').reset();
            $('#search').replaceWith('<input id="search" type="search" name="searched" required>');
            $("#search").focus();

        });

        $(".value2").change(function(){

            if ($(".value1").val() === $(".value2").val()) {
                $(".value2").css('color','#4caf50');
                $("#confirmed").prop("disabled",false);
            }
            else {
                $(".value2").css('color','#b71c1c');
                $("#confirmed").prop("disabled",true);
            }
        });

        $("#search").focus(function(){
            $(".miaw").removeClass("hide");
        });

        $(document).ready(function(){
            $('ul.tabs').tabs();
        });

        $(document).ready(function(){
            $('.materialboxed').materialbox();
        });



        $(".baskett").hover(function(){
            $(".baskett").addClass("animated pulse");
        }, function(){
            $(".baskett").removeClass("animated pulse");
        });

        $(window).on("load",function() { // makes sure the whole site is loaded
            NProgress.start();
            NProgress.inc(0.3);
            NProgress.done();

            $('body').delay(350).css({
                'overflow': 'visible'
            });
        });
    </script>
</head>
<body>