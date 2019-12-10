<div id="musician-cats-widget" class="widget">
		
	<h3 class="widgettitle">
	<?php if(get_sub_field('widget_title')){ ?>
		<?php the_sub_field('widget_title'); ?>
	<?php } else { echo 'Events Calendar'; } ?>
	</h3>
	
	<div class="widget-inner">

		<div id="musician-cat-list" class="widget">
				
			<?php
			$taxonomy     = 'musician_cat';
			$orderby      = 'name'; 
			$show_count   = 0;      // 1 for yes, 0 for no
			$pad_counts   = 0;      // 1 for yes, 0 for no
			$hierarchical = 1;      // 1 for yes, 0 for no
			$title        = '';
			$args = array(
			  'taxonomy'     => $taxonomy,
			  'orderby'      => $orderby,
			  'show_count'   => $show_count,
			  'pad_counts'   => $pad_counts,
			  'hierarchical' => $hierarchical,
			  'title_li'     => $title
			);
			?>
			<ul>
			<?php wp_list_categories( $args ); ?>
			</ul>

		</div>
	
	</div>

</div>