<div id="sidebar" class="col-sm-7 col-sm-offset-1" role="complementary">
	
	<div id="sidebar-inner">
		
		<div class="theme-filter-widget widget">
		
			<h3 class="widgettitle">Object Search</h3>
		
			<form method="get" action="<?php echo home_url();?>">
		    	<legend>Use this to filter the results</legend>
		      	<label>
		        <select style="height:25px" onchange="location = this.options[this.selectedIndex].value;">
		          	<option value="" selected>Collection Type</option>
					<option value="<?php bloginfo('url'); ?>/objects/?type=MShed Object">MShed Object</option>
					<option value="<?php bloginfo('url'); ?>/objects/?type=MShed Story">MShed Story</option>
		        </select>
		      </label>
		    </form>
		    
		 </div>
		
	</div>

</div>