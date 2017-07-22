<?php
class SearchForm extends WP_Widget{
	
	public function __construct() {
		
		$id_base = 'search-form';
		$name	= 'Search form';
		$widget_options = array(
					'classname' => 'widget_search',
					'description' => 'Day la mot Widget đơn gian'
				);
		$control_options = array('width'=>'250px');
		parent::__construct($id_base, $name,$widget_options, $control_options);
	
	}	
		
	public function widget( $args, $instance ) {
		
		extract($args);				
				
		$title = apply_filters('widget_title', $instance['title']);
		
		
		echo $before_widget;
		if(!empty($title)){
			echo $before_title . $title . $after_title;		
		}
		?>
		<form method="get" id="searchform" class="form-search" action="<?php echo site_url();?>">
	        <label for="s" class="visually-hidden">Search...</label>
	        <input type="text" id="s" class="search-query" name="s" placeholder="Search...">
	        <input type="submit" id="searchsubmit" class="hidden" name="submit" value="Search...">
	    </form>

		<?php

		
		echo $after_widget;
	}
	
	public function update( $new_instance, $old_instance ) {
		
		$instance = $old_instance;
		
		$instance['title'] = strip_tags($new_instance['title']);
		
		
		return $instance;
	}
	
	public function form( $instance ) {
			//Tao phan tu chua Title
			$inputID 	= $this->get_field_id('title');
			$inputName 	= $this->get_field_name('title');
			$inputValue = @$instance['title'];
			?>
			<p>
			    <label for="widget-recent-comments-3-title">Title:</label>
			    <input class="widefat" id="<?php echo $inputID; ?> " name="<?php echo $inputName; ?>" type="text" value="<?php echo $inputValue;?>">
			</p>
			<?php
	}
	
}