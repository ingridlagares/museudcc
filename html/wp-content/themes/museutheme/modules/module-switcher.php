<?php 
	while(has_sub_field("layout")): 
		
?>

	<?php if(get_row_layout() == "standard_wysiwyg"):  ?>
											
			<?php include "block-wysiwyg.php"; ?>

	<?php elseif(get_row_layout() == "one_column_feature_block"):  ?>
	
			<?php include "block-1col-feature.php"; ?>
		
	<?php elseif(get_row_layout() == "block_2col_wysiwyg"):  ?>
	
			<?php include "block-2col-wysiwyg.php"; ?>
		
	<?php elseif(get_row_layout() == "block_3col_wysiwyg"):  ?>
	
			<?php include "block-3col-wysiwyg.php"; ?>				
	
	<?php elseif(get_row_layout() == "two_column_feature_block"):  ?>
	
			<?php include "block-2col-feature.php"; ?>			
																	
	<?php elseif(get_row_layout() == "three_column_feature_block"):  ?>
	
			<?php include "block-3col-feature.php"; ?>
		
	<?php elseif(get_row_layout() == "three_column_picture_boxes"):  ?>
	
			<?php include "block-3col-picturebox.php"; ?>
			
	<?php elseif(get_row_layout() == "four_column_feature_block"):  ?>

		<?php include "block-4col-feature.php"; ?>
	
	<?php elseif(get_row_layout() == "content_sidebar_block"):  ?>
	
		<?php include "block-content-sidebar.php"; ?>
		
	<?php elseif(get_row_layout() == "newsletter_signup_block"): ?>
	
		<?php include "block-signup.php"; ?>
		
	<?php elseif(get_row_layout() == "question_/_answer_block"): ?>
	
		<?php include "block-qa.php"; ?>
		
	<?php elseif(get_row_layout() == "slideshow"): ?>
	
		<?php include "block-slideshow.php"; ?>

	<?php elseif(get_row_layout() == "timeline"): ?>
	
		<?php include "block-timeline.php"; ?>				

	<?php elseif(get_row_layout() == "html_snippet"): ?>
	
		<?php include "block-html-snippet.php"; ?>	

	<?php elseif(get_row_layout() == "page_post_listing"): ?>
	
		<?php include "block-postlisting.php"; ?>	
		
			
		
	
	<?php 
		//------------ Newsletter blocks -------------------		
	?>
	
	<?php elseif(get_row_layout() == "newsletter_wysiwyg"):  ?>
	
			<?php include "newsletter-wysiwyg.php"; ?>

	<?php elseif(get_row_layout() == "newsletter_snippet"):  ?>
	
			<?php include "newsletter-snippet.php"; ?>
	
	


	<?php endif; ?>
	

<?php endwhile; ?>	
