<section class="qa-featured content-block feature-block container">

	<div class="row">
	
		<?php if(get_sub_field('section_title')){ ?>
			<h2 class="section-title col-sm-24"><?php the_sub_field('section_title'); ?></h2>
		<?php } ?>

		<?php if( have_rows('question__answer') ):
		while ( have_rows('question__answer') ) : the_row(); ?>
		
		<div class="qa-question col-sm-24">
			<strong><?php the_sub_field('question'); ?></strong>
		</div>
	
		<div class="qa-answer col-sm-24">
			<blockquote><?php the_sub_field('answer'); ?></blockquote>
		</div>	
		
		<?php endwhile; endif; ?>
	
	</div>
		
</section>
