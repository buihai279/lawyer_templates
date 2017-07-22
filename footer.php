<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package lawyer
 */
?>
<?php 


$theme_mods=get_theme_mod('lawyer_theme_options' );
// var_dump($theme_mods);
?>
  <a class="bizzex-scroll-top right fade" href="#top" title="Back to Top">
    <i class="bizzex-icon-arrow-up"></i>
  </a>
  <script>
  jQuery(document).ready(function($) {

    $.fn.scrollBottom = function() {
      return $(document).height() - this.scrollTop() - this.height();
    };

    var windowObj            = $(window);
    var body                 = $('body');
    var bodyOffsetBottom     = windowObj.scrollBottom(); // 1
    var bodyHeightAdjustment = body.height() - bodyOffsetBottom; // 2
    var bodyHeightAdjusted   = body.height() - bodyHeightAdjustment; // 3
    var scrollTopAnchor      = $('.bizzex-scroll-top');

    function sizingUpdate(){
      var bodyOffsetTop = windowObj.scrollTop();
      if ( bodyOffsetTop > ( bodyHeightAdjusted * 0.75 ) ) {
        scrollTopAnchor.addClass('in');
      } else {
        scrollTopAnchor.removeClass('in');
      }
    }

    windowObj.bind('scroll', sizingUpdate).resize(sizingUpdate);
    sizingUpdate();

    scrollTopAnchor.click(function(){
      $('html,body').animate({ scrollTop: 0 }, 850, 'easeInOutExpo');
      return false;
    });

  });
  </script>
      <footer class="bizzex-footer" role="contentinfo">
			<div class="footer-bottom cf">
				<div class="bizzex-container-fluid max width">
					<div class="footer-content animate-in-from-top">
			          <div class="bizzex-social-footer cf">
                  <div class="bizzex-social-footer-inner">
                    <?php 
                      $social=json_decode($theme_mods['social_footer']);
                      foreach ($social as $value)
                         echo "<a href='".$value->link."' class='".$value->icon."' title='".$value->title."' target='_blank'><i class='bizzex-social-".$value->icon."'></i></a>";
                    ?>
                        
                  </div>
                </div>
						  <?php echo $theme_mods['footer_copyright']; ?>
					</div>
				</div>
			</div>
      </footer> <!-- end .bizzex-footer -->
  </div>
  <!--
  END #top.site
  -->
<?php wp_footer(); ?>
</body>
</html>
