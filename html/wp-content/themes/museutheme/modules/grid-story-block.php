<?php 
	if(get_sub_field('derive_content') == true){	

		$size = "800x600";	
	
		$story_url = get_sub_field('linked_page');	
		$story_id = url_to_postid($story_url); 	
		$story_title = get_the_title($story_id);
		$story_snippet = get_field('page_summary',$story_id);
	
		$attachment_id = get_post_thumbnail_id($story_id);
		$image_src = wp_get_attachment_image_src( $attachment_id, $size );
		$image_src = $image_src[0];
		$image_alt = get_post_meta($attachment_id , '_wp_attachment_image_alt', true);

	} else {	 // grab content from fields

		$size = "800x600";			
		
		$story_url = get_sub_field('linked_page');
		$story_title = get_sub_field('block_title');
		$story_snippet = get_sub_field('block_text');
		
		$attachment_id = get_sub_field('block_image');
		$image_src = wp_get_attachment_image_src( $attachment_id, $size );
		$image_src = $image_src[0];
		$image_alt = get_post_meta($attachment_id , '_wp_attachment_image_alt', true);	
	
	}		
	
	if(get_sub_field('subheader_type') == 'default'){
		$story_id = url_to_postid($story_url); 	
		$story_subheader = hh_post_type_header($story_id);
	} else{
		$story_subheader = get_sub_field('custom_subheader');
	}
	
	if(get_sub_field('button_text_selection') == 'default'){
		$button_text = get_field('read_more_button_text', 'option');
	} else{
		$button_text = get_sub_field('button_text');
	}
	
	$color_style = get_sub_field('colour_style');
	
	$block_size = get_sub_field('block_size');
?>

<li class="grid-block story-item <?php echo $block_size; ?>">
	<div class="item-inner">
		<a href="<?php echo $story_url; ?>">
			<img class="content-block-featured-image" src="<?php echo $image_src; ?>" alt="<?php echo $image_alt; ?>" />
		</a>
		<div class="story-item-text <?php echo $color_style; ?>">
			<span class="item-subheader"><?php echo $story_subheader; ?></span>
			<h2><a href="<?php echo $story_url; ?>"><?php echo $story_title; ?></a></h2>
			<?php if($story_snippet != ''){ ?>
			<div class="story-snippet"><?php echo $story_snippet; ?></div>
			<?php } ?>
			<a class="more-link button" href="<?php echo $story_url; ?>"><?php echo $button_text; ?><i class="fa fa-angle-right"></i></a>
		</div>
	</div>
</li>