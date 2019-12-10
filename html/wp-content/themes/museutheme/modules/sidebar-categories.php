
<div id="news-categories-widget" class="widget">
	
	<?php $widget_title = get_sub_field('widget_title'); ?>
	
	<h3 class="widgettitle"><?php echo $widget_title; ?></h3>	
	
	<div class="widget-inner">
		
		<ul>
		<?php
			/* Just categories in a list
				 
			$args = array(
				'hide_empty'			 => 0,
				'title_li'           => ''
		    );
		    wp_list_categories( $args ); 
		    
		    */
		    
			$args = array(
				'taxonomy' => array( 'post_tag', 'category' ), 
			); 
		
			wp_tag_cloud( $args );
		?> 
		</ul>
	
	
	
	
	</div>

</div>