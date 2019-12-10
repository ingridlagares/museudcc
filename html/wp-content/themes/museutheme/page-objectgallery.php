<?php
/*
Template Name: Object Gallery
*/
?>

<?php get_header(); ?>

<div id="main-content" class="wrap">

	<div class="container">

		<div class="row">
	
			<div id="page-content" class="col-sm-16 js-height index">
			
				<?php // Grab the category which has been selected from the query string
				if(isset($_GET["type"])){
					$selected_category = $_GET["type"];
				} else {
					$selected_category = "";
				} ?>
			
				<?php if ( function_exists('yoast_breadcrumb') ) {  ?>
					<div id="breadcrumb-container">
						<div id="breadcrumbs">
							<span prefix="v: http://rdf.data-vocabulary.org/#">
							<span typeof="v:Breadcrumb"><a href="<?php bloginfo('url'); ?>" rel="v:url" property="v:title">Home</a></span> 
							<i class="fa fa-play"></i> 
							<span typeof="v:Breadcrumb"><a href="<?php bloginfo('url'); ?>/object/" rel="v:url" property="v:title">Objects</a></span> 
							<i class="fa fa-play"></i> 
							<span typeof="v:Breadcrumb"><?php if(isset($_GET["type"])){ echo $selected_category; } else { echo 'All Objects'; } ?></span> 
					</span>
						</div>
					</div>
				<?php } ?>
				
				<?php 
				
				$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
				
				if (($selected_category != "")){
					$custom_query_args=array(
					   'post_type'=>'object',
					   'posts_per_page' => 10,
					   'orderby' => 'title',
					   'order' => 'ASC',
					   'paged' => $paged,
					   'meta_key' => 'destype_tab_0',
					   'meta_value' => $selected_category,
					   'meta_compare' => 'LIKE'
					);
					echo '<h1>Explore: '.$selected_category.'</h1>';
				}
					else{
					// no category selected so show all
					$custom_query_args=array(
					   'post_type'=>'object',
					   'posts_per_page' => 10,
					   'orderby' => 'title',
					   'order' => 'ASC',
					   'paged' => $paged
					);
					echo '<h1>Explore: All Objects</h1>';
				} ?>
				
				<?php // Instantiate custom query
				$custom_query = new WP_Query( $custom_query_args ); ?>
				
				<?php if ( $custom_query->have_posts() ) : ?>
				
				<div class="index-list">
				
					<?php while ( $custom_query->have_posts() ) : $custom_query->the_post();  ?>	
						
					<?php 
						$object_name = get_the_title();				
						$featured_image = get_field("mulmultimediaref_tab_0_irn");
						$featured_image_alt = get_field("mulmultimediaref_tab_0_muldescription");
						
						$page_summary = get_field("page_summary");
						$description = get_field("description");
						$type = get_field("destype_tab_0");
						
						// Get labels for themes
						// $field = get_field_object('object_theme');
						// $value = get_field('object_theme');
						// $type_label = $field['choices'][ $value ];
					?>
							
					<article id="post-<?php the_ID(); ?>" <?php post_class('row'); ?>>
						
						<div class="col-sm-12">
							<a href="<?php the_permalink()?>"><img src="http://museums.bristol.gov.uk/emuweb/php5/media.php?irn=<?php echo $featured_image; ?>&width=700" alt="<?php echo $featured_image_alt; ?>"></a>
			            </div>
			            
			            <div class="col-sm-12">
			            	<h2 class="larger-subheader"><a href="<?php the_permalink()?>"><?php echo $object_name;?></a></h2>
			            		
		            		<?php if(get_field('page_summary')){ ?>
		            			<div class="page-summary"><?php the_field('page_summary'); ?></div>
		            		<?php } else { ?>
		            			<div class="page-summary"><?php the_field('description'); ?></div>
		            		<?php } ?>
						</div>
					
					</article>
					
					<?php endwhile; ?> 
					
				</div><!-- /index-list -->
				
				<div class="pagination">
						<?php if ( function_exists( 'wp_pagenavi' ) ) {  ?>
				  			<?php wp_pagenavi( array( 'query' => $custom_query ) ); ?>
						<?php } else { ?>
						<div class="alignleft">
							<?php next_posts_link( 'Older Entries'); ?>
						</div>
						<div class="alignright">
							<?php previous_posts_link( 'Newer Entries', $custom_query->max_num_pages ); ?>
						</div>
					<?php } ?>
				</div><!-- /pagination -->
				
				<?php endif; ?>
  
  				<?php wp_reset_postdata(); ?>
  				
			</div>
				
			<?php get_sidebar('object-search'); ?>
					
		</div><!-- /row -->
		
	</div><!-- /container -->
		
</div><!-- /main-content -->
	
<?php get_footer(); ?>