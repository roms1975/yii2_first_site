$(document).ready(function() {
    $(".fancy").fancybox({
		buttons: [
		"close"
		],
	});
    
    if($('.scroll-to-top').length < 1) {
        var _isScrolling = false;

        $("body").append($("<a />")
                        .addClass("scroll-to-top")
                        .attr({
                            "href": "#",
                            "id": "scrollToTop"
                        })
                        .append(
                            $("<i />")
                                .addClass("fas fa-arrow-up")
                        ));

        $("#scrollToTop").click(function(e) {

            e.preventDefault();
            $("body, html").animate({scrollTop : 0}, 500);
            return false;

        });
        
        $(window).scroll(function() {
            if(!_isScrolling) {
                _isScrolling = true;
                if($(window).scrollTop() > 150) {
                    $("#scrollToTop").stop(true, true).addClass("visible");
                    _isScrolling = false;
                } else {
                    $("#scrollToTop").stop(true, true).removeClass("visible");
                    _isScrolling = false;
                }
            }
        });
    }
    
    let frst_form = $('.first-form');
    let snd_btn = frst_form.find('.snd-btn');
    snd_btn.addClass('disabled');
    let required_fields = frst_form.find('.required');
	
    function check_fields() {
        $.each(required_fields, function(key, val) {
        if ($(val).val() == "") {

                $(val).addClass('err');
            } else {
                $(val).removeClass('err');
            }
        });
        /*
        if (frst_form.find('input[name="name"]').val() != "" 
        && frst_form.find('input[name="phone"]').val() != "" 
        && frst_form.find('input[name="email"]').val() != "") {
            frst_form.find('.snd-btn').removeClass('disabled');
        */
        if(frst_form.find('.err').length == 0) {
            frst_form.find('.snd-btn').removeClass('disabled');
            return true;
        } else {
            frst_form.find('.snd-btn').addClass('disabled');
            return false;
        }
    }
	
    required_fields.on('change keyup click', function() {
        check_fields();
    });
    
    snd_btn.on('click', function() {
        if (check_fields()) {
            $.ajax({
                type: 'POST',
                url: '/sendpost/send_smtp.php',
                data: frst_form.serialize(),
                success: function (data) {
                    $(frst_form).html(data);
                }
            });
        }
    });
	
	$('.enter').on('click', function() {
		$(this).closest('.top-menu').toggleClass('show');
	});
	
	$('#login .fa-times').on('click', function() {
		$(this).closest('.top-menu').removeClass('show');
	});
        
	$('.logout').on('click', function() {
		$(this).closest('.log-out').submit();
	});
	
 });