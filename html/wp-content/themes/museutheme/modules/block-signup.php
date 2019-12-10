<?php

$suppliedemail = "";	

if (!empty($_POST["EMAIL"])) 
{
	$suppliedemail = $_POST["EMAIL"];
}

	
	
?>


<section class="block-signup content-block container">

	<div class="row">
	
		<?php if(get_sub_field('show_section_border')){ ?>
		<div class="content-block-border col-sm-24">
			<div class="content-block-border-inner"></div>
		</div>
		<?php } ?>
	
		<div class="col-sm-24">
			
			<div class="signup-inner">
			
				<?php if(get_sub_field('signup_header')){ ?>
					<h2 class="section-title"><?php the_sub_field('signup_header'); ?></h2>
				<?php } ?>

<!-- Begin MailChimp Signup Form -->

<link href="http://cdn-images.mailchimp.com/embedcode/classic-081711.css" rel="stylesheet" type="text/css">

<style type="text/css">

#mc_embed_signup {
	background:#fff; 
	clear:left; 
	font:14px Helvetica,Arial,sans-serif; 
}

/* Add your own MailChimp form style overrides in your site stylesheet or in this style block.
  We recommend moving this block and the preceding CSS link to the HEAD of your HTML file. */
  
</style>

<div id="mc_embed_signup">
	
    <form action="http://handelhouse.us4.list-manage.com/subscribe/post?u=8fd5c2684bc811c5dd9fb8f92&amp;id=608faec15d" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank">
    
        <h2>Subscribe to our mailing list</h2>
        <div class="indicates-required">
            <span class="asterisk">*</span>
            indicates required
        </div>
            
        <div class="mc-field-group">
            <label for="mce-EMAIL">Email Address <span class="asterisk">*</span></label>
            <input type="email" value="<?php echo $suppliedemail;?>" name="EMAIL" class="required email" id="mce-EMAIL">
        </div>	
        
        <div class="mc-field-group">
            <label for="mce-TITLE">Title <span class="asterisk">*</span></label>
            <input type="text" value="" name="TITLE" class="required" id="mce-TITLE">
        </div>
        
        <div class="mc-field-group">
            <label for="mce-FIRSTNAME">First name <span class="asterisk">*</span></label>
            <input type="text" value="" name="FIRSTNAME" class="required" id="mce-FIRSTNAME">
        </div>
        
        <div class="mc-field-group">
            <label for="mce-SURNAME">Surname <span class="asterisk">*</span></label>
            <input type="text" value="" name="SURNAME" class="required" id="mce-SURNAME">
        </div>
    
        <div class="mc-field-group input-group">
            <strong>Would you like to know more about: </strong>
            <ul>
                <li>
                    <input type="checkbox" value="1" name="group[1625][1]" id="mce-group[1625]-1625-0">
                    <label for="mce-group[1625]-1625-0">Events (concerts, exhibitions, workshops, lectures)</label>
                </li>
                <li>
                    <input type="checkbox" value="2" name="group[1625][2]" id="mce-group[1625]-1625-1">
                    <label for="mce-group[1625]-1625-1">Family events</label>
                </li>
                <li>
                    <input type="checkbox" value="4" name="group[1625][4]" id="mce-group[1625]-1625-2">
                    <label for="mce-group[1625]-1625-2">New music at Handel House</label>
                </li>
                <li>
                    <input type="checkbox" value="8" name="group[1625][8]" id="mce-group[1625]-1625-3">
                    <label for="mce-group[1625]-1625-3">Hendrix at 23 Brook Street</label>
                </li>
                <li>
                    <input type="checkbox" value="16" name="group[1625][16]" id="mce-group[1625]-1625-4">
                    <label for="mce-group[1625]-1625-4">School visits</label>
                </li>
            </ul>
        </div>
        
        <!--
        
        <div class="mc-field-group input-group">
            <strong>Email Format </strong>
            <ul>
                <li>
                    <input type="radio" value="html" name="EMAILTYPE" id="mce-EMAILTYPE-0">
                    <label for="mce-EMAILTYPE-0">html</label>
                </li>
                <li>
                    <input type="radio" value="text" name="EMAILTYPE" id="mce-EMAILTYPE-1">
                    <label for="mce-EMAILTYPE-1">text</label>
                </li>
                <li>
                    <input type="radio" value="mobile" name="EMAILTYPE" id="mce-EMAILTYPE-2">
                    <label for="mce-EMAILTYPE-2">mobile</label>
                </li>
            </ul>
        </div>
        
        -->
        
        <div id="mce-responses" class="clear">
            <div class="response " id="mce-error-response" style="display:none"></div>
            <div class="response" id="mce-success-response" style="display:none"></div>
        </div>	
        <div class="clear">
            <input type="submit" value="<?php if(get_sub_field('signup_button_text')){ the_sub_field('signup_button_text'); } else { ?>Subscribe<?php } ?>" name="subscribe" id="mc-embedded-subscribe" class="button submit-button">
        </div>
	</form>
    
</div>

