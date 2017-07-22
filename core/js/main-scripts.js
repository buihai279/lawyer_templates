// =============================================================================
// JS/ING-MAIN.JS
// -----------------------------------------------------------------------------
// Theme specific functions.
// =============================================================================


jQuery(document).ready(function($) {

	"use strict";
  //
  // Prevent default behavior of various toggles.
  //

  $('.bizzex-btn-navbar, .bizzex-btn-widgetbar').click(function(e) {
    e.preventDefault();
  });

  //
  // Video Background Hack
  //
  setTimeout(function(){$('#big-video-wrap').trigger('resize');}, 300)


  //
  // Input Number
  //

	$('input[type=number]').iLightInputNumber({
	    mobile: false
	});

	//
	// Search Focus
	//

	$('.bizzex-navbar-search').click(function(){
		  $('.bizzex-search-bar').addClass('in');
		  $('.bizzex-search-bar .search-query').focus();
		  return false;
	});

	$('.bizzex-woo-navbar-search').click(function(){
		  $('.bizzex-woo-search-bar').addClass('in');
		  $('.bizzex-woo-search-bar .search-query').focus();
		  return false;
	});

	$('.bizzex-searchform-overlay-inner').click(function(e){
	    if ($(e.target).closest(".search-query").length === 0) {
	        $('.bizzex-search-bar').removeClass('in');
	        $('.bizzex-woo-search-bar').removeClass('in');
	    }
	    return false;
	});


  //
  // Scroll to the bottom of the slider.
  //

  $('.bizzex-slider-revolution-container.above .bizzex-slider-scroll-bottom').click(function(e) {
    e.preventDefault();
    $('html, body').animate({
      scrollTop: $('.bizzex-slider-revolution-container.above').outerHeight()
    }, 850, 'easeInOutExpo');
  });

  $('.bizzex-slider-revolution-container.below .bizzex-slider-scroll-bottom').click(function(e) {
    e.preventDefault();
    if (!$('body').hasClass('transparent-header')) {
    	var $mastheadHeight   = $('.masthead').outerHeight();
    } else {
	    var $mastheadHeight   = 0;
    }
    var $navbarFixedTopHeight = $('.bizzex-navbar-fixed-top-active .bizzex-navbar').outerHeight();
    var $sliderAboveHeight    = $('.bizzex-slider-revolution-container.above').outerHeight();
    var $sliderBelowHeight    = $('.bizzex-slider-revolution-container.below').outerHeight();
    var $heightSum            = $mastheadHeight + $sliderAboveHeight + $sliderBelowHeight - $navbarFixedTopHeight;
    $('html, body').animate({
      scrollTop: $heightSum
    }, 850, 'easeInOutExpo');
  });


  //
  // Apply appropriate classes for the fixed-top navbar.
  //

  var $window     = $(window);
  var $this       = $(this);
  var $body       = $('body');
  var $navbar     = $('.bizzex-navbar');
  var $navbarWrap = $('.bizzex-navbar-fixed-top-active .bizzex-navbar-wrap');

    if ( $body.hasClass('bizzex-boxed-layout-active') && $body.hasClass('bizzex-navbar-fixed-top-active') && $body.hasClass('admin-bar') ) {
      $window.scroll(function() {
        var $adminbarHeight = $('#wpadminbar').outerHeight();
        var $menuTop        = $navbarWrap.offset().top - $adminbarHeight;
        var $current        = $this.scrollTop();
        if ($current >= $menuTop) {
          $navbar.addClass('bizzex-navbar-fixed-top bizzex-container-fluid max width');
        } else {
          $navbar.removeClass('bizzex-navbar-fixed-top bizzex-container-fluid max width');
        }
      });
    } else if ( $body.hasClass('bizzex-navbar-fixed-top-active') && $body.hasClass('admin-bar') ) {
      $window.scroll(function() {
        var $adminbarHeight = $('#wpadminbar').outerHeight();
        var $menuTop        = $navbarWrap.offset().top - $adminbarHeight;
        var $current        = $this.scrollTop();
        if ($current >= $menuTop) {
          $navbar.addClass('bizzex-navbar-fixed-top');
        } else {
          $navbar.removeClass('bizzex-navbar-fixed-top');
        }
      });
    } else if ( $body.hasClass('bizzex-boxed-layout-active') && $body.hasClass('bizzex-navbar-fixed-top-active') ) {
      $window.scroll(function() {
        var $menuTop = $navbarWrap.offset().top;
        var $current = $this.scrollTop();
        if ($current >= $menuTop) {
          $navbar.addClass('bizzex-navbar-fixed-top bizzex-container-fluid max width');
        } else {
          $navbar.removeClass('bizzex-navbar-fixed-top bizzex-container-fluid max width');
        }
      });
    } else if ( $body.hasClass('bizzex-navbar-fixed-top-active') ) {
      $window.scroll(function() {
        var $menuTop = $navbarWrap.offset().top;
        var $current = $this.scrollTop();
        if ($current >= $menuTop) {
          $navbar.addClass('bizzex-navbar-fixed-top');
        } else {
          $navbar.removeClass('bizzex-navbar-fixed-top');
        }
      });
    }

	//Dynamic menu

	if ( $body.hasClass('bizzex-navbar-dynamic-active') && $body.hasClass('admin-bar')) {

	    var $window     = $(window);
	  	var $this       = $(this);
	  	var $body       = $('body');
		var $lastScrollTop = 0;
		var $navbar     = $('.bizzex-navbar');
		var $navbarWrap = $('.bizzex-navbar-dynamic-active .bizzex-navbar-wrap');

		$(window).scroll(function(event){
			var $adminbarHeight = $('#wpadminbar').outerHeight();
	        var $menuTop = $navbarWrap.offset().top - $adminbarHeight;
	        var $current = $this.scrollTop();
	        if ($current >= $menuTop) {
	          $navbar.addClass('bizzex-navbar-fixed-top');
	          $navbarWrap.addClass('bizzex-fixed-navbar-activated');
	        } else {
	          $navbar.removeClass('bizzex-navbar-fixed-top');
	          $navbarWrap.removeClass('bizzex-fixed-navbar-activated');
	        }

		   if ($current > $lastScrollTop && $current > $menuTop + $navbar.height()){
				 	if ($navbarWrap.hasClass('bizzex-fixed-navbar-activated')) {
		       		$navbar.addClass('uppinned-header');
				  }
		   } else {
		       $navbar.removeClass('uppinned-header');
		   }
		   $lastScrollTop = $current;
		});

		if ( $body.hasClass('bizzex-boxed-layout-active')) {
			$navbar.addClass('bizzex-container-fluid max width');
		}

	} else if ( $body.hasClass('bizzex-navbar-dynamic-active') ) {

	    var $window     = $(window);
	  	var $this       = $(this);
	  	var $body       = $('body');
		var $lastScrollTop = 0;
		var $navbar     = $('.bizzex-navbar');
		var $navbarWrap = $('.bizzex-navbar-dynamic-active .bizzex-navbar-wrap');

		$(window).scroll(function(event){

	        var $menuTop = $navbarWrap.offset().top;
	        var $current = $this.scrollTop();
	        if ($current >= $menuTop) {
	          $navbar.addClass('bizzex-navbar-fixed-top');
	          $navbarWrap.addClass('bizzex-fixed-navbar-activated');
	        } else {
	          $navbar.removeClass('bizzex-navbar-fixed-top');
	          $navbarWrap.removeClass('bizzex-fixed-navbar-activated');
	        }

		   if ($current > $lastScrollTop && $current > $menuTop + $navbar.height() ){
				 if ($navbarWrap.hasClass('bizzex-fixed-navbar-activated')) {
						$navbar.addClass('uppinned-header');
			  	}
		   } else {
		       $navbar.removeClass('uppinned-header');
		   }
		   $lastScrollTop = $current;
		});

		if ( $body.hasClass('bizzex-boxed-layout-active')) {
			$navbar.addClass('bizzex-container-fluid max width');
		}

	}



 	/*=========MegaMenu===================*/

 	function megaMenuAlign() {
	 	var navbarInner = $('.bizzex-navbar-inner');
	 	if (navbarInner.length) {

	 		var contentWidth = navbarInner.width();
		 	var bodytWidth = $('body').width();
			var menuWidth = $('.bizzex-megamenu-wrapper').width();

			if($('.bizzex-megamenu-wrapper').hasClass('bizzex-megamenu-fullwidth')) {
			 	$('.bizzex-megamenu-wrapper').each(function(){
			 		$(this).find('.bizzex-megamenu-holder').css('width',contentWidth);
			 		var leftPos = $(this).parent().offset();
			 		if ($('body').hasClass('bizzex-navbar-centered-active') && !$('body').hasClass('demo-fixed-top-menu')) {
			 			var alignLeft = leftPos.left - (bodytWidth - contentWidth)/2;
			 		} else {
				 		var alignLeft = leftPos.left + 2 - (bodytWidth - contentWidth)/2;
			 		}
			 		$(this).css('left',- alignLeft);
			 	});
			} else {
				$('.bizzex-megamenu-wrapper').each(function(){
					var leftPos = $(this).parent().offset();
					var menuParentWidth = $(this).parent().width();

						//var alignRight = (bodytWidth + menuParentWidth) - leftPos.left - (bodytWidth - contentWidth)/2;

						var alignRight = bodytWidth - leftPos.left - menuParentWidth - (bodytWidth - contentWidth)/2 + 1;

						console.log(bodytWidth, leftPos.left, menuParentWidth, alignRight);

					$(this).css('right',- alignRight);
				});
			}

		 } else {
			 return false;
		 }
 	}

 	megaMenuAlign();

 	$(window).resize(function(){ megaMenuAlign(); });

	//   function linkUpdateStyle() {
	// 	  $('.bizzex-navbar a[href*=#]:not([href=#])').each(function(){
	// 		  $(this).parent().removeClass('current-menu-item');
	// 		  if ($(this).attr('href') == window.location.href) {
	// 			   $(this).parent().addClass('current-menu-item');
	// 		  }
	// 	  });
	//   }
	//   linkUpdateStyle();
	 //
	//  $('.bizzex-navbar a[href*=#]:not([href=#])').click(function(e) {
	// 	 	e.preventDefault();
	//     if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
	//       var target = $(this.hash);
	//       target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
	//       if (target.length) {
	//       	$(this).closest('.sub-menu').find('a').parent().removeClass('current-menu-item');
	//       	$(this).parent().addClass('current-menu-item');
	//         $('html,body').animate({
	//           scrollTop: target.offset().top - $('.bizzex-navbar').outerHeight()
	//         }, 1000, 'easeInOutExpo');
	//       }
	//     }
	//   });

	  /*==========Coming Soon Page Vertical Align============*/
	  function soonAlign(){
		  var bogyHeight = $('body').height();
		  var contentHeight = $('.comingsoon-block .bizzex-column').height();
		  var kompHeight = (bogyHeight - contentHeight)/2;
		  if (kompHeight <= 70) { kompHeight = 70 };
		  $('.comingsoon-block .bizzex-column').css('margin-top',kompHeight);
	  }
	  soonAlign();


	//Transparent Navbar
	if ( $body.hasClass('bizzex-alt-header-active') ) {
		var headerHeight = -1 * $('.masthead').outerHeight() - 1;
		// $('.masthead').css('margin-bottom',headerHeight);
		var scrollTop = 0;
		$(window).scroll(function(event){
		   var pos = $(this).scrollTop();
		   if (pos - 200 > 0) {
		       if (!$body.hasClass('bizzex-navbar-static-active')) {
			   		$body.removeClass('bizzex-alt-header-active');
			   	}
		   } else {
		   	   $body.addClass('bizzex-alt-header-active');
		   }
		});

	}

});


