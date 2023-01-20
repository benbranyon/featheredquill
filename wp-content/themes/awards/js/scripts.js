jQuery(document).ready(function( $ ) {
	"use strict";	
	
	$('p').each(function() {
        var $this = jQuery(this);
        if($this.html().replace(/\s|&nbsp;/g, '').length == 0) {
            $this.remove();
        }
    });
	
	var url = $('.slim-wrap').data('image');
	var homelink = $('.slim-wrap').data('homelink');
	$('.slim-wrap ul.menu-items').slimmenu({
        resizeWidth: '991',
        collapserTitle: '<a href="'+homelink+'" class="home-link-text"><img src="'+url+'" alt="" /></a>',
        easingEffect:'easeInOutQuint',
        animSpeed:'medium',
        indentChildren: true,
        childrenIndenter: '&raquo;'
    });
	
	$('.ts-button').each(function () {
		var hoverback = $(this).data('hoverback');
		var currentbg = $(this).data('currentbg');
		var currentbor = $(this).data('currentbor');
		var currentcolor = $(this).data('currentcolor');
		var hovercolor = $(this).data('hovercolor');
		$(this).on('mouseenter',function() {
			$(this).css({'background': hoverback, 'border-color': hoverback, 'color': hovercolor});
		});
		$(this).on('mouseleave',function() {
			$(this).css({'background': currentbg, 'border-color': currentbor, 'color': currentcolor});
		});
	});
	
	$('.site-colors ul > li > a').each(function () {
		var backgroundcolor = $(this).data('backgroundcolor');
		$(this).css({'background': backgroundcolor});
	});
	
	$('.element').each(function () {
		var text1 = $(this).data('text1');
		var text2 = $(this).data('text2');
		var text3 = $(this).data('text3');
		var text4 = $(this).data('text4');
	$(function(){
	  $(".element").typed({
		strings: [text1, text2, text3, text4],
		typeSpeed: 300
	  });
	});
	});
	
	$('#emailcontactform').validate({
		rules: {				  
		  comment: {
			required: true,
			minlength: 10
		  },
		  email: {
			required: true
		  }
		},
		messages: {
		  comment: "Please fill the message field.",
		},
		errorElement: "div",
		errorPlacement: function(error, element) {
		  element.after(error);
		}
	});
	
	$(".content").fitVids();
	
	var authorContainer = $('body');
    // This will handle stretching the cells.
	
    $('.stretch-content').each(function(){
		
        var $$ = $(this);

        var onResize = function(){

            $$.css({
                'margin-left' : 0,
                'margin-right' : 0,
                'padding-left' : 0,
                'padding-right' : 0
            });

            var leftSpace = $$.offset().left - authorContainer.offset().left;
            var rightSpace = authorContainer.outerWidth() - leftSpace - $$.parent().outerWidth();

            $$.css({
                'margin-left' : -leftSpace,
                'margin-right' : -rightSpace-30,
                'padding-left' : $$.data('stretch-type') === 'full' ? leftSpace : 0,
                'padding-right' : $$.data('stretch-type') === 'full' ? rightSpace : 0
            });
        };

        $(window).resize( onResize );
        onResize();

        $$.css({
            'border-left' : 0,
            'border-right' : 0
        });
    });
	
	$('#payment_options').prop('selectedIndex',0);

    $('#payment_options').change(function() {
        var selected = $(this).find(':selected');
        $('.product-fields-paid-version').hide();
        if ($(this).val() != 'free_submission') {
            $('.product-fields-paid-version').show();
			$('.product-fields-free-version').hide();
        } else {
			$('.product-fields-paid-version').hide();
			$('.product-fields-free-version').show();
        }
    });

});