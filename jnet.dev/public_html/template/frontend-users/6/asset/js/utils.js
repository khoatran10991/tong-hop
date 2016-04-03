Kuler.waitHtml = '<span class="wait"><i class="fa fa-spinner fa-spin"></i></span>';

(function () {
	var $notification = $('#notification'),
		timer;

	if (Kuler.show_custom_notification) {
		Kuler.notification_show_time = parseInt(Kuler.notification_show_time) || 2500;
	}

	function kulerAlert(type, message) {
		if (!$notification.length) {
			$notification = $('#notification');
		}

		clearTimeout(timer);

		$notification
			.html('<div class="alert alert-'+ type +'">' + message + '<button type="button" class="close" data-dismiss="alert"><i class="fa fa-times"></i></button></div>');

		if (Kuler.show_custom_notification) {
			$notification
				.addClass('active')
				.children()
					.css('display', 'none')
					.fadeIn('slow', function () {
						timer = setTimeout(function () {
							$notification.removeClass('active');
						}, Kuler.notification_show_time);
					});
		} else {
			$('html, body').animate({ scrollTop: 0 }, 'slow');
		}
	}

	window.kulerAlert = kulerAlert;
})();

cart.add = function(product_id, quantity) {
    quantity = typeof(quantity) != 'undefined' ? quantity : 1;

    $.ajax({
        url: 'index.php?route=checkout/cart/add',
        type: 'post',
        data: 'product_id=' + product_id + '&quantity=' + quantity,
        dataType: 'json',
        success: function(json) {
            $('.alert, .text-danger').remove();

            if (json['redirect']) {
                location = json['redirect'];
            }

            if (json['success']) {
                kulerAlert('success', json['success']);
                Kuler.cart_product_total += quantity;

                $('#cart-total').html(json['total']);
                $('#cart > ul').load('index.php?route=common/cart/info ul li');
            }
        }
    });
};

wishlist.add = function(product_id) {
    $.ajax({
        url: 'index.php?route=account/wishlist/add',
        type: 'post',
        data: 'product_id=' + product_id,
        dataType: 'json',
        success: function(json) {
            $('.alert').remove();

            if (json['success']) {
                kulerAlert('success', json['success']);
            }

            if (json['info']) {
                kulerAlert('info', json['info']);
            }

            $('#wishlist-total').html(json['total']);
        }
    });
};

compare.add = function(product_id) {
    $.ajax({
        url: 'index.php?route=product/compare/add',
        type: 'post',
        data: 'product_id=' + product_id,
        dataType: 'json',
        success: function(json) {
            $('.alert').remove();

            if (json['success']) {
                kulerAlert('success', json['success']);

                $('#compare-total').html(json['total']);
            }
        }
    });
};

if (Kuler.show_quick_view) {
    function initQuickView(selector) {
	    $(selector).on('click', function (evt) {
		    evt.preventDefault();

		    var $el = $(this);

		    $.magnificPopup.open({
			    items: {
				    src: this.href || $el.data('href')
			    },
			    type: 'iframe',
			    mainClass: 'mfp-fade'
		    });
        });
    };
}

