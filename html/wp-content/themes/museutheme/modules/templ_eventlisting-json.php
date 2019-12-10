<?php

/**
 * Template Name: Events Listing JSON
 *
 * This template produces JSON for the mini calendars on the site
 *
 */


$args = array('post_type' => 'hh_event', 'posts_per_page' => -1,
		'meta_query' => array(
			array(
	             'key' => 'event_start_date',
	             'value' => date("Ymd"),
	             'compare' => '>=',
	             'type' => 'DATE'
				 )));

		        
$res = get_posts($args);

$pages = array();

$include_times = true;

foreach($res as $post) 
{
	$id = $post->ID;
	$tmp['id'] = $id;
	$tmp['title'] = $post->post_title;
	$start_time = get_field('event_start_time',$id);
	$end_time = get_field('event_end_time',$id);
	
	
	if ($include_times && !empty($start_time) && !empty($end_time)) 
	{
		$tmp['start'] = strtotime(get_field('event_start_date',$id)." ".$start_time);
		$tmp['end'] = strtotime(get_field('event_end_date',$id)." ".$end_time);
	}
	else 
	{
		$tmp['start'] = strtotime(get_field('event_start_date',$id));
		$tmp['end'] = strtotime(get_field('event_end_date',$id));
	}

	$start_time = get_field('event_start_time',$id);

	if (!empty($start_time)) 
	{
		$tmp['allday'] = false;
	}
		$tmp['url'] = get_permalink($id);
		$pages[] = $tmp;
}

echo json_encode($pages);


?>



