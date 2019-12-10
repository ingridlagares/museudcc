<?php get_header(); ?>

<div id="main-content" class="wrap">

	<div class="container">

		<div class="row">

			<!--Include filtering here if needed-->


			<div class="col-sm-24">

				<form method="get" action="<?php echo home_url();?>">
			    	<legend>Filter results: </legend>
			      	<label>
			        <select style="height:25px" onchange="location = this.options[this.selectedIndex].value;">
			          	<option value="" selected>Collection Filter</option>
						<option value="<?php bloginfo('url'); ?>/object/?filter=one">One</option>
						<option value="<?php bloginfo('url'); ?>/object/?filter=two">Two</option>
			        </select>
			      </label>
			    </form>

			</div>



			<!--End Filtering-->

			<div id="page-content" class="col-sm-24 index">

				<?php if (have_posts()) :?>
					<?php $i = 0; ?>

					<h1>Acervo:</h1>

					<div class="row index-list">

						<?php while ( have_posts() ) : the_post(); ?>

						<?php $i++; ?>

						<?php $object_name = get_the_title(); ?>

						<a href="<?php the_permalink(); ?>" id="post-<?php the_ID(); ?>" <?php post_class('index-object col-sm-12 col-md-6'); ?>>

							<div class="index-object-inner">

								<div class="index-object-image">
									<?php if ( has_post_thumbnail() ) {
										the_post_thumbnail('full', array( 'class' => 'single-featured-image' ));
										} else { ?>
										<img src="<?php echo get_template_directory_uri() . '/images/default-grid-image.png'; ?>" alt="<?php the_title(); ?>">
									<?php } ?>
								</div>
								 <div class="index-object-detail">
									<h2><?php echo $object_name; ?></h2>
									<!--<?php if(cos_get_field("briefDescription")){ ?>
										<div class="index-object-description"><?php cos_the_field("briefDescription"); ?></div>
									<?php } ?>-->
								</div>

							</div>

						</a>

						<?php if(($i%4) == 0){ echo '<div class="clearfix"></div>'; }; ?>

						<?php endwhile; endif; ?>

					</div><!-- /index -->

					<div class="pagination">
							<?php if ( function_exists( 'wp_pagenavi' ) ) {  ?>
					  			<?php wp_pagenavi(  ); ?>
							<?php } else { ?>
							<div class="alignleft">
								<?php next_posts_link( 'Próxima Página'); ?>
							</div>
							<div class="alignright">
								<?php previous_posts_link( 'Página anterior' ); ?>
							</div>
						<?php } ?>
					</div><!-- /pagination -->

			</div>

		</div><!-- /row -->

	</div><!-- /container -->

</div><!-- /main-content -->

<?php get_footer(); ?>