jQuery(document).ready(function ($) {
	var $window = $(window);

	// Fixed Header
	if (Kuler.fixed_header) {
        $(".header").headroom({
            "offset": 41,
            classes : {
                // when element is initialised
                initial : "headerfix",
                // when scrolling up
                pinned : "headerfix--pinned",
                // when scrolling down
                unpinned : "headerfix--unpinned",
                // when above offset
                top : "headerfix--top",
                // when below offset
                notTop : "headerfix--not-top"
            }
        });
	}

	// Quick View
	if (Kuler.show_quick_view) {
		setTimeout(function () {
            initQuickView('.product-detail-button--quick-view');
        }, 500);
	}

	// Newsletter
	if (Kuler.show_newsletter) {
		$('#newsletter-form').on('submit', function () {
			var $mail = $('#newsletter-mail'),
				$button = $('#newsletter-submit'),
				mail = $mail.val();

			if (!mail) {
				return false;
			}

			$mail.prop('disabled', true);
			$button.prop('disabled', true);
			$button.after(Kuler.waitHtml);

			$.post(Kuler.newsletter_subscribe_link, {
				mail: mail
			}, function (data) {
				var type = data.status ? 'success' : 'error';

				kulerAlert(type, data.message);

				$mail.prop('disabled', false);
				$button.prop('disabled', false);

				$button.next().remove();
			}, 'json');

			return false;
		});
	}

    // Product List
    $('#list-view').click(function() {
        $('#content .product-layout + .clearfix').remove();

        $('#content .product-layout').attr('class', 'product-layout product-list col-xs-12');

        localStorage.setItem('display', 'list');
    });

    // Product Grid
    $('#grid-view').click(function() {
        $('#content .product-layout + .clearfix').remove();

        cols = $('#column-right, #column-left').length;

        if (cols == 2) {
            $('#content .product-layout').attr('class', 'product-layout product-grid col-lg-6 col-md-6 col-sm-6 col-xs-12');
            } else if (cols == 1) {
            $('#content .product-layout').attr('class', 'product-layout product-grid col-lg-4 col-md-6 col-sm-6 col-xs-12');
        } else {
            $('#content .product-layout').attr('class', 'product-layout product-grid col-lg-3 col-md-4 col-sm-6 col-xs-12');
        }

        $('#content .product-layout + .clearfix').remove();

        localStorage.setItem('display', 'grid');
    });

    if (localStorage.getItem('display') == 'list') {
        $('#list-view').trigger('click');
    } else {
        $('#grid-view').trigger('click');
    }

	//Smooth scroll to on page element
    $("#write-review").click(function(event){
        event.preventDefault();
        var review_tab_title = $('#review-tab-title');
        //calculate destination place
        var dest=0;
        if($(review_tab_title).offset().top > $(document).height()-$(window).height()){
            dest=$(document).height()-$(window).height();
        } else {
            dest=$(review_tab_title).offset().top;
        }
        //go to destination
        $('html,body').animate({ scrollTop: dest }, 500,'swing');
     });
    
	// Login Popup
	if (Kuler.login_popup) {
		$('a').each(function () {
			if (this.href == Kuler.login_url) {
				$(this).on('click', function (evt) {
					evt.preventDefault();

					$.magnificPopup.open({
						items: [
							{
								src: '#login-popup'
							}
						],
						type: 'inline',
						mainClass: 'mfp-fade'
					});
				});
			}
		});
	}

	var $popupLoginForm = $('#popup-login-form');
	$popupLoginForm.on('submit', function (evt) {
		evt.preventDefault();

		$.ajax({
			url: Kuler.popup_login_url,
			type: 'POST',
			dataType: 'json',
			data: $popupLoginForm.serialize(),
			beforeSend: function () {
				$popupLoginForm.find('[type="submit"]').after(Kuler.waitHtml);
				$popupLoginForm.find('.warning').remove();
			},
			complete: function () {
				$popupLoginForm.find('.wait').remove();
			},
			success: function (data) {
				if (data.status) {
					location.reload();
				} else {
					$popupLoginForm.prepend('<div class="warning">'+ data.message +'</div>');
				}
			}
		})
	});

	// Scroll up
	if (Kuler.enable_scroll_up) {
		var $scrollup = $('.scrollup');

		$window.scroll(function() {
			if ($window.scrollTop() > 100) {
				$scrollup.addClass('show');
			} else {
				$scrollup.removeClass('show');
			}
		});

		$scrollup.on('click', function(evt) {
			$("html, body").animate({ scrollTop: 0 }, 600);
			evt.preventDefault();
		});
	}

	if (Kuler.category_menu_type === 'accordion') {
		var $boxCategory = $('.box-category');

		$('.box-category .toggle').on('click', function () {
			var $this = $(this);

			$boxCategory
				.find('li.active')
					.removeClass('active')
					.find('ul')
						.slideUp();
			$this.next().slideDown();
			$this.parent().addClass('active');
		});
	}

    // Setup mobile main menu
    $('#btn-mobile-toggle').on('click', function () {
        var $btn = $(this);

        if ($btn.hasClass('expand')) {
            $btn.removeClass('expand')
                .next().slideUp();
        } else {
            $btn.addClass('expand')
                .next()
                .slideDown();
        }
    });

    $('.btn-expand-menu').on('click', function () {
        var $btn = $(this);

        if ($btn.parent().hasClass('expand')) {
            $btn.next().slideUp().parent().removeClass('expand');
        } else {
            $btn.next().slideDown().parent().addClass('expand');
        }
    });

    // Setup mobile tabs
    $('#btn-tabs-toggle').toggle(
        function() {
            $(this).parent().removeClass('collapse').addClass('expand').find('.ui-state-default').slideDown();
        },
        function() {
            $(this).parent().removeClass('expand').addClass('collapse').find('.ui-state-default:not(.ui-state-active)').slideUp();
        }
    );


    // Remove cleafix
    $('.product-layout + .clearfix').remove();

    // Turn off Keydown event in Live search
    $('#search input[name=\'search\']').off('keydown');
});
