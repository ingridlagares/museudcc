<div id="hero" class="wrap">

	<div class="container">

		<div class="two-thirds column">
	
			<div class="flexslider">
		         
	         	<?php if(get_field('custom_carousel')): ?>
				<ul class="slides">
				<?php while(has_sub_field('custom_carousel')): ?>
				
	            	<li class="slide">
	  	    	   		<?php $attachment_id = get_sub_field('slide_image');
						$size = "slide"; 
						$image = wp_get_attachment_image_src( $attachment_id, $size ); ?>
						<img class="slide-image" src="<?php echo $image[0]; ?>" alt="<?php the_sub_field('slide_title'); ?>" /> 
	  	    		</li>
	  	    		
	  	    	<?php endwhile; ?>
	          	</ul>
	          	<?php endif; ?>
		          	
			</div><!-- /flexslider -->
		
		</div><!-- /eight -->
		
		<div id="hero-sidebar" class="one-third column">

			YO

		</div>
	
	</div><!-- /container -->

</div><!-- /hero -->