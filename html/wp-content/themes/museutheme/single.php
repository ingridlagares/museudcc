<?php get_header(); ?>

<div id="main-content" class="wrap">

	<div class="container">

		<div class="row">
	
			<div id="page-content" class="col-sm-16">
				
					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					
						<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
								
							<h1><?php the_title(); ?></h1>
														
							<?php
								$image_id = get_post_thumbnail_id($post->ID);	
								$heroimage_url = wp_get_attachment_image_src($image_id,'800-landscape'); 
								$heroimage_url = $heroimage_url[0];
								$alt_text = get_post_meta($image_id , '_wp_attachment_image_alt', true);
								
								if($image_id){
							?>						
							<div class="lead-image">
								<img src="<?php echo $heroimage_url;?>" alt="<?php echo $alt_text; ?>"/>
							</div>
							<?php } ?>	
														
							<!-- chuck this once done with the test data -->
							<div class="post-content">
								<?php the_content();?>
							</div>
							
							<div id="single-postmeta" class="postmeta">
								<p>Posted in <?php the_category(', ') ?> by <?php the_author(); ?> on <?php the_time('F jS, Y') ?>. <?php the_tags(); ?></p>
								<p><?php post_comments_feed_link('Subscribe to comments'); ?>
			
								<?php if (('open' == $post-> comment_status) && ('open' == $post->ping_status)) {
									// Both Comments and Pings are open ?>
									| <a href="#respond">Leave a Comment</a> | <a href="<?php trackback_url(); ?>" rel="trackback">Trackback</a>
			
								<?php } elseif (!('open' == $post-> comment_status) && ('open' == $post->ping_status)) {
									// Only Pings are Open ?>
									Responses closed | <a href="<?php trackback_url(); ?> " rel="trackback">Trackback</a>
			
								<?php } elseif (('open' == $post-> comment_status) && !('open' == $post->ping_status)) {
									// Comments are open, Pings are not ?>
									You can skip to the end and leave a response. Pinging is currently not allowed.
			
								<?php } elseif (!('open' == $post-> comment_status) && !('open' == $post->ping_status)) {
									// Neither Comments, nor Pings are open ?>
									| Both comments and pings are currently closed.
			
								<?php } edit_post_link('Edit this entry',' | ',''); ?>
								</p>
							</div>
								
							<?php comments_template('', true); ?>
											    
						</article>
						        
					<?php endwhile; else: ?>
					
					<p>Sorry, nothing found!</p>
			
					<?php endif; ?>
			
			</div><!-- /page-content -->
			
			<?php get_sidebar(); ?>
					
		</div><!-- /row -->
		
	</div><!-- /container -->
		
</div><!-- /main-content -->
	
<?php get_footer(); ?>