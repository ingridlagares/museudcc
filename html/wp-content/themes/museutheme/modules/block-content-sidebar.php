<section class="block-content-sidebar content-block container">

	<div class="row">
	
		<?php if(get_sub_field('section_title')){ ?>
			<h2 class="section-title col-sm-24"><?php the_sub_field('section_title'); ?></h2>
		<?php } ?>

		<div class="col-sm-16">
			<?php if(get_sub_field('content_title')){ ?>
				<h2><?php the_sub_field('content_title'); ?></h2>
			<?php } ?>
			<div><?php the_sub_field('content_wysiwyg'); ?></div>
		</div>
		
		<div class="col-sm-8">
			<?php if(get_sub_field('sidebar_title')){ ?>
				<h2><?php the_sub_field('sidebar_title'); ?></h2>
			<?php } ?>
			<div><?php the_sub_field('sidebar_wysiwyg'); ?></div>
		</div>
	
	</div>
		
</section>