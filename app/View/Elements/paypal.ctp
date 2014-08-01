<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top" id="pay_pal_form">
	<input type="hidden" name="cmd" value="_s-xclick">
	<input type="hidden" name="hosted_button_id" value="FRT9UD9L6LSZ8">
	<input type="image" src="https://www.paypalobjects.com/en_GB/i/btn/btn_paynow_LG.gif" border="0" name="submit" alt="PayPal – The safer, easier way to pay online.">
	<img alt="" border="0" src="https://www.paypalobjects.com/en_GB/i/scr/pixel.gif" width="1" height="1">
</form>

<div class="form_container">
	<?php
	echo $this->Form->create('User', array('controller'=>'Users', 'action' => 'purchaseGameBalls'));
	echo '<div class="input_row">';
	echo $this->Form->input('code',array(
		'class' => 'clear wide_input ',
		'label' => array(
			'class' => 'tiny_text',
			'text' => 'promo code'
		)
	));
	echo '</div>';
	echo $this->Form->end('submit');
	?>
</div>
