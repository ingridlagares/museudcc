
		<?php if( have_rows('sidebar_block') ):

    			while ( have_rows('sidebar_block') ) : the_row(); ?>
		 
				<?php if(get_row_layout() == "subpage_listing"): ?>
		 
					<?php include "modules/sidebar-subpage-listing.php"; ?>
				
				<?php elseif(get_row_layout() == "section_menu"): ?>
		 
					<?php include "modules/sidebar-section-menu.php"; ?>
						
				<?php elseif(get_row_layout() == "latest_posts"): ?>
				
					<?php include "modules/sidebar-latest-posts.php"; ?>	
					
				<?php elseif(get_row_layout() == "featured_page"): ?>	
					
					<?php include "modules/sidebar-featured-page.php"; ?>	
					
				<?php elseif(get_row_layout() == "featured_musician"): ?>	
					
					<?php include "modules/sidebar-featured-musician.php"; ?>	

				<?php elseif(get_row_layout() == "featured_event"): ?>	
					
					<?php include "modules/sidebar-featured-event.php"; ?>	
					
				<?php elseif(get_row_layout() == "featured_exhibition"): ?>	
					
					<?php include "modules/sidebar-featured-exhibition.php"; ?>	

				<?php elseif(get_row_layout() == "featured_opera"): ?>	
					
					<?php include "modules/sidebar-featured-opera.php"; ?>	
								  
				<?php elseif(get_row_layout() == "related_links"): ?>
				
					<?php include "modules/sidebar-related-links.php"; ?>
					
				<?php elseif(get_row_layout() == "news_categories"): ?>
				
					<?php include "modules/sidebar-categories.php"; ?> 
					
				<?php elseif(get_row_layout() == "event_calendar"): ?>
				
					<?php include "modules/sidebar-calendar.php"; ?> 
					
				<?php elseif(get_row_layout() == "musician_categories"): ?>
				
					<?php include "modules/sidebar-musician-cats.php"; ?> 
				
				<?php endif; ?>
			
			<?php endwhile; ?>
			
		<?php endif; ?>
		
