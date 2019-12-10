<?php 
	if(get_sub_field('derive_content') == true){	

		$size = "800x600";	
	
		$pictureblock_url = get_sub_field('linked_page');	
		$pictureblock_id = url_to_postid($pictureblock_url); 	
		$pictureblock_title = get_the_title($pictureblock_id);
		$pictureblock_snippet = get_field('page_summary',$pictureblock_id);
	
		$attachment_id = get_post_thumbnail_id($pictureblock_id);
		$image_src = wp_get_attachment_image_src( $attachment_id, $size );
		$image_src = $image_src[0];
		$image_alt = get_post_meta($attachment_id , '_wp_attachment_image_alt', true);

	} else {	 // grab content from fields

		$size = "800x600";			
		
		$pictureblock_url = get_sub_field('linked_page');
		$pictureblock_title = get_sub_field('block_title');
		$pictureblock_snippet = get_sub_field('block_text');
		
		$attachment_id = get_sub_field('block_image');
		$image_src = wp_get_attachment_image_src( $attachment_id, $size );
		$image_src = $image_src[0];
		$image_alt = get_post_meta($attachment_id , '_wp_attachment_image_alt', true);	
	
	}		
	
	if(get_sub_field('subheader_type') == 'default'){
		$pictureblock_id = url_to_postid($pictureblock_url); 	
		$pictureblock_subheader = hh_post_type_header($pictureblock_id);
	} else{
		$pictureblock_subheader = get_sub_field('custom_subheader');
	}
	
	$block_size = get_sub_field('block_size');
?>

<li class="grid-block picture-item <?php echo $block_size; ?>">
	<div class="item-inner">
		<a href="<?php echo $pictureblock_url; ?>">
			<img src="<?php echo $image_src; ?>" alt="<?php echo $image_alt; ?>">
			<div class="picture-item-text">
				<span class="item-subheader"><?php echo $pictureblock_subheader; ?></span>
				<h2><span><?php echo $pictureblock_title; ?></span><i class="fa fa-angle-right"></i></h2>
			</div>
		</a>
	</div>
</li>