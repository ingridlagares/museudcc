<?php

	$size = "600x450";	

	// Left featured item		
	
	$linkedpage1_url = get_sub_field('linked_page_1');
	$linkedpage1_title = get_sub_field('header_1');
	
	$attachment_id1 = get_sub_field('image_1');
	$image1src = wp_get_attachment_image_src( $attachment_id1, $size );
	$image1src = $image1src[0];
	$image1alt = get_post_meta($attachment_id1 , '_wp_attachment_image_alt', true);		

	// Centre featured item		
	
	$linkedpage2_url = get_sub_field('linked_page_2');
	$linkedpage2_title = get_sub_field('header_2');
	
	$attachment_id2 = get_sub_field('image_2');
	$image2src = wp_get_attachment_image_src( $attachment_id2, $size );
	$image2src = $image2src[0];
	$image2alt = get_post_meta($attachment_id2 , '_wp_attachment_image_alt', true);	

	// Right featured item		
	
	$linkedpage3_url = get_sub_field('linked_page_3');
	$linkedpage3_title = get_sub_field('header_3');
	
	$attachment_id3 = get_sub_field('image_3');
	$image3src = wp_get_attachment_image_src( $attachment_id3, $size );
	$image3src = $image3src[0];
	$image3alt = get_post_meta($attachment_id3 , '_wp_attachment_image_alt', true);

?>


<section class="threecol-picturebox content-block container">

	<div class="row">
	
		<?php if(get_sub_field('show_section_border')){ ?>
		<div class="content-block-border col-sm-24">
			<div class="content-block-border-inner"></div>
		</div>
		<?php } ?>
	
		<?php if(get_sub_field('section_title')){ ?>
			<h2 class="section-title col-sm-24"><?php the_sub_field('section_title'); ?></h2>
		<?php } ?>

		<div class="feature-block col-sm-8">
			<a href="<?php echo $linkedpage1_url; ?>">
				<img class="content-block-featured-image" src="<?php echo $image1src; ?>" alt="<?php echo $image1alt;?>" />
				<h3><?php echo $linkedpage1_title; ?><i class="fa fa-angle-right"></i></h3>
			</a>
		</div>
	
		<div class="feature-block col-sm-8">
			<a href="<?php echo $linkedpage2_url; ?>">
				<img class="content-block-featured-image" src="<?php echo $image2src; ?>" alt="<?php echo $image2alt;?>" />
				<h3><?php echo $linkedpage2_title; ?><i class="fa fa-angle-right"></i></h3>
			</a>
		</div>	
	
		<div class="feature-block col-sm-8">
			<a href="<?php echo $linkedpage3_url; ?>">
				<img class="content-block-featured-image" src="<?php echo $image3src; ?>" alt="<?php echo $image3alt;?>" />
				<h3><?php echo $linkedpage3_title; ?><i class="fa fa-angle-right"></i></h3>
			</a>
		</div>	
	
	</div>

</section>


