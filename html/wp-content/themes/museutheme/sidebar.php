<div id="sidebar" class="col-sm-7 noprint" role="complementary">

	<div id="sidebar-inner">
		<?php if ( is_sidebar_active('primary_widget_area') ) : ?>
		  <div id="primary" class="widget-area">
		   <ul class="xoxo">
		    <?php dynamic_sidebar('primary_widget_area'); ?>
		   </ul>
	   </div><!-- #primary .widget-area -->
		<?php endif; ?>

		<?php if ( is_sidebar_active('secondary_widget_area') ) : ?>
		  <div id="secondary" class="widget-area">
		   <ul class="xoxo">
		    <?php get_sidebar( 'categoria' ); ?>
		   </ul>
	   </div><!-- #secondary .widget-area -->
		<?php endif; ?>
	</div>

</div>
