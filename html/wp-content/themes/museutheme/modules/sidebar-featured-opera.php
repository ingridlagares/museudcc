<?php 
	$FeaturedPage = get_sub_field("featured_page_selection");
	$FeaturedPageID = $FeaturedPage->ID; 	
		
	$FeaturedPageTitle = get_the_title($FeaturedPageID);			

	$FeaturedPageLink = get_permalink($FeaturedPageID);
	$FeaturedPageBlurb = get_field('page_summary',$FeaturedPageID);

	$FeaturedPageImgID = get_post_thumbnail_id($FeaturedPageID);
	$FeaturedPageImgURL = wp_get_attachment_image_src($FeaturedPageImgID,'460');
	$FeaturedPageImgURL = $FeaturedPageImgURL[0];
	$FeaturedPageImgALT = get_post_meta($FeaturedPageImgID , '_wp_attachment_image_alt', true);
	
?>

<div id="featured-page-widget" class="widget">
		
	<h3 class="widgettitle"><a href="<?php echo $FeaturedPageLink; ?>"><?php echo $FeaturedPageTitle;?></a></h3>	
	
	<div class="widget-inner">

		<a href="<?php echo $FeaturedPageLink; ?>"><img class="sidebar-featured-image" src="<?php echo $FeaturedPageImgURL;?>" alt="<?php echo $FeaturedPageImgALT;?>" /></a>
		
		<div class="page-summary"><?php echo $FeaturedPageBlurb;?></div>
		
		<p><a class="more-link button" href="<?php echo $FeaturedPageLink; ?>"><?php the_field('read_more_button_text', 'option'); ?><i class="fa fa-angle-right"></i></a></p>
	
	</div>

</div>