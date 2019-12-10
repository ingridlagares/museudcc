<?php

if(get_sub_field('derive_content') == true){	// grab content from the selected page / post

	$size = "400x300";	


	$linkedpage1_url = get_sub_field('linked_page_1');	
	$linkedpage1_id = url_to_postid($linkedpage1_url); 	
	$linkedpage1_title = get_the_title($linkedpage1_id);
	$linkedpage1_blurb = get_field('page_summary',$linkedpage1_id);
	
	if(get_post_type($linkedpage1_id) == "page"){
		$linkedpage1_subhead = get_field('page_intro',$linkedpage1_id);
	} else {
		$linkedpage1_subhead = hh_post_type_header($linkedpage1_id);
	}

	$attachment_id1 = get_post_thumbnail_id($linkedpage1_id);
	$image1src = wp_get_attachment_image_src( $attachment_id1, $size );
	$image1src = $image1src[0];
	$image1alt = get_post_meta($attachment_id1 , '_wp_attachment_image_alt', true);


	$linkedpage2_url = get_sub_field('linked_page_2');	
	$linkedpage2_id = url_to_postid($linkedpage2_url); 	
	$linkedpage2_title = get_the_title($linkedpage2_id);
	$linkedpage2_blurb = get_field('page_summary',$linkedpage2_id);
	
	if(get_post_type($linkedpage2_id) == "page"){
		$linkedpage2_subhead = get_field('page_intro',$linkedpage2_id);
	} else {
		$linkedpage2_subhead = hh_post_type_header($linkedpage2_id);
	}

	$attachment_id2 = get_post_thumbnail_id($linkedpage2_id);
	$image2src = wp_get_attachment_image_src( $attachment_id2, $size );
	$image2src = $image2src[0];
	$image2alt = get_post_meta($attachment_id2 , '_wp_attachment_image_alt', true);


	$linkedpage3_url = get_sub_field('linked_page_3');	
	$linkedpage3_id = url_to_postid($linkedpage3_url); 	
	$linkedpage3_title = get_the_title($linkedpage3_id);
	$linkedpage3_blurb = get_field('page_summary',$linkedpage3_id);
	
	if(get_post_type($linkedpage3_id) == "page"){
		$linkedpage3_subhead = get_field('page_intro',$linkedpage3_id);
	} else {
		$linkedpage3_subhead = hh_post_type_header($linkedpage3_id);
	}

	$attachment_id3 = get_post_thumbnail_id($linkedpage3_id);
	$image3src = wp_get_attachment_image_src( $attachment_id3, $size );
	$image3src = $image3src[0];
	$image3alt = get_post_meta($attachment_id3 , '_wp_attachment_image_alt', true);
	
	
	$linkedpage4_url = get_sub_field('linked_page_4');	
	$linkedpage4_id = url_to_postid($linkedpage4_url); 	
	$linkedpage4_title = get_the_title($linkedpage4_id);
	$linkedpage4_blurb = get_field('page_summary',$linkedpage4_id);
	
	if(get_post_type($linkedpage4_id) == "page"){
		$linkedpage4_subhead = get_field('page_intro',$linkedpage4_id);
	} else {
		$linkedpage4_subhead = hh_post_type_header($linkedpage4_id);
	}

	$attachment_id4 = get_post_thumbnail_id($linkedpage4_id);
	$image4src = wp_get_attachment_image_src( $attachment_id4, $size );
	$image4src = $image4src[0];
	$image4alt = get_post_meta($attachment_id4 , '_wp_attachment_image_alt', true);

}

else{ 

	$size = "400x300";	
	
	$linkedpage1_url = get_sub_field('linked_page_1');
	$linkedpage1_title = get_sub_field('header_1');
	$linkedpage1_blurb = get_sub_field('text_1');
	$linkedpage1_subhead = get_sub_field('subhead_1');
	
	$attachment_id1 = get_sub_field('image_1');
	$image1src = wp_get_attachment_image_src( $attachment_id1, $size );
	$image1src = $image1src[0];
	$image1alt = get_post_meta($attachment_id1 , '_wp_attachment_image_alt', true);		

	
	$linkedpage2_url = get_sub_field('linked_page_2');
	$linkedpage2_title = get_sub_field('header_2');
	$linkedpage2_blurb = get_sub_field('text_2');
	$linkedpage2_subhead = get_sub_field('subhead_2');
	
	$attachment_id2 = get_sub_field('image_2');
	$image2src = wp_get_attachment_image_src( $attachment_id2, $size );
	$image2src = $image2src[0];
	$image2alt = get_post_meta($attachment_id2 , '_wp_attachment_image_alt', true);	

	
	$linkedpage3_url = get_sub_field('linked_page_3');
	$linkedpage3_title = get_sub_field('header_3');
	$linkedpage3_blurb = get_sub_field('text_3');
	$linkedpage3_subhead = get_sub_field('subhead_3');
	
	$attachment_id3 = get_sub_field('image_3');
	$image3src = wp_get_attachment_image_src( $attachment_id3, $size );
	$image3src = $image3src[0];
	$image3alt = get_post_meta($attachment_id3 , '_wp_attachment_image_alt', true);
	
	
	$linkedpage4_url = get_sub_field('linked_page_4');
	$linkedpage4_title = get_sub_field('header_4');
	$linkedpage4_blurb = get_sub_field('text_4');
	$linkedpage4_subhead = get_sub_field('subhead_4');
	
	$attachment_id4 = get_sub_field('image_4');
	$image4src = wp_get_attachment_image_src( $attachment_id4, $size );
	$image4src = $image4src[0];
	$image4alt = get_post_meta($attachment_id4 , '_wp_attachment_image_alt', true);
	
}

