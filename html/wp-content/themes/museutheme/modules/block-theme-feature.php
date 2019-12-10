<section id="theme-featured" class="content-block feature-block pure-g">

	<?php if( have_rows('theme_block') ): ?>
	<?php $i = 0; ?>
		<?php while( have_rows('theme_block') ): the_row(); 
			$theme_name = get_sub_field('theme_name');
			$theme_image = get_sub_field('theme_image');
			$size = '400x300';
			$theme_description = get_sub_field('theme_description');
			$theme_link = get_sub_field('theme_link');
			$i++; 
		?>
		<?php 
			if(($i%3) == 0){ $grid_class="pad-3-right"; }
			if(($i%3) == 2 || ($i == 2)){ $grid_class="pad-3-center"; }
			if(($i%3) == 1 || ($i == 1)){ $grid_class="pad-3-left"; } 
		?>
			<div class="pure-u-1 pure-u-md-1-3 theme-block <?php echo $grid_class; ?>">
	
				<h2 class="unit-header"><?php echo $theme_name; ?></h2>
	
				<a href="<?php echo $theme_link; ?>">
					<?php echo wp_get_attachment_image( $theme_image, $size ); ?>
				</a>
				
				<div class="theme-description">
			    	<?php echo $theme_description; ?>
				</div>
				
				<p class="more-link"><a class="button" href="<?php echo $theme_link; ?>">View Theme <i class="fa fa-play"></i></a></p>
				
			</div>
			
			<?php if(($i%3) == 0){ echo '<div class="grid-clearfix"></div>'; } ?>
	
		<?php endwhile; ?>
	
	<?php endif; ?>

</section>