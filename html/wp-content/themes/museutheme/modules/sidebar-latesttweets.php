<div id="custom-tweets" class="widget">

<!--Begin Latest Tweets-->

	<h3 class="widgettitle"><a href="http://twitter.com/KRIIICentre">Latest Tweets</a></h3>

	<?php 
	
	
	$TweetsToDisplay = get_sub_field("number_of_tweets_to_display");
	$screen_name = "KRIII VisitorCentre";
	$user_id = "KRIIICentre";
	
	
	if($TweetsToDisplay == "")
	{
		$TweetsToDisplay = 5;		
	}
	
	
	// echo "display = " . $TweetsToDisplay;
	
	$tweets = getTweets('KRIIICentre', $TweetsToDisplay);
	foreach($tweets as $tweet) 
	{
	
		$timestamp = strtotime($tweet['created_at']);
		$tweetdate = date('d F Y',$timestamp);
		//$screen_name = $tweet['screen_name'];
		$tweetID = $tweet['id_str'];
										
		$screen_name = "KRIII VisitorCentre";
		$user_id = "KRIIICentre";		
		
		$tweet_text = $tweet["text"];
		$tweet_text = preg_replace('/http:\/\/([a-z0-9_\.\-\+\&\!\#\~\/\,]+)/i', '<a href="http://$1" target="_blank">http://$1</a>', $tweet_text); //replace links
		$tweet_text = preg_replace('/@([a-z0-9_]+)/i', '<a href="http://twitter.com/$1" target="_blank">@$1</a>', $tweet_text); //replace users
							
	
	?>    
	
	
	<p>
		<?php echo $tweet_text; ?>
		<br />
		<span class="tweetdate">
			<a href="http://twitter.com/<?php echo $user_id;?>/status/<?php echo $tweetID;?>"><?php echo $tweetdate; ?></a>
		</span>
	</p>													
		
	<?php    
	}			
	?>
				
	
<!--End Latest Tweets-->

</div>