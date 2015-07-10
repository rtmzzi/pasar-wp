(function( $ ) {
	"use strict";

	$(document).ready(function(){

		if ( $( ".site-header .header-links ul li ul.sub-menu" ).length ) {
	  		$( ".site-header .header-links ul li ul.sub-menu" ).clone().appendTo( ".sb-slidebar.sb-left" ).removeClass('sub-menu').addClass('menu-slidebar');
		}

		if ( $( "#topnav-menu" ).length ) {
	  		$( "#topnav-menu" ).clone().appendTo( ".sb-slidebar.sb-left" ).removeClass('topnav-menu sf-menu').addClass('menu-slidebar');
		}

		if ( $( ".topnav-left > * " ).length ) {
	  		$( ".topnav-left > * " ).clone().appendTo( ".sb-slidebar.sb-left" );
		}

		if ( $( ".topnav-social" ).length ) {
	  		$( ".topnav-social" ).clone().appendTo( ".sb-slidebar.sb-left" );
		}

		if ( $( "#header-menu" ).length ) {
	  		$( "#header-menu" ).clone().appendTo( ".sb-slidebar.sb-left" ).removeClass('header-menu sf-menu').addClass('menu-slidebar');
		}

		if(jQuery.isFunction($().superfish)) {
			$('ul.header-menu').superfish({
				speed: 1,
				speedOut: 1
			});
  		}

		if(jQuery.isFunction($.slidebars)) {
			$.slidebars();
  		}

		$('.widget_tag_cloud .tagcloud a').removeAttr('style');

		$('[data-background]').each(function() {
			var bg = $(this).data("background");
			$(this).css('background-image', "url(" + bg + ")");
		});
		
		// BACK TO TOP
		$("#back-top").hide();
		if ($('body').width() >= 480) {
			$(window).scroll(function () {
				if ($(this).scrollTop() > 300) {
					$('#back-top').fadeIn();
				} else {
					$('#back-top').fadeOut();
				}
			});
			$('#back-top').click(function () {
				$('body,html').animate({scrollTop: 0}, 800);
				return false;
			});
		}

		// TAB FUNCTION
		$('ul.tabs').each(function(){
			// For each set of tabs, we want to keep track of
			// which tab is active and it's associated content
			var $active, $content, $links = $(this).find('a');

			// If the location.hash matches one of the links, use that as the active tab.
			// If no match is found, use the first link as the initial active tab.
			$active = $($links.filter('[href="'+location.hash+'"]')[0] || $links[0]);
			$active.addClass('active');

			$content = $($active[0].hash);

			// Hide the remaining content
			$links.not($active).each(function () {
				$(this.hash).hide();
			});

			// Bind the click event handler
			$(this).on('click', 'a', function(e){
				// Make the old tab inactive.
				$active.removeClass('active');
				$content.hide();

				// Update the variables with the new link and content
				$active = $(this);
				$content = $(this.hash);

				// Make the tab active.
				$active.addClass('active');
				$content.show();

				// Prevent the anchor's default click action
				e.preventDefault();
			});
		});

		if(jQuery.isFunction($().owlCarousel)) {

			// SHORTCODE BRAND
			$(".tpvc-brands").owlCarousel({
				loop: true,
				nav : true,
				stopOnHover : true,
				navText : ['<i class="ficon-angle-left"></i>', '<i class="ficon-angle-right"></i>'],
				lazyLoad: true,
				dots: false,
				responsive:{
					0:{
						items:1
					},
					769:{
						items:4
					},
				}
			});

			$('.format-gallery .framebox.gallery-post ul').owlCarousel({
				items : 1,
				loop: true,
				nav : true,
				stopOnHover : true,		
				navText : ['<i class="ficon-angle-left"></i>', '<i class="ficon-angle-right"></i>'],
				lazyLoad: true,
				dots: false
			});

			$('.tpvc-slider-active').owlCarousel({
				items : 1,
				loop: true,
				nav : true,
				stopOnHover : true,		
				navText : ['<i class="ficon-angle-left"></i>', '<i class="ficon-angle-right"></i>'],
				lazyLoad: true,
				dots: false,
			    autoplay: true,
				autoplayHoverPause: true,
			    animateOut: 'fadeOut'
			});
		}

		/* Move cross-sell below cart totals on cart page */
		$('.woocommerce .cart-collaterals .cross-sells, .woocommerce-page .cart-collaterals .cross-sells').appendTo('.woocommerce .cart-collaterals, .woocommerce-page .cart-collaterals');

	});

	jQuery(document).on("scroll",function(){
		if( jQuery(document).scrollTop() > 50 ) {
			jQuery("body.sticky-header-yes").removeClass("header-large").addClass("header-small");
		}
		else {
			jQuery("body.sticky-header-yes").removeClass("header-small").addClass("header-large");
		}
	});

})( jQuery );