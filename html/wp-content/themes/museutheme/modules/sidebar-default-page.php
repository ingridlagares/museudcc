<div id="latest-posts-widget" class="widget">

	<h3 class="widgettitle">Latest News</h3>
	
		<ul>
		<?php		
		$args = array( 'post_type' => 'post', 'posts_per_page' => '3', 'order'=> 'DESC', 'orderby' => 'date', 'post_status' => 'publish');
		$postslist = get_posts( $args );
		foreach ($postslist as $post) :  setup_postdata($post); 										
		?>													
			<li>
			<a href="<?php echo the_permalink(); ?>"><?php echo the_title(); ?></a>
			</li>			                                    
	
		<?php endforeach; ?>	
		</ul>
	
	<?php wp_reset_query(); ?>
	
</div>

<div class="random-object-widget widget">
		<?php		
		$args = array( 'post_type' => 'object', 'posts_per_page' => '1', 'order'=> 'ASC', 'orderby' => 'rand', 'post_status' => 'publish');				
		$randomObject = new WP_Query($args);
		while ($randomObject->have_posts()) : $randomObject->the_post(); ?>								
			
			<?php if(get_field('imageurl')){ ?>
			<a class="featured-image" href="<?php the_permalink(); ?>">
				<img src="<?php the_field('imageurl'); ?>" alt="<?php the_title(); ?>"/>
			</a>
			<?php } ?>	
			<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>		
			<div class="page-summary">
				<?php if(get_field('page_summary')){ ?>
					<?php the_field('page_summary'); ?>	
				<?php } else { ?>
					<?php the_field('description'); ?>
				<?php } ?>	
            </div>      	               
	
		<?php endwhile; ?>	
		
		<?php wp_reset_postdata(); ?>

</div>