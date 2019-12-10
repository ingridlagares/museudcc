<div id="latest-posts-widget" class="widget">

	<h3 class="widgettitle">Latest News</h3>
	
		<ul>
		<?php $numberposts = get_sub_field('number_of_posts');
	
		if ($numberposts == 0){					
			$numberposts = 3;						
		}	
					
		$args = array( 'numberposts' => $numberposts, 'order'=> 'DESC', 'orderby' => 'date');
		$postslist = get_posts( $args );
		foreach ($postslist as $post) :  setup_postdata($post); 													
		?>													
			<li>
			<a href="<?php echo the_permalink(); ?>"><?php echo the_title(); ?></a>
			<!-- <br/><span class="postmetadata date"><?php echo the_time('F j, Y'); ?></span> -->
			</li>			                                    
	
		<?php endforeach; ?>	
		</ul>
	
	<?php wp_reset_query(); ?>
	
</div>