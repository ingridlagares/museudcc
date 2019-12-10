<?php

$thisurl = "http://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];
$thistitle = get_the_title();
$thisimage = "";
$thisdescription = get_field("page_summary");

// this is pretty horrible
$twitteraccount = get_field('twitter_url', 'option'); 
$twitteraccount = str_replace("https://","",$twitteraccount);
$twitteraccount = str_replace("http://","",$twitteraccount);
$twitteraccount = str_replace("twitter.com/","",$twitteraccount);
	
?>

<div id="hh-share-widget" class="widget">
	
	<div class="row">
		
		<div class="col-sm-8">
			<h3>Share</h3>
		</div>
		<div class="hh-share-buttons col-sm-16">
			<div class="hh-share-buttons-inner">
			<a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $thisurl;?>&t=<?php echo $thistitle;?>" target="_blank" title="Share on Facebook"><i class="fa fa-facebook-square fa-2x"></i></a>
		  	
		  	<a href="https://twitter.com/intent/tweet?source=<?php echo $thisurl;?>&text=<?php echo $thistitle;?>:%20<?php echo $thisurl;?>&via=<?php echo $twitteraccount;?>" target="_blank" title="Tweet"><i class="fa fa-twitter-square fa-2x"></i></a>
		  	
		  	<a href="mailto:?subject=<?php echo $thistitle;?>&body=<?php echo $thisdescription;?>:%20<?php echo $thisurl;?>" target="_blank" title="Email"><i class="fa fa-envelope-square fa-2x"></i></a>
			</div>
		</div>
	
	</div>
	
</div>