<?php get_header(); ?>

<div id="main-content"  class="wrap">
	<div class="container">
		<div class="row">
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<div class="title">
						<h1><?php the_title(); ?></h1>
					</div>
					<div class="grid-container">
						<div class="text">
							<?php if(cos_get_field("briefDescription")){ ?>
								<div class="descricao">
									<h3>Descrição</h3>
									<!-- <?php echo cos_get_remapped_field_name("briefDescription"); ?> -->
									<div id="brief-description"><?php cos_the_field("briefDescription");?></div>
								</div>
							<?php } ?>
							<?php if(cos_get_field("distinguishingFeatures")){ ?>
								<div class="distincao">
									<h3>Características</h3>
									<!-- <?php echo cos_get_remapped_field_name("distinguishingFeatures"); ?> -->

									<div id="brief-description"><?php cos_the_field("distinguishingFeatures");?></div>
								</div>
							<?php } ?>
							<?php if(cos_get_field("numberOfObjects")){ ?>
								<div class="numero">
									<h4>Quantidade</h4>
									<!-- <?php echo cos_get_remapped_field_name("numberOfObjects"); ?> -->
									<div id="brief-description"><?php cos_the_field("numberOfObjects");?></div>
								</div>
							<?php } ?>
							<?php if(cos_get_field("objectNumber")){ ?>
								<div class="codigo">
									<h4>Código do Objeto</h3>
										<div><?php cos_the_field("objectNumber");?></div>
									</div>
								<?php } ?>
							</div>
							<div class="image image-area" >
								<?php if(get_post_thumbnail_id($post->ID) == true){
									$image_id = get_post_thumbnail_id($post->ID);
									$heroimage_url = wp_get_attachment_image_src($image_id,'800-landscape');
									$heroimage_url = $heroimage_url[0];
									$alt_text = get_post_meta($image_id , '_wp_attachment_image_alt', true);
									if($image_id){
										?>
										<div class="lead-image">
											<a href="<?php the_permalink(); ?>">
												<img class="single-image" src="<?php echo $heroimage_url;?>" alt="<?php echo $alt_text; ?>"/>
											</a>
										</div>
									<?php }}
									else {
								?>
								<div class="lead-image">
									<a href="<?php the_permalink(); ?>">
										<img class="single-image" src="<?php bloginfo('template_directory'); ?>/images/notfound.jpg" alt="Figura não encontrada"/>
									</a>
								</div>
								<?php }
								 ?>
							 </div>
						 </div>


						</article>


					<?php endwhile; else: ?>

						<dd>Sorry, nothing found!</dd>

					<?php endif; ?>
				</div>

			</div><!-- /container -->

		</div><!-- /main-content -->

		<?php get_footer(); ?>
