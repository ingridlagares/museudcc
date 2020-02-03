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

			 	  <?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
			 	  <?php if (is_category()) { ?>
					<h1><?php single_cat_title(); ?> <?php _e( "Category", "custom" ); ?></h1>
			 	  <?php } elseif( is_tag() ) { ?>
					<h1><?php _e( "Tagged with", "custom" ); ?> <?php single_tag_title(); ?></h1>
			 	  <?php } elseif (is_day()) { ?>
					<h1><?php the_time('F jS Y'); ?> <?php _e( "Archive", "custom" ); ?></h1>
			 	  <?php  } elseif (is_month()) { ?>
					<h1><?php the_time('F Y'); ?> <?php _e( "Archive", "custom" ); ?></h1>
			 	  <?php } elseif (is_year()) { ?>
					<h1><?php the_time('Y'); ?> <?php _e( "Archive", "custom" ); ?> </h1>
				  <?php  } elseif (is_author()) { ?>
					<h1><?php _e( "Author Archive", "custom" ); ?></h1>
			 	  <?php  } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
					<h1><?php _e( "Blog Archives", "custom" ); ?></h1>
			 	  <?php } ?>

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
