<?php 
	$FeaturedPage = get_sub_field("featured_page_selection");
	$FeaturedPageID = $FeaturedPage->ID; 	
		
	$FeaturedPageTitle = get_the_title($FeaturedPageID);			

	$FeaturedPageLink = get_permalink($FeaturedPageID);
	$FeaturedPageBlurb = get_field('short_description',$FeaturedPageID);

	$FeaturedPageImgURL = get_field('event_representative_image',$FeaturedPageID);
	
	if($FeaturedPageImgURL)
	{
		$FeaturedPageImgURL = str_replace("_thumb", "_medium",$FeaturedPageImgURL);						
	}
	else
	{											
		$FeaturedPageImgURL = "";
	}	
	
	
	$FeaturedPageImgURL =  wp_strip_all_tags( $FeaturedPageImgURL, true ); 
?>

<div id="featured-page-widget" class="widget">
		
	<h3 class="widgettitle"><a href="<?php echo $FeaturedPageLink; ?>"><?php echo $FeaturedPageTitle; ?></a></h3>	
	
	<div class="widget-inner">

		<a href="<?php echo $FeaturedPageLink; ?>"><img class="sidebar-featured-image" src="<?php echo $FeaturedPageImgURL;?>" alt="<?php echo $FeaturedPageTitle; ?>" /></a>
		
		<div class="page-summary"><?php echo $FeaturedPageBlurb; ?></div>
		
		<p><a class="more-link button" href="<?php echo $FeaturedPageLink; ?>"><?php the_field('read_more_button_text', 'option'); ?><i class="fa fa-angle-right"></i></a></p>
	
	</div>

</div>