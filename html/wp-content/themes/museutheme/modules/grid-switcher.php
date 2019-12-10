<?php while(has_sub_field("content_builder")): ?>
	 
	<?php if(get_row_layout() == "welcome_block"):  ?>
												
		<?php include "grid-welcome-block.php"; ?>

	<?php elseif(get_row_layout() == "plan_visit_block"):  ?>
	
		<?php include "grid-plan-visit-block.php"; ?>
		
	<?php elseif(get_row_layout() == "whats_on_block"):  ?>
	
		<?php include "grid-whats-on-block.php"; ?>	
		
	<?php elseif(get_row_layout() == "shop_block"):  ?>
	
		<?php include "grid-shop-block.php"; ?>	
		
	<?php elseif(get_row_layout() == "story_block"):  ?>
	
		<?php include "grid-story-block.php"; ?>	
	
	<?php elseif(get_row_layout() == "advert_block"):  ?>
	
		<?php include "grid-advert-block.php"; ?>	

	<?php elseif(get_row_layout() == "picture_block"):  ?>
	
		<?php include "grid-picture-block.php"; ?>
		
	<?php endif; ?>

<?php endwhile; ?>	
