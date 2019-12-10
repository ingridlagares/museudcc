<?php get_header(); ?>

<div id="main-content" class="wrap">

	<div class="container">

		<div class="row">
	
			<div id="page-content" class="col-sm-16 col-sm-offset-4 index">
					
				<h1>Search Results</h1> 
				
					<p><?php $s = $wp_query->query_vars['s'];
					echo $wp_query->found_posts . " results found with '$s'" ?></p>
				
						<?php if (have_posts()) : ?>
						
						<div class="index-list">
						
						<?php while ( have_posts() ) : the_post(); ?>
						
						<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						
							<h2 class="post-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php _e( "Permalink to", "custom" ); ?> <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
							
							<?php
								$post_type_display = "";
								$short_blurb = "";
								$long_blurb = "";
								$primary_image = "";
														
								switch (get_post_type()) {
								  
								  case "post":
								    $post_type_display = "News / Blog";
								    $short_blurb = get_the_excerpt();
								    break;
								    
								  case "page":
								    $post_type_display = "Page";
								    $short_blurb = get_field('page_summary');
								    break;
								  
								  case "object":
								  	$post_type_display = "Object";
								  	$long_blurb = cos_the_field("briefDescription");
								  	$short_blurb = implode(' ', array_slice(explode(' ', $long_blurb), 0, 30));
								  	$short_blurb = $short_blurb . "...";
								
								  	$image_id = get_post_thumbnail_id($post->ID);								
								  	$image_url = wp_get_attachment_image_src($image_id,'thumb'); 
								  	$image_url = $image_url[0];
								  	$alt_text = get_post_meta($image_id , '_wp_attachment_image_alt', true);
									  	
								  	break;
								  default:
								}	
							?>		
							
							<?php if($image_url){ ?>
								<div class="searchresultimage">
									<a href="<?php the_permalink() ?>">
										<img width="100" alt="<?php the_title(); ?>" src="<?php echo $image_url;?>" />						
									</a>
								</div>
							<?php } ?>
							
							<p><?php echo $short_blurb;?></p>
							
							<p><a href="<?php the_permalink() ?>">More &raquo;</a></p>
						
						</article>
						
						<?php endwhile; ?>
					
					</div><!-- /index-list -->
						
					<div class="pagination">
						<?php if ( function_exists( 'wp_pagenavi' ) ) {  ?>
							<?php wp_pagenavi( array( 'query' => $wp_query ) ); ?>
						<?php } else { ?>
						<div class="alignleft">
							<?php next_posts_link( 'Older Entries'); ?>
						</div>
						<div class="alignright">
							<?php previous_posts_link( 'Newer Entries', $wp_query->max_num_pages ); ?>
						</div>
						<?php } ?>
					</div><!-- /pagination -->
					
					<?php else : ?>
					
						<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
							<p>Sorry, nothing found for that search term.</p>
						</article>
					
					<?php get_search_form(); ?>
				
				<?php endif; ?>
				
			</div><!-- /content -->
			
		</div><!-- /row -->

	</div><!-- /container -->

</div><!-- /main-content wrap -->
	
<?php get_footer(); ?>