<script type="text/javascript">
var fnames = new Array();var ftypes = new Array();fnames[0]='EMAIL';ftypes[0]='email';fnames[1]='TITLE';ftypes[1]='text';fnames[3]='FIRSTNAME';ftypes[3]='text';fnames[2]='SURNAME';ftypes[2]='text';
try {
    var jqueryLoaded=jQuery;
    jqueryLoaded=true;
} catch(err) {
    var jqueryLoaded=false;
}
var head= document.getElementsByTagName('head')[0];
if (!jqueryLoaded) {
    var script = document.createElement('script');< /div>
    script.type = 'text/javascript';
    script.src = 'http://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js';
    head.appendChild(script);
    if (script.readyState && script.onload!==null){
        script.onreadystatechange= function () {
              if (this.readyState == 'complete') mce_preload_check();
        }    
    }
}
var script = document.createElement('script');
script.type = 'text/javascript';
script.src = 'http://downloads.mailchimp.com/js/jquery.form-n-validate.js';
head.appendChild(script);
var err_style = '';
try{
    err_style = mc_custom_error_style;
} catch(e){
    err_style = '#mc_embed_signup input.mce_inline_error{border-color:#6B0505;} #mc_embed_signup div.mce_inline_error{margin: 0 0 1em 0; padding: 5px 10px; background-color:#6B0505; font-weight: bold; z-index: 1; color:#fff;}';
}
var head= document.getElementsByTagName('head')[0];
var style= document.createElement('style');
style.type= 'text/css';
if (style.styleSheet) {
  style.styleSheet.cssText = err_style;
} else {
  style.appendChild(document.createTextNode(err_style));
}
head.appendChild(style);
setTimeout('mce_preload_check();', 250);

var mce_preload_checks = 0;
function mce_preload_check(){
    if (mce_preload_checks>40) return;
    mce_prel oad_checks++;
    try {
        var jqueryLoaded=jQuery;
    } catch(err) {
        setTimeout('mce_preload_check();', 250);
        return;
    }
    try {
        var validatorLoaded=jQuery("#fake-form").validate({});
    } catch(err) {
        setTimeout('mce_preload_check();', 250);
        return;
    }
    mce_init_form();
}
function mce_init_form(){
    jQuery(document).ready( function($) {
      var options = { errorClass: 'mce_inline_error', errorElement: 'div', onkeyup: function(){}, onfocusout:function(){}, onblur:function(){}  };
      var mce_validator = $("#mc-embedded-subscribe-form").validate(options);
      $("#mc-embedded-subscribe-form").unbind('submit');//remove the validator so we can get into beforeSubmit on the ajaxform, which then calls the validator
      options = { url: 'http://handelhouse.us4.list-manage.com/subscribe/post-json?u=8fd5c2684bc811c5dd9fb8f92&id=608faec15d&c=?', type: 'GET', dataType: 'json', contentType: "application/json; charset=utf-8",
                    beforeSubmit: function(){
                        $('#mce_tmp_error_msg').remove();
                        $('.datefield','#mc_embed_signup').each(
                            function(){
                                var txt = 'filled';
                                var fields = new Array();
                                var i = 0;
                                $(':text', this).each(
                                    function(){
                                        fields[i] = this;
                                        i++;
                                    });
                                $(':hidden', this).each(
                                    function(){
                                        var bday = false;
                                        if (fields.length == 2){
                                            bday = true;
                                            fields[2] = {'value':1970};//trick birthdays into having years
                                        }
                                    if ( fields[0].value=='MM' && fields[1].value=='DD' && (fields[2].value=='YYYY' || (bday && fields[2].value==1970) ) ){
                                    this.value = '';
   } else if ( fields[0].value== '' && fields[1].value=='' && (fields[2].value=='' || (bday && fields[2].value==1970) ) ){
                                    this.value = '';
   } else {
                                       this.value = fields[0].value+'/'+fields[1].value+'/'+fields[2].value;
                                   }
                                    });
                            });
                        return mce_validator.form();
                    }, 
                    success: mce_success_cb
                };
      $('#mc-embedded-subscribe-form').ajaxForm(options);
      
      
    });
}
function mce_success_cb(resp){
    $('#mce-success-response').hide();
    $('#mce-error-response').hide();
    if (resp.result=="success"){
        $('#mce-'+resp.result+'-response').show();
        $('#mce-'+resp.result+'-response').html(resp.msg);
        $('#mc-embedded-subscribe-form').each(function(){
            this.reset();
    });
    } else {
        var index = -1;
        var msg;
        try {
            var parts = resp.msg.split(' - ',2);
            if (parts[1]==undefined){
                msg = resp.msg;
            } else {
                i = parseInt(parts[0]);
                if (i.toString() == parts[0]){
                    index = parts[0];
                    msg = parts[1];
                } else {
                    index = -1;
                    msg = resp.msg;
                }
            }
        } catch(e){
            index = -1;
            msg = resp.msg;
        }
        try{
            if (index== -1){
                $('#mce-'+resp.result+'-response').show();
                $('#mce-'+resp.result+'-response').html(msg);            
            } else {
                err_id = 'mce_tmp_error_msg';
                html = '<div id="'+err_id+'" style="'+err_style+'"> '+msg+'</div>';
                
                var input_id = '#mc_embed_signup';
                var f = $(input_id);
                if (ftypes[index]=='address'){
                    input_id = '#mce-'+fnames[index]+'-addr1';
                    f = $(input_id).parent().parent().get(0);
                } else if (ftypes[index]=='date'){
  &nb sp;                 input_id = '#mce-'+fnames[index]+'-month';
                    f = $(input_id).parent().parent().get(0);
                } else {
                    input_id = '#mce-'+fnames[index];
                    f = $().parent(input_id).get(0);
                }
                if (f){
                    $(f).append(html);
                    $(input_id).focus();
                } else {
                    $('#mce-'+resp.result+'-response').show();
                    $('#mce-'+resp.result+'-response').html(msg);
                }
            }
        } catch(e){
            $('#mce-'+resp.result+'-response').show();
            $('#mce-'+resp.result+'-response').html(msg);
        }
    }
}

</script>

<!--End mc_embed_signup-->				
				

			
			</div>
			
		</div>
		
	</div>
	
</section>