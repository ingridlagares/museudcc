<?php get_header(); ?>

<div id="main-content" class="wrap">

	<div class="container">

		<div class="row">

			<div id="page-content" class="col-sm-16 index">
				<?php
					echo get_hansel_and_gretel_breadcrumbs();
					$wp_the_query   = $GLOBALS['wp_the_query'];
					$queried_object = $wp_the_query->get_queried_object();
					$term_object = get_term( $queried_object );
				?>
				<div class="title">
					<h1><?php echo $term_object->name; ?></h1>
				</div>

				<?php if (have_posts()) : ?>

					<div class="archive-grid index-list ">
					<?php while ( have_posts() ) : the_post(); ?>

						<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

							<h2 class="post-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php _e( "Permalink to", "custom" ); ?> <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>

							<?php if(get_post_thumbnail_id($post->ID) == true){
								$image_id = get_post_thumbnail_id($post->ID);
								$heroimage_url = wp_get_attachment_image_src($image_id,'800-landscape');
								$heroimage_url = $heroimage_url[0];
								$alt_text = get_post_meta($image_id , '_wp_attachment_image_alt', true);
								if($image_id){
							?>
							<div class="lead-image img-hover-zoom">
								<a href="<?php the_permalink(); ?>">
									<img class="card-image" src="<?php echo $heroimage_url;?>" alt="<?php echo $alt_text; ?>"/>
								</a>
							</div>
						<?php }}
								else {
							?>
							<div class="lead-image img-hover-zoom">
								<a href="<?php the_permalink(); ?>">
									<img class="card-image" src="<?php bloginfo('template_directory'); ?>/images/notfound.jpg" alt="Figura não encontrada"/>
								</a>
							</div>
							<?php }
							 ?>

						</article>

					<?php endwhile; endif; ?>

					</div>

					<?php pagination(); ?>

				</div>

				<?php get_sidebar(); ?>

		</div><!-- /row -->

	</div><!-- /container -->

</div><!-- /main-content -->

<?php get_footer(); ?>
