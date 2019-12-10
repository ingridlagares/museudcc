<?php

$timelinetype = get_sub_field("type");

// Overriding you hacky mother

$timelinetype = "complex";


If($timelinetype == "complex")
{

// embed the complicated timeline..	
	
$selectedtimeline = get_sub_field("choose_timeline");

$timelinepath = get_post_permalink($selectedtimeline);

// Override - until we can sort out single-hh_timeline.php which requires a better man than me...

$timelinepath = home_url() . "/wp-content/themes/handelhendrix/modules/timeline2/handel.json";


// From Google Docs
//$timelinepath = "https://docs.google.com/spreadsheets/d/1Ae36hPp1QiD6xxMpjO0z9G99ilv91h4Zgq3-dO2_jFs/pubhtml";	

	
?>

<!-- CSS-->
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/modules/timeline2/css/timeline.css?v1">
<!--FONT-->
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/modules/timeline2/css/fonts/font.default.css?v1">
<!-- Style-->
<style>

  .tl-timeline 
  {
  	width:100%;
  	height:500px;
  }
  
  .timeline
  {
  }
  
  .tl-text-content-container
  {
	  
  }
  
  .tl-text-content
  {
	  
  }
  
  .tl-headline
  {
	  font-size: 16px;
  }
  
  .tl-slide-background
  {
	  opacity: 0.5;
  }
  
  
</style>

<!-- HTML5 shim, for IE6-8 support of HTML elements-->
<!--if lt IE 9
script(src='https://html5shim.googlecode.com/svn/trunk/html5.js')    
-->

<section>

	<div class="row">	

		<div id="cd-timeline" class="col-sm-24">
			<div id="timeline"></div>
			<!-- JavaScript-->
			<script src="<?php bloginfo('template_url'); ?>/modules/timeline2/js/timeline.js"></script>
			
			<script>
			  var timeline = new TL.Timeline('timeline', '<?php echo $timelinepath;?>',{
				scale_factor:1,
				layout:"portrait",
				//width:"400",
				start_at_slide:0,
				timenav_height:100,
				timenav_height_percentage:15,
				timenav_height_min:200,
			});
			</script>	
		</div>

	</div>
	
</section>

<!--ALL THE THINGS


    script_path:                "",
    height:                     this._el.container.offsetHeight,
    width:                      this._el.container.offsetWidth,
    scale_factor:               1,              // How many screen widths wide should the timeline be
    layout:                     "landscape",    // portrait or landscape
    timenav_position:           "bottom",       // timeline on top or bottom
    optimal_tick_width:         100,            // optimal distance (in pixels) between ticks on axis
    base_class:                 "",
    timenav_height:             150,
    timenav_height_percentage:  25,             // Overrides timenav height as a percentage of the screen
    timenav_height_min:         150,            // Minimum timenav height
    marker_height_min:          30,             // Minimum Marker Height
    marker_width_min:           100,            // Minimum Marker Width
    marker_padding:             5,              // Top Bottom Marker Padding
    start_at_slide:             0,
    menubar_height:             0,
    skinny_size:                650,
    relative_date:              false,          // Use momentjs to show a relative date from the slide.text.date.created_time field
    use_bc:                     false,          // Use declared suffix on dates earlier than 0
    // animation
    duration:                   1000,
    ease:                       TL.Ease.easeInOutQuint,
    // interaction
    dragging:                   true,
    trackResize:                true,
    map_type:                   "stamen:toner-lite",
    slide_padding_lr:           100,            // padding on slide of slide
    slide_default_fade:         "0%",           // landscape fade			
    api_key_flickr:             "",             // Flickr API Key
    language:                   "en" 	



-->		


<?php
}
else

// it's a simple timeline. yay.

{	

?>

<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/modules/timeline/timeline.css">
<script type='text/javascript' src='<?php bloginfo('template_url'); ?>/modules/timeline/timeline.min.js'></script>
<script type='text/javascript'>
	jQuery(document).ready(function($) {
		});
</script>

<section class="timeline content-block feature-block container">

	<div class="row">
			
		<?php if(get_sub_field('section_title')){ ?>
			<h2 class="section-title col-sm-24"><?php the_sub_field('section_title'); ?></h2>
		<?php } ?>
		
		<?php if( have_rows('point') ): ?>
		
				<div id="cd-timeline" class="col-sm-24">
			
					<?php while ( have_rows('point') ) : the_row(); ?>
					
					<?php if(get_sub_field('derive_content') == true){	
						$point_url = get_sub_field('linked_content');	
						$point_id = url_to_postid($point_url); 	
						$point_title = get_the_title($point_id);
						$point_blurb = get_field('page_summary',$point_id);
						} else {
						$point_title = get_sub_field('point_title');
						$point_blurb = get_sub_field('point_description');
						} 
					?>
					      	
					<div class="cd-timeline-block row">
						<div class="cd-timeline-img cd-picture">
							<img src="img/cd-icon-picture.svg" alt="Picture">
						</div> <!-- cd-timeline-img -->
			
						<div class="cd-timeline-content">
							<h2><?php echo $point_title; ?></h2>
							<div><?php echo $point_blurb; ?></div>
							<span class="cd-date"><?php the_sub_field('date'); ?></span>
						</div> <!-- cd-timeline-content -->
					</div> <!-- cd-timeline-block -->
					
					<?php endwhile; ?>
				
				</div>
			
		<?php endif; ?>	
	
	</div>

</section>
<?php
	}
?>