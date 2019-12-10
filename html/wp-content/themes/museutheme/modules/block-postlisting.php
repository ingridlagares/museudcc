<?php

$selectedposttype = get_sub_field("selected_post_type");

$musiciancategory = "";
$newscategory = "";

switch ($selectedposttype)
{

	case "event":
	
		$postlist_args=array(
		   'post_type'=>'hh_event',
		   'posts_per_page' => 9,
		   'paged' => get_query_var('paged')
		);	
		
	break;

	case "opera":
	
		$postlist_args=array(
		   'post_type'=>'hh_opera',
		   'posts_per_page' => 9,
		   'meta_query' => array(
	             'key' => 'opera_date',
	             'value' => date("Ymd"),
	             'compare' => '>=',
	             'type' => 'DATE',
		           ),						   
		   'order' => 'ASC',
		   'paged' => get_query_var('paged')
		);	
		
	break;

	case "musician":
	
		$musiciancategory = get_sub_field("musician_category");
		
		if($musiciancategory)
		{		
			$postlist_args=array(
			   'post_type'=>'hh_musician',
			   'posts_per_page' => 9,
			   'orderby' => 'menu_order',						   
			   'order' => 'DESC',
				'tax_query' => array(
					array(
						'taxonomy' => 'musician_cat',
						'field'    => 'id',
						'terms'    => $musiciancategory,
					)),
			   'paged' => get_query_var('paged'),
			);	
		}
		else
		{
			$postlist_args=array(
			   'post_type'=>'hh_musician',
			   'posts_per_page' => 9,
			   'orderby' => 'title',						   
			   'order' => 'ASC',
			   'paged' => get_query_var('paged'),
			);				
		}
	
	break;	
	
	case "news":
	
		$newscategory = get_sub_field("news_category");
		
		$postlist_args=array(
		   'post_type'=>'post',
		   'posts_per_page' => 9,
		   'orderby' => 'DATE',					   
		   'order' => 'ASC',
		   'cat' => $newscategory,
		   'paged' => get_query_var('paged')
		);		
	
	break;
	
} ?>

<section class="block-postlisting content-block container">

	<div class="index-grid-listing row">	
	
		<?php
				
		     $postlisting_query = new WP_Query($postlist_args);
		
		     // Loop 'em
			 $i = 0;
		     while ( $postlisting_query->have_posts() ) : $postlisting_query->the_post();
			 $i++;
		?>
	
			<article id="post-<?php the_ID(); ?>" <?php post_class('feature-block col-sm-8'); ?>>
				
				<a class="grid-image" href="<?php the_permalink(); ?>">
					<?php if ( has_post_thumbnail() ) {
						the_post_thumbnail('400x300', array( 'class' => 'index-grid-thumb' )); 
						} else { ?>
						
						<?php $default_image = get_field('default_thumbnail_image', 'option');
						$size = '400x300';
						if( $default_image ) { ?>
							<?php echo wp_get_attachment_image( $default_image, $size ); ?>
						<?php } ?>
						
					<?php } ?>
				</a>
				<div class="feature-block-text">
					<h3 class="unit-header"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
					<div class="feature-blurb"><?php the_field('page_summary'); ?></div>
					<p><a class="more-link button" href="<?php the_permalink(); ?>"><?php the_field('read_more_button_text', 'option'); ?><i class="fa fa-angle-right"></i></a></p>
				</div>	
				
			</article>
		
			<?php if(($i%3)==0){ ?><div class="clearfix"></div><?php } ?>
		
		<?php endwhile;?>
		
			<div class="pagination">
				<?php if ( function_exists( 'wp_pagenavi' ) ) {  ?>
		  			<?php wp_pagenavi( array( 'query' => $postlisting_query ) ); ?>
				<?php } else { ?>
				<div class="alignleft">
					<?php next_posts_link( 'Older Entries'); ?>
				</div>
				<div class="alignright">
					<?php previous_posts_link( 'Newer Entries' ); ?>
				</div>
				<?php } ?>
			</div><!-- /pagination -->
		
		
		<?php wp_reset_postdata(); ?>    
		
	</div>
	
</section>
