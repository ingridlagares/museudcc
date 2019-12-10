<?php
/*
Template Name: Full Width
*/
?>

<?php get_header(); ?>

<div id="main-content" class="wrap">

	<div class="container">

		<div class="row">
	
			<div id="page-content" class="col-sm-24">
				
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					
					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
							
						<h1><?php the_title(); ?></h1>
						
						<?php if ( has_post_thumbnail() ) { ?>
						<div class="featured-image">
							<?php the_post_thumbnail('full'); ?>
						</div>
						<?php } ?>
						
						<div class="entry">
							<?php the_content(); ?>
						</div>	
											
					</article>
						
				<?php endwhile; ?>
									
				<?php else : ?>
				
					<p>Sorry, there appears to be nothing on this page.</p>
					
				<?php endif; ?>
					
			</div>
				
		</div><!-- /row -->
		
	</div><!-- /container -->
		
</div><!-- /main-content -->
	
<?php get_footer(); ?>