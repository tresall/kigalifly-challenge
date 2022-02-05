$(function(){
    var subElementArray = $.map($('.sub-element'), function(el) { return $(el).text(); });    
    $(".element").typed({
        strings: subElementArray,
        typeSpeed: 30,
        contentType: 'html',
        showCursor: false,
        loop: true,
        loopCount: true,
    });
    $('.templatemo-nav').singlePageNav({
        offset: $(".templatemo-nav").height(),
        filter: ':not(.external)',
        updateHash: false
    });
    $(window).scroll(function(){
        if($(this).scrollTop()>58){
            $(".templatemo-nav").addClass("sticky");
        }
        else{
            $(".templatemo-nav").removeClass("sticky");
        }
    });
    $('.navbar-collapse a').click(function(){
        $(".navbar-collapse").collapse('hide');
    });
    $('body').bind('touchstart', function() {});
    new WOW().init();
});
$(window).load(function(){
	$('.preloader').fadeOut(1000); 
});

$(document).ready(function () {
    var btn = $('#sendSms');
    $('#sendSms').click(function (e) { 
        e.preventDefault();
        var name = $('#fullname').val();
        var email = $('#email').val();
        var msg = $('#msg').val();

        if (name != '' && email != '' && msg != '') {
            $.ajax({
                method: "post",
                url: "send.php",
                data: $('#mesgForm').serialize(),
                beforeSend: () => {
                    $('.msg').html('<i class="fa fa-spinner "></i> submitting ...');
                },
                error: (error) => {
                    console.error(error.statusText);
                },
                success: function (response) {
                    $('.msg').html(response);
                    setTimeout(() => {
                        $('.msg').fadeOut(1000);
                    }, 5000);
                }
            });
        } else {
            alert('Fill all fields');
        }
    });
});
