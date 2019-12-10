<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/modules/responsiveslides/responsiveslides.css">
<script type='text/javascript' src='<?php bloginfo('template_url'); ?>/modules/responsiveslides/responsiveslides.min.js'></script>
<script type='text/javascript'>
	jQuery(document).ready(function($) {
		$(".rslides").responsiveSlides({
	        auto: false,
	        pagination: false,
			nav: true,
	        speed: 500,
	        namespace: "rslideshow"
      	});
	});
</script>

<section id="slideshow" class="content-block feature-block container">

	<div class="row">
		
		<div class="col-sm-24">
		      
			<?php if( have_rows('slides') ): ?>
			
				<ul class="rslides">
			
					<?php while( have_rows('slides') ): the_row(); 
						
						$image = get_sub_field('image');
						
						// vars
						$url = $image['url'];
						$title = $image['title'];
						$alt = $image['alt'];
						$caption = $image['caption'];
						// thumbnail
						$size = '800x600';
						$slide = $image['sizes'][ $size ];
						
					?>
					<li>
						<img src="<?php echo $slide; ?>" alt="<?php echo $alt; ?>" />
						<?php if( $caption ): ?>
						<p class="caption"><?php echo $caption; ?></p>
						<?php endif; ?> 
					</li>
					
					<?php endwhile; ?>
			
				</ul>

			<?php endif; ?>
    
		</div>
	
	</div>

</section>