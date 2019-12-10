<?php

	$SubPageDisplayOptions = get_sub_field("subpage_display_options");
	$DisplayCurrent = get_sub_field("display_current_page");
	
	$TheDepth = 0;
	$SectionTitle = get_the_title($post->post_parent);
	
	switch($SubPageDisplayOptions){
			case 1:	// show children of this page
			
				if($DisplayCurrent == 1){
					$args = "sort_column=menu_order&title_li=&child_of=" . $post->ID . "&echo=0&depth=" . $TheDepth;
				}
				else{
					$args = "sort_column=menu_order&title_li=&child_of=" . $post->ID. "&exclude=" . $post->ID . "&echo=0&depth=" . $TheDepth;			
				}								
				
				$SectionTitle = get_the_title($post->post_parent);			
				
				break;
			
			case 2:	// show siblings of this page
			
				$TheDepth = 1;
				
				if($DisplayCurrent == 1){
					$args = "sort_column=menu_order&title_li=&child_of=" . $post->post_parent . "&echo=0&depth=" . $TheDepth;
				}
				else{
					$args = "sort_column=menu_order&title_li=&child_of=" . $post->post_parent . "&exclude=" . $post->ID . "&echo=0&depth=" . $TheDepth;	
				}	
				
				$SectionTitle = get_the_title($post->post_parent);
				
				break;
				
			default:
				
				$TheDepth = 1;
				$SectionTitle = get_the_title($post->post_parent);
				$args = "sort_column=menu_order&title_li=&child_of=" . $post->ID . "&exclude=" . $post->ID . "&echo=0&depth=" . $TheDepth;
			
				break;

		}	
				
	$children = wp_list_pages($args);
	
	if($children){

?>

<div id="custom-subpagelist" class="widget">

	<h3 class="widgettitle">In This Section</h3>
		<ul class="menu-sub">
			<?php echo $children; ?>
		</ul>
	
</div>
	
<?php } ?>