?>


<section class="fourcol-featured content-block feature-block container">

	<div class="row">
	
		<?php if(get_sub_field('section_title')){ ?>
			<h2 class="section-title col-sm-24"><?php the_sub_field('section_title'); ?></h2>
		<?php } ?>

		<div class="feature-block col-sm-6">
			<a class="feature-block-image" href="<?php echo $linkedpage1_url; ?>"><img class="content-block-featured-image"src="<?php echo $image1src; ?>" alt="<?php echo $image1alt;?>" /></a>
			<div class="feature-block-text">
			<!-- <span class="post-type"><?php echo $linkedpage1_subhead; ?></span> -->
			<h3 class="unit-header"><a href="<?php echo $linkedpage1_url; ?>"><?php echo $linkedpage1_title; ?></a></h3>
			<div class="feature-blurb"><?php echo $linkedpage1_blurb; ?></div>
			<p><a class="more-link button" href="<?php echo $linkedpage1_url; ?>"><?php the_field('read_more_button_text', 'option'); ?><i class="fa fa-angle-right"></i></a></p>
			</div>
		</div>
	
		<div class="feature-block col-sm-6">
			<a class="feature-block-image" href="<?php echo $linkedpage2_url; ?>"><img class="content-block-featured-image" src="<?php echo $image2src; ?>" alt="<?php echo $image2alt;?>" /></a>
			<div class="feature-block-text">
			<!-- <span class="post-type"><?php echo $linkedpage2_subhead; ?></span> -->
			<h3 class="unit-header"><a href="<?php echo $linkedpage2_url; ?>"><?php echo $linkedpage2_title; ?></a></h3>
			<div class="feature-blurb"><?php echo $linkedpage2_blurb; ?></div>
			<p><a class="more-link button" href="<?php echo $linkedpage2_url; ?>"><?php the_field('read_more_button_text', 'option'); ?><i class="fa fa-angle-right"></i></a></p>
			</div>
		</div>	
	
		<div class="feature-block col-sm-6">
			<a class="feature-block-image" href="<?php echo $linkedpage3_url; ?>"><img class="content-block-featured-image" src="<?php echo $image3src; ?>" alt="<?php echo $image3alt;?>" /></a>
			<div class="feature-block-text">
			<!-- <span class="post-type"><?php echo $linkedpage3_subhead; ?></span> -->
			<h3 class="unit-header"><a href="<?php echo $linkedpage3_url; ?>"><?php echo $linkedpage3_title; ?></a></h3>
			<div class="feature-blurb"><?php echo $linkedpage3_blurb; ?></div>
			<p><a class="more-link button" href="<?php echo $linkedpage3_url; ?>"><?php the_field('read_more_button_text', 'option'); ?><i class="fa fa-angle-right"></i></a></p>
			</div>
		</div>	
	
		<div class="feature-block col-sm-6">
			<a class="feature-block-image" href="<?php echo $linkedpage4_url; ?>"><img class="content-block-featured-image" src="<?php echo $image4src; ?>" alt="<?php echo $image4alt;?>" /></a>
			<div class="feature-block-text">
			<!-- <span class="post-type"><?php echo $linkedpage4_subhead; ?></span> -->
			<h3 class="unit-header"><a href="<?php echo $linkedpage4_url; ?>"><?php echo $linkedpage4_title; ?></a></h3>
			<div class="feature-blurb"><?php echo $linkedpage4_blurb; ?></div>
			<p><a class="more-link button" href="<?php echo $linkedpage4_url; ?>"><?php the_field('read_more_button_text', 'option'); ?><i class="fa fa-angle-right"></i></a></p>
			</div>
		</div>	
	
	</div>

</section>