;(function ($) {

    $.fn.iLightInputNumber = function (options) {

        var inBox = '.input-number-box',
            newInput = '.input-number',
            moreVal = '.input-number-more',
            lessVal = '.input-number-less';

        this.each(function () {

            var el = $(this);
            $('<div class="' + inBox.substr(1) + '"></div>').insertAfter(el);
            var parent = el.find('+ ' + inBox);
            parent.append(el);
            var classes = el.attr('class');
            parent.append('<input class="' + newInput.substr(1) + '" type="text">');
            el.hide();
            var newEl = el.next();
            newEl.addClass(classes);
            var attrValue;

            function setInputAttr(attrName) {
                if (el.attr(attrName)) {
                    attrValue = el.attr(attrName);
                    newEl.attr(attrName, attrValue);
                }
            }

            setInputAttr('value');
            setInputAttr('placeholder');
            setInputAttr('min');
            setInputAttr('max');
            setInputAttr('step');

            parent.append('<div class=' + moreVal.substr(1) + '></div>');
            parent.append('<div class=' + lessVal.substr(1) + '></div>');

        }); //end each

        var value,
            step;

        var interval = null,
            timeout = null;

            function ToggleValue(input) {
                input.val(parseInt(input.val(), 10) + d);
                console.log(input);
            }

            $('body').on('mousedown', moreVal, function () {
                var el = $(this);
                var input = el.siblings(newInput);
                moreValFn(input);
                timeout = setTimeout(function(){
                    interval = setInterval(function(){ moreValFn(input); }, 50);
                }, 200);

            });

            $('body').on('mousedown', lessVal, function () {
                var el = $(this);
                var input = el.siblings(newInput);
                lessValFn(input);
                timeout = setTimeout(function(){
                    interval = setInterval(function(){ lessValFn(input); }, 50);
                }, 200);
            });

            $(moreVal +', '+ lessVal).on("mouseup mouseout", function() {
                clearTimeout(timeout);
                clearInterval(interval);
            });

            function moreValFn(input){
                var max = input.attr('max');
                checkInputAttr(input);
                var newValue = value + step;
                if (newValue > max) {
                    newValue = max;
                }
                changeInputsVal(input, newValue);
            }

            function lessValFn(input){
                var min = input.attr('min');
                checkInputAttr(input);
                var newValue = value - step;
                if (newValue < min) {
                    newValue = min;
                }
                changeInputsVal(input, newValue);
            }

            function changeInputsVal(input, newValue){
                input.val(newValue);
                var inputNumber = input.siblings(this);
                inputNumber.val(newValue);
            }

            function checkInputAttr(input) {
                if (input.attr('value')) {
                    value = parseFloat(input.attr('value'));
                } else if (input.attr('placeholder')) {
                    value = parseFloat(input.attr('placeholder'));
                }
                if (!( $.isNumeric(value) )) {
                    value = 0;
                }
                if (input.attr('step')) {
                    step = parseFloat(input.attr('step'));
                } else {
                    step = 1;
                }
            }

            $(newInput).change(function () {
                var input = $(this);
                var value = parseFloat(input.val());
                var min = input.attr('min');
                var max = input.attr('max');
                if (value < min) {
                    value = min;
                } else if (value > max) {
                    value = max;
                }
                if (!( $.isNumeric(value) )) {
                    value = '';
                }
                input.val(value);
                input.siblings(this).val(value);
            });

            $(newInput).keydown(function(e){
                var input = $(this);
                var k = e.keyCode;
                if( k == 38 ){
                    moreValFn(input);
                }else if( k == 40){
                    lessValFn(input);
                }
            });
    };
})(jQuery);
