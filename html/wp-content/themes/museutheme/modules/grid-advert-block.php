<?php 
	if(get_sub_field('link_type') == 'external'){
		$advert_link = get_sub_field('external_link');
	} else { 
		$advert_link = get_sub_field('internal_link');
	}
	
	$advert_image = get_sub_field('advert_image');
?>

<li class="grid-block advert-block-item">
	<div class="item-inner">
		<a href="<?php echo $advert_link; ?>" <?php if(get_sub_field('link_type') == 'external'){ ?> target="_blank"<?php } ?>>
			<img src="<?php echo $advert_image['url']; ?>" alt="<?php echo $advert_image['alt']; ?>" />
		</a>
	</div>
</li>