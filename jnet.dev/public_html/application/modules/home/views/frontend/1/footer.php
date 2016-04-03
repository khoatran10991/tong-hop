<!--Thẻ Div này nằm trên header-->
</div>
<script type="text/javascript">
    $(window).load(function() {
        $('.flexslider').flexslider({
            animation: "slide",
            animationLoop: false,
            itemWidth: 210,
            itemMargin: 5,
            directionNav: true,
            controlNav: false
        });
    });
    $('.slides li').click(function(){
        var src = $(this).attr('name');
        console.log(src);
        $('body').css('background-image','url(template/frontend-users/8/public/images/'+src+'.jpg)');
        $('.slides li').removeClass('action');
        $(this).addClass('action');
    });
</script>
</body>
</html>