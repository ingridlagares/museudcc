<?php get_header(); ?>

<div id="main-content"  class="wrap">
	<div class="container">
		<div class="row">
			<div id="page-content" class="col-sm-24">

				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

						<div id="object-main" class="row">

							<div class="col-sm-12">

							<h1><?php the_title(); ?></h1>

							<?php if(cos_get_field("briefDescription")){ ?>

								<!-- <?php echo cos_get_remapped_field_name("briefDescription"); ?> -->

								<div id="brief-description"><?php cos_the_field("briefDescription");?></div>

							<?php } ?>

							<?php if ( has_post_thumbnail() ) { ?>
								<div class="featured-image">
									<?php the_post_thumbnail('full', array( 'class' => 'single-featured-image' )); ?>
								</div>
							<?php } ?>

							</div>

							<div id="object-metadata" class="col-sm-11 col-sm-offset-1">

								<div class="row inner-content">

									<div class="col-sm-12">

										<dl>

										<?php if(cos_get_field("objectNumber")){ ?>

											<dt><?php echo cos_get_remapped_field_name("objectNumber"); ?></dt>

											<dd><?php cos_the_field("objectNumber");?></dd>

										<?php } ?>


										<?php if(cos_get_field("dimension")){ ?>

											<dt><?php echo cos_get_remapped_field_name("dimension"); ?></dt>

											<dd><?php cos_the_field("dimension"); ?></dd>

										<?php } ?>



										</dl>

									</div>
</div><!-- /row -->

									<div class="">

										<dl>

											<?php get_sidebar( 'categoria' ); ?>


										</dl>

									</div>
									<div class="col-md-12" >
									  <div id="sections">
									  <label for="tn" id="toggle">Navigation <span class="drop-icon">
											  <i class="fa fa-chevron-down" aria-hidden="true"></i></span></label>
												<input type="checkbox" id="tn">
												<?php categorias_section(); ?>
									  </div>
									</div>

						</div>

					</article>


				<?php endwhile; else: ?>

				<dd>Sorry, nothing found!</dd>

				<?php endif; ?>
			</div>

		</div><!-- /row -->

	</div><!-- /container -->

</div><!-- /main-content -->

<?php get_footer(); ?>
