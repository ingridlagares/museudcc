<section class="onecol-featured content-block feature-block container">

	<div class="row">
		
		<?php if(get_sub_field('section_title')){ ?>
			<h2 class="section-title col-sm-24"><?php the_sub_field('section_title'); ?></h2>
		<?php } ?>		
		
		<?php
		
		$rows = get_sub_field('selected_pages');
		
		if($rows){
		
	    foreach($rows as $row){
	   
			 $selectedpage = $row['selected_page'];
			 $selectedpageid = $selectedpage->ID;
			 $selectedpagelink = get_permalink($selectedpageid);
			 $selectedpagetitle = get_the_title($selectedpageid);
			 			 
			 switch(get_post_type($selectedpageid))
			 {
				 
				 case "page":
				 	
				 	$selectedpageblurb = get_field('page_summary',$selectedpageid);
				 	$selectedpagetypedisplay = "Page: ";
				 
				 break;
				 
				 case "hh_event":
				 
					 $selectedpageblurb = get_field('short_description',$selectedpageid);
					 $selectedpagetypedisplay = "Event: ";
				 
				 break;
				 
				 case "hh_opera":
				 
					 $selectedpageblurb = get_field('synopsis',$selectedpageid);
					 $selectedpageblurb = implode(' ', array_slice(explode(' ', $selectedpageblurb), 0, 30));
					 $selectedpageblurb = $selectedpageblurb . "...";
					 $selectedpagetypedisplay = "Opera: ";					 
				 
				 break;				 
				 
				 
			 }
		   
		?>
		   
		<div class="feature-block col-sm-24">
			<a href="<?php echo $selectedpagelink; ?>"></a>
			<div class="feature-block-text grey">
			<h3 class="unit-header"><a href="<?php echo $selectedpagelink; ?>"><?php echo $selectedpagetitle; ?></a></h3>
			<div><?php echo $selectedpageblurb; ?></div>
			<p><a class="more-link button" href="<?php echo $selectedpagelink; ?>"><?php the_field('read_more_button_text', 'option'); ?><i class="fa fa-angle-right"></i></a></p>
			</div>
		</div>

		 <?php  }
		
		 } ?>   
	
	</div>

</section>