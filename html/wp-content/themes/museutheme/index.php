<?php get_header(); ?>

<div id="main-content" class="tile">

	<div class="container">

		<div class="row">

			<div id="page-content" class="col-sm-16 index">

				<h1>Latest News</h1>

					<div class="index-list">

					<?php while ( have_posts() ) : the_post(); ?>

						<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

							<h2 class="post-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php _e( "Permalink to", "custom" ); ?> <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>

							<?php
								$image_id = get_post_thumbnail_id($post->ID);
								$heroimage_url = wp_get_attachment_image_src($image_id,'800-landscape');
								$heroimage_url = $heroimage_url[0];
								$alt_text = get_post_meta($image_id , '_wp_attachment_image_alt', true);
								if($image_id){
							?>
							<div class="lead-image">
								<a href="<?php the_permalink(); ?>">
									<img src="<?php echo $heroimage_url;?>" alt="<?php echo $alt_text; ?>"/>
								</a>
							</div>
							<?php
								}
							?>

							<div class="post-content">
								<?php the_excerpt(); ?>
							</div>

						</article>

					<?php endwhile; ?>

					</div>

					<div class="pagination">
						<?php if ( function_exists( 'wp_pagenavi' ) ) {  ?>
				  			<?php wp_pagenavi(  ); ?>
						<?php } else { ?>
						<div class="alignleft">
							<?php next_posts_link( 'Older Entries'); ?>
						</div>
						<div class="alignright">
							<?php previous_posts_link( 'Newer Entries' ); ?>
						</div>
					<?php } ?>
					</div><!-- /pagination -->

				</div>

			<?php get_sidebar(); ?>

		</div><!-- /row -->

	</div><!-- /container -->

</div><!-- /main-content -->

<?php get_footer(); ?>
