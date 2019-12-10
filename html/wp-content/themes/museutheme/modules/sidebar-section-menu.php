<div id="section-menu-widget" class="widget">
		
	<h3 class="widgettitle">In this section</h3>	
	
	<div class="widget-inner">
		
		<ul>
			<?php 
			// use wp_list_pages to display parent and all child pages all generations (a tree with parent)
			$parent_item = get_sub_field('parent_item'); 
			$parents = get_post_ancestors( $parent_item );
			$parent = ($parents) ? $parents[count($parents)-1]: $parent_item;
			$args=array(
			  'child_of' => $parent
			);
			$pages = get_pages($args);  
			if ($pages) {
			  $pageids = array();
			  foreach ($pages as $page) {
			    $pageids[]= $page->ID;
			  }
			
			  $args=array(
			    'title_li' => '',
			    'include' =>  $parent . ',' . implode(",", $pageids)
			  );
			  wp_list_pages($args);
			}
			?>
		</ul>
		
	</div>
	
</div>