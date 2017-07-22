// =============================================================================
// JS/ING-SHORTCODES.JS
// -----------------------------------------------------------------------------
// Custom shortcode scripts for the Cavalier Shortcodes plugin.
// =============================================================================

jQuery(document).ready(function($) {

  //
  // Parallax effect.
  //

  var windowObj    = $(window);
  var windowHeight = windowObj.height();
  var body         = $('body');
  var thisObj      = $(this);

  windowObj.resize(function () {
    windowHeight = windowObj.height();
  });

  $.fn.parallaxContentBand = function(xAxis, parallaxSpeed) {
    var thisObj = $(this);
    var contentBandFirstTop;

    thisObj.each(function(){
      contentBandFirstTop = thisObj.offset().top;
    });

    windowObj.resize(function(){
      thisObj.each(function(){
        contentBandFirstTop = thisObj.offset().top;
      });
    });

    function windowUpdate(){
      var windowPosition = windowObj.scrollTop();

      thisObj.each(function(){
        var contentBandOffsetTop = thisObj.offset().top;
        var contentBandHeight    = thisObj.outerHeight();

        if (contentBandOffsetTop + contentBandHeight < windowPosition || contentBandOffsetTop > windowPosition + windowHeight) {
          return;
        }

        // thisObj.css('background-position', xAxis + ' ' + Math.floor((contentBandFirstTop - windowPosition) * parallaxSpeed) + 'px');
      });
    }

    windowObj.bind('scroll', windowUpdate).resize(windowUpdate);
    windowUpdate();
  };

  if (Modernizr.touch) {
    $('.bizzex-content-band.bg-image.parallax, .bizzex-content-band.bg-pattern.parallax').css('background-attachment', 'scroll');
  } else {
    $('.bizzex-content-band.bg-image.parallax').each(function(){
       var id = $(this).attr('id');
       $('#' + id + ".parallax").parallaxContentBand('50%', 0.1);
    });
    $('.bizzex-content-band.bg-pattern.parallax').each(function(){
       var id = $(this).attr('id');
       $('#' + id + ".parallax").parallaxContentBand('50%', 0.3);
    });
  }


  //
  // Waypoint: fade.
  //

  $('.bizzex-column[data-fade="true"]').each(function() {
    var $this = $(this);
    $this.waypoint(function() {
      $this.addClass('animated');
    }, { offset: '65%' });
  });

  $('.bizzex-pricing-column').each(function(i) {
    var $this = $(this);
    $this.waypoint(function() {
      setTimeout(function(){
        $this.addClass("animated");
       }, i*300);
    }, { offset: '65%' });
  });

  $('.footer-content').each(function() {
    var $this = $(this);
    $this.waypoint(function() {
      $this.addClass('animated');
    }, { offset: '100%' });
  });


  //
  // Waypoint: recent posts.
  //

  $('.bizzex-recent-posts[data-fade="true"]').each(function() {
    var $this = $(this);
    $this.waypoint(function() {
      $this.find('a').each(function(i) {
        $this.delay(i * 90).animate({ 'opacity' : '1' }, 750, 'easeOutExpo');
      });
      setTimeout(function() {
        $this.addClass('complete');
      }, ($this.find('a').length * 90) + 400);
    }, { offset: '75%' });
  });


  //
  // Waypoint: skill bar.
  //

  $('.bizzex-skill-bar').each(function(){
    var $this = $(this);
    $this.waypoint(function() {
      var percent = $this.attr('data-percentage');
      $this.find('.bar').animate({'width': percent + '%'}, 1000, 'easeInOutExpo');
    }, { offset: '100%' });
  });


  //
  // Ensure accordion collapse class.
  //

  $('.bizzex-accordion-toggle[data-parent]').click(function(){
    $(this).closest('.bizzex-accordion').find('.bizzex-accordion-toggle:not(.collapsed)').addClass('collapsed');
  });

});

(function($) {
    $.fn.countTo = function(options) {
        // merge the default plugin settings with the custom options
        options = $.extend({}, $.fn.countTo.defaults, options || {});

        // how many times to update the value, and how much to increment the value on each update
        var loops = Math.ceil(options.speed / options.refreshInterval),
            increment = (options.to - options.from) / loops;

        return $(this).each(function() {
            var _this = this,
                loopCount = 0,
                value = options.from,
                interval = setInterval(updateTimer, options.refreshInterval);

            function updateTimer() {
                value += increment;
                loopCount++;
                $(_this).html(value.toFixed(options.decimals));

                if (typeof(options.onUpdate) == 'function') {
                    options.onUpdate.call(_this, value);
                }

                if (loopCount >= loops) {
                    clearInterval(interval);
                    value = options.to;

                    if (typeof(options.onComplete) == 'function') {
                        options.onComplete.call(_this, value);
                    }
                }
            }
        });
    };

    $.fn.countTo.defaults = {
        from: 0,  // the number the element should start at
        to: 100,  // the number the element should end at
        speed: 1000,  // how long it should take to count between the target numbers
        refreshInterval: 100,  // how often the element should be updated
        decimals: 0,  // the number of decimal places to show
        onUpdate: null,  // callback method for every time the element is updated,
        onComplete: null,  // callback method for when the element finishes updating
    };
})(jQuery);
