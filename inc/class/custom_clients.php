 <?php
/**
 * Customize for select, extend the WP customizer
 *
 */

if ( ! class_exists( 'WP_Customize_Control' ) )
	return NULL;

class Clients_Custom_Control extends WP_Customize_Control
{
    public function __construct($manager, $id, $args = array(), $options = array())
    {

        parent::__construct( $manager, $id, $args );
    }

	/**
	 * Render the control's content.
	 *
	 * Allows the content to be overriden without having to rewrite the wrapper.
	 *
	 * @since   10/16/2012
	 * @return  void
	 */
	public function render_content() {
		?>
		<?php echo $this->id; ?>
		<button type="submit" id="btnmedia" class="button" > Add Media</button>
        <div id='result_client'>
            <input  <?php $this->link(); ?> id="<?php echo $this->id; ?>" value='<?php echo $this->value();?>'>
        </div>
	        <script type="text/javascript" src="<?php echo includes_url('js/jquery/ui/sortable.min.js');?>"></script>
	        <link rel='stylesheet' href='<?php echo CORE_PATH.'admin/jquery-ui.min.css';?>' type='text/css' media='all' />
	        <link rel='stylesheet' href='<?php echo CORE_PATH.'admin/jquery-ui.theme.min.css';?>' type='text/css' media='all' />
			<?php wp_enqueue_media(); ?>
			<script  type='text/javascript'>
			jQuery(document).ready(function(e) {

				jQuery('#btnmedia').click(function(e) {
			        e.preventDefault();
			        var data=jQuery.parseJSON(jQuery('#result_client input').val());
			        var frame  = wp.media({ 
			            title: 'Upload Image',
			            multiple: true
			        }).open().on('select', function(e){
			            var uploaded_image = frame.state().get('selection');
			            var  result= uploaded_image.toJSON();
			            for (var i = result.length - 1; i >= 0; i--) {
			            	var str='<li class="ui-widget-content ui-corner-tr">'+
			            				'<img width="100"  src="'+result[i].url+'">'+
			            				'<a href="link/to/trash/script/when/we/have/js/off" title="Delete this image" class="ui-icon-trash" style="color: red">'+
			            				'Delete</a>'+
			            				'</li>';
			            	jQuery('#gallery').prepend(str);
			            	rebuildClient();
			            	setup_client();
			            }
			        });
			    });
			});

		  	jQuery(function() {
			    jQuery( "#client_sortable" ).sortable({
											        stop: function( event, ui ) {
											          rebuildClient();
											        }
											      });
			    jQuery( "#client_sortable" ).disableSelection();

		  	});
			function rebuildClient() {
				var data=[];
				jQuery('#gallery li').each(function(index, el) {
	                var th=jQuery('#gallery li').eq(index);
	                data.push(th.find('img').attr('src'));
	            });
                jQuery('#result_client input').val(JSON.stringify(data));
                jQuery('#result_client input').keyup();

            }
			</script>

			<div class="ui-widget ui-helper-clearfix">
			 
				<ul id="gallery" class="gallery ui-helper-reset ui-helper-clearfix">
				<?php foreach (json_decode($this->value()) as  $val):?>
					<li class="ui-widget-content ui-corner-tr">
				    <img width="100"  src="<?php echo $val;?>">
				    <a href="link/to/trash/script/when/we/have/js/off" title="Delete this image" class="ui-icon-trash" style='color: red'>Delete</a>
				  </li>
				<?php endforeach;?>
				  
				</ul>
			 
				<div id="trash" class="ui-widget-content ui-state-default">
				  <h4 class="ui-widget-header">Trash</h4>
				</div>
			 
			</div>
			<script>
			  function setup_client () {
			    // There's the gallery and the trash
			    var $gallery = jQuery( "#gallery" ),
			      $trash = jQuery( "#trash" );
			 
			    // Let the gallery items be draggable
			    jQuery( "li", $gallery ).draggable({
			      cancel: "a.ui-icon", // clicking an icon won't initiate dragging
			      revert: "invalid", // when not dropped, the item will revert back to its initial position
			      containment: "document",
			      helper: "clone",
			      cursor: "move"
			    });
			    // Let the trash be droppable, accepting the gallery items
			    $trash.droppable({
			      accept: "#gallery > li",
			      classes: {
			        "ui-droppable-active": "ui-state-highlight"
			      },
			      drop: function( event, ui ) {
			        deleteImage( ui.draggable );
			      }
			    });
			    // Let the gallery be droppable as well, accepting items from the trash
			    $gallery.droppable({
			      accept: "#trash li",
			      classes: {
			        "ui-droppable-active": "custom-state-active"
			      },
			      drop: function( event, ui ) {
			        recycleImage( ui.draggable );
			      }
			    });
			    // Image deletion function
			    var recycle_icon = "<a href='link/to/recycle/script/when/we/have/js/off' title='Recycle this image' class=' ui-icon-refresh'  style='color: red'>Recycle</a>";
			    function deleteImage( $item ) {
			      $item.fadeOut(function() {
			        var $list = jQuery( "ul", $trash ).length ?
			          jQuery( "ul", $trash ) :
			          jQuery( "<ul class='gallery ui-helper-reset'/>" ).appendTo( $trash );
			 
			        $item.find( "a.ui-icon-trash" ).remove();
			        $item.append( recycle_icon ).appendTo( $list ).fadeIn(function() {
			          $item
			            .animate({ width: "48px" })
			            .find( "img" )
			              .animate({ height: "36px" });
			        });
			      rebuildClient();
			      });
			    }
			    // Image recycle function
			    var trash_icon = "<a href='link/to/trash/script/when/we/have/js/off' title='Delete this image' class='ui-icon-trash'  style='color: red'>Delete</a>";
			    function recycleImage( $item ) {
			      $item.fadeOut(function() {
			        $item
			          .find( "a.ui-icon-refresh" )
			            .remove()
			          .end()
			          .css( "width", "96px")
			          .append( trash_icon )
			          .find( "img" )
			            .css( "height", "72px" )
			          .end()
			          .appendTo( $gallery )
			          .fadeIn();

			      rebuildClient();
			      });
			    }
			    // Resolve the icons behavior with event delegation
			    jQuery( "ul.gallery > li" ).on( "click", function( event ) {
			      var $item = jQuery( this ),
			        $target = jQuery( event.target );
			 
			      if ( $target.is( "a.ui-icon-trash" ) ) {
			        deleteImage( $item );
			      } else if ( $target.is( "a.ui-icon-refresh" ) ) {
			        recycleImage( $item );
			      }
			 
			      return false;
			    });
			  };
			  setup_client ();
			  </script>
		  	<style>
				#gallery { float: left; width: 65%; min-height: 12em; }
				.gallery li { float: left; width: 96px; padding: 0.4em; margin: 0 0.4em 0.4em 0; text-align: center; }
				.gallery li h5 { margin: 0 0 0.4em; cursor: move; }
				.gallery li a { float: right; }
				.gallery li img { width: 100%; cursor: move; }

				#trash { float: right; width: 32%; min-height: 18em; padding: 1%; }
				#trash h4 { line-height: 16px; margin: 0 0 0.4em; }
				#trash h4 .ui-icon { float: left; }
				#trash .gallery h5 { display: none; }
	  		</style>
			<?php
	}

}