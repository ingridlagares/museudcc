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
				<div id="mc_embed_signup">
				<form action="//lunamedia.us2.list-manage.com/subscribe/post?u=0ba2ca824c49875d12e4b61de&amp;id=4f735a6670" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
				    <div id="mc_embed_signup_scroll">
					
				<div class="mc-field-group">
					<input type="email" value="" name="EMAIL" class="required email" id="mce-EMAIL" placeholder="Your email address" >
				</div>
					<div id="mce-responses" class="clear">
						<div class="response" id="mce-error-response" style="display:none"></div>
						<div class="response" id="mce-success-response" style="display:none"></div>
					</div>    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
				    <div style="position: absolute; left: -5000px;"><input type="text" name="b_0ba2ca824c49875d12e4b61de_4f735a6670" tabindex="-1" value=""></div>
				    <input type="submit" value="<?php if(get_sub_field('signup_button_text')){ the_sub_field('signup_button_text'); } else { ?>Subscribe<?php } ?>" name="subscribe" id="mc-embedded-subscribe" class="button submit-button">
				    
				</form>
				</div>
				
				<!--End mc_embed_signup-->
			
			</div>
			
		</div>
		
	</div>
	
</section>