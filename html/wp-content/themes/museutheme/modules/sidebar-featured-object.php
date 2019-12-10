
<?php 
	$object = get_sub_field('object_selection');
	$objectID = $object->ID; 	
		
	$objectTitle = get_the_title($objectID);			

	$objectLink = get_permalink($objectID);
	$objectBlurb = get_field('description',$objectID);

	$objectImgURL = "http://museums.bristol.gov.uk/emuweb/php5/media.php?irn=".get_field('mulmultimediaref_tab_0_irn', $objectID)."&width=700";
?>

<!--Start Featured Sidebar Content-->

<div class="object-widget widget">

	<h3 class="widgettitle"><a href="<?php echo $objectLink; ?>"><?php echo $objectTitle;?></a></h3>

	<a href="<?php echo $objectLink; ?>"><img class="sidebar-featured-image" src="<?php echo $objectImgURL;?>" alt="<?php echo $objectTitle; ?>" /></a>
	
	<div class="page-summary"><?php echo $objectBlurb;?></div>

</div>

<!--End Featured Sidebar Content-->