<?php


$TrelloFormAddress = "http://utilities.thirty8.co.uk/trelloform/hh/trelloform.php";
$TrelloBoardAddress = "https://trello.com/b/yp7yd7Lc/hh-website-snags";
	

$current_user = wp_get_current_user();
$UserDisplayName = $current_user->display_name;
	
	
?>

<script type="text/javascript">

function openFeedbackForm()
{
myWindow=window.open('<?php echo $TrelloFormAddress;?>?uname=<?php echo $UserDisplayName;?>&url=http://<?php echo $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"] ?>','','width=600,height=600');
myWindow.focus();		
		
}

</script>


<!--info tab start-->

	<style>
	
	#admintab 
	{
	  display:scroll;
	  background-color:#23282d;
	  padding:3px;
	  font-size:12px;	  
	  font-weight: bold;
	  position:fixed;
	  left:0px;
	  top:30px;
	  color:#ffffff;	  	  
	  z-index:10000;
	  width:95px;	  
	  height:25px;
	  }
	   
	  #admintab a
	  {
	  	color:#ffffff;
	  }


	  #admintab p
	  {
		  font-weight: normal;
		  font-size:10px;
		  text-align: left;
		  
	  }
	  
	  #admintab h4
	  {
		  font-size:14px;
		  margin-bottom:10px;
		  margin-top:20px;
		  border-bottom:1px dotted #cccccc;
	  }
	                
	</style>
	

	<div id="admintab">
							
		<p>
			<a style="text-decoration:underline" href="javascript:openFeedbackForm()">new</a>
			&nbsp;|&nbsp;
			<a style="text-decoration:underline" href="<?php echo $TrelloBoardAddress;?>" target="_blank">all</a>	
			&nbsp;|&nbsp;
			<a style="text-decoration:underline" target="_blank" href="https://docs.google.com/document/d/14qkMzlOAqNItZjMUkY3D6xOPVXY2rMCzEXgNmyZVQTQ/edit?usp=sharing">help</a>
		</p>
		
	</div>
	
	
	
<!--info tab end-->
	
	
	
<!--info tab end-->