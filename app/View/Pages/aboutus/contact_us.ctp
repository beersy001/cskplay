<?php
	echo '<script>var date = "' . date('Ym') . '"</script>';
	$this->Html->script( "slideShow", array("inline"=>false));
?>
<div class="grid" id="main_grid">

	<div class="onerow background_container">
		<div class="col3">
		</div>

		<div class="col9 last">
			<h1>contact us</h1>
		</div>
	</div>

	<div class="onerow background_container">
		<div id="side_menu" class="col3">
			<?= $this->element('about_us_nav_bar'); ?>
		</div>


		<div class="col9 last">
			<?= $this->Html->image( 'quickLinks/message_white.png', array('class'=>'message_title_image', 'align'=>'left') ) ?>
			<h2 class="large_indent border_bottom margin_bottom">contact us</h2>
			<p class="large_indent">please let us know your suggestions or comments, we are always trying to improve our site!</p>
			<p class="large_indent">we will try and get back to you as soon as we can</p>
		</div>
	</div>

	<div class="onerow background_container margin_bottom">

		<div class="col2"></div>

		<div class="col4 form_container">
			
			<?= $this->Html->image( 'quickLinks/pencil_white.png', array('class'=>'pencil_title_image', 'align'=>'left') ) ?>

			<h2 class="margin_bottom border_bottom large_indent">send us a message</h2>

			<div class="large_indent">
				
				<form action="#" id="contact_us_form" method="post" accept-charset="utf-8" onsubmit="return validateForm()">
					<div style="display:none;">
						<input type="hidden" name="_method" value="POST">
					</div>
					
					<div class="input_row">
						<label id="ContactNameLabel" for="ContactName">name</label>
						<input name="data[Contact][name]" maxlength="2000" type="text" id="ContactName" class="clear wide_input" onChange="validatename();">
						<div id="check_name" class="tiny_text"></div>
					</div>

					<div class="input_row">
						<label id="ContactEmailAddressLabel" for="ContactEmailAddress">email address</label>
						<input name="data[Contact][emailAddress]" maxlength="2000" type="text" id="ContactEmailAddress" class="clear wide_input" onChange="validatename();">
						<div id="check_emailAddress" class="tiny_text"></div>
					</div>

					<div class="input_row">
						<label id="ContactMessageLabel" for="ContactMessage">message</label>
						<textarea name="data[Contact][message]" type="textarea" rows="10" id="ContactMessage" class="clear wide_input" onChange="validatename();"></textarea>
						<div id="check_message" class="tiny_text"></div>
					</div>

					<div class="submit">
						<input type="submit" value="submit">
					</div>
				</form>
			</div>
		</div>

		<div class="col3">

			<?= $this->Html->image( 'quickLinks/email_white.png', array('class'=>'email_title_image', 'align'=>'left') ) ?>
			<h2 class="margin_bottom border_bottom large_indent">email or write</h2>
			<div class="large_indent">
				<p>10 Quebec Wharf</p>
				<p>315 Kingsland Road</p>
				<p>London</p>
				<p>E8 4DJ</p>
				<a href="mailto:info@cskplay.com?Subject=a%20little%20message" target="_top">info@cskplay.com</a>
			</div>
		</div>
		
		<div class="col3 last">
			<?= $this->Html->image( 'quickLinks/contact_white.png', array('class'=>'contact_title_image', 'align'=>'left') ) ?>
			<h2 class="margin_bottom border_bottom large_indent">call us</h2>
			<div class="large_indent">
				<p>+44(0)7766 803397</p>
			</div>
		</div>

	</div>
</div>

<?= $this->element('quick_links'); ?>