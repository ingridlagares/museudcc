<section class="standard-wysiwyg content-block container">
	
	<div class="row">
	
		<div class="col-sm-24" style="margin-bottom:-50px">
	
			<?php if(get_sub_field('section_title')){ ?>
				<h2 class="section-title"><?php the_sub_field('section_title'); ?></h2>
			<?php } ?>
	
			<?php the_sub_field('wysiwyg'); ?>
		
		</div>
		
	</div>
	
</section>