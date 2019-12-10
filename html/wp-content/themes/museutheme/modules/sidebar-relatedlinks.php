<div id="latest-posts-widget" class="widget">

	<h3 class="widgettitle">Related Links</h3>
		<?php if( have_rows('link') ): ?>
		<ul>
		<?php while ( have_rows('link') ) : the_row(); ?>
		
			<?php $link_title = get_sub_field('link_title'); ?>
			<?php $link_url = get_sub_field('link_url'); ?>
			<li><a href="<?php echo $link_url; ?>" target="_blank"><?php echo $link_title; ?></a></li>
			
		<?php endwhile; ?>
		</ul>
		<?php else :
		endif;
		?>
	
	<?php wp_reset_query(); ?>
	
</div>