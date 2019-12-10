<div id="calendar-widget " class="widget">

	<h3 class="widgettitle">
	<?php if(get_sub_field('widget_title')){ ?>
		<?php the_sub_field('widget_title'); ?>
	<?php } else { echo 'Events Calendar'; } ?>
	</h3>

	<div class="widget-inner">

		<!-- start calendar -->
			<script type='text/javascript' src='<?php bloginfo('template_url'); ?>/modules/fullcalendar/fullcalendar.min.js'></script>
			<script type='text/javascript'>
			
				jQuery(document).ready(function($) {
				
					var date = new Date();
					var d = date.getDate();
					var m = date.getMonth();
					var y = date.getFullYear();
					
					$('#calendar').fullCalendar({
						header: {
							left: 'prev,next today',
							center: 'title',
							right: ''
						},
						editable: false,
						/* events: "<?php bloginfo('template_url'); ?>/modules/templ_eventlisting-json.php" */
						events: "<?php echo home_url(); ?>/json-event-listing", 
						loading: function(isLoading, view) {
							if (isLoading) {
								$('#calendar').addClass('loading');
							} else {
								$('#calendar').removeClass('loading');
							}
						},
						lazyFetching: false,
						firstDay: 1,
					});
					
				});
			
			</script>
			
			<div id="calendar"></div>
			
			<!-- /end calendar -->

		
	</div>
	
</div>