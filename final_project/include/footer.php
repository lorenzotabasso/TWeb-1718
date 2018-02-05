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
</body>
</html>
