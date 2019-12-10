<div id="latest-posts-widget" class="widget">

	<h3 class="widgettitle">Latest News</h3>
	
	<div class="widget-inner">
	
		<ul>
		<?php $numberposts = get_sub_field('number_of_posts');
			if ($numberposts == 0){	$numberposts = 3; }	
			$args = array( 'numberposts' => $numberposts, 'post_status' => 'publish' );
			$recent_posts = wp_get_recent_posts( $args );
			foreach( $recent_posts as $recent ){
				echo '<li><a href="' . get_permalink($recent["ID"]) . '">' .   $recent["post_title"].'</a> </li> ';
			}
		?>
		</ul>

	</div>
	
</div>