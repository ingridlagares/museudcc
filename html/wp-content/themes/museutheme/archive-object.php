<?php get_header(); ?>

<div id="main-content" class="wrap">
	<div class="container">
		<div class="row">
			<!--End Filtering-->
			<div id="page-content" class="col-sm-24 index">
				<?php if (have_posts()) :?>
					<?php $i = 0; ?>
					<h1>Acervo:</h1>
					<div class="archive-grid index-list ">
						<?php while ( have_posts() ) : the_post(); ?>
						<?php $i++; ?>
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
					</div><!-- /index -->
					<?php pagination(); ?>
			</div>
		</div><!-- /row -->
	</div><!-- /container -->
</div><!-- /main-content -->

<?php get_footer(); ?>
