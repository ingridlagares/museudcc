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

<!--Start Featured Sidebar Content-->

<div class="featured-page-widget widget">

	<h3 class="widgettitle"><a href="<?php echo $FeaturedPageLink; ?>"><?php echo $FeaturedPageTitle;?></a></h3>

	<a href="<?php echo $FeaturedPageLink; ?>"><img class="sidebar-featured-image" src="<?php echo $FeaturedPageImgURL;?>" alt="<?php echo $FeaturedPageImgALT;?>" /></a>
	
	<div class="page-summary"><?php echo $FeaturedPageBlurb;?></div>

</div>

<!--End Featured Sidebar Content-->