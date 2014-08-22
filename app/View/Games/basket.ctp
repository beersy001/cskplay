<div class="grid" id="main_grid">

	<div class="onerow scene__element scene__element--fadeinup">
		<div class="col12">
			<h1 class="border_bottom">Your Basket</h1>
			<p>1. check your gameballs</p>
			<p>2. complete your gameballs by paying with PayPal or entering a promotional code</p>

		</div>
	</div>

	<div class="onerow alt-background scene__element scene__element--fadeinup">
		<div class="col12">
			<table>
				<th>#</th>
				<th>x</th>
				<th>y</th>
				<?php
				$i = 1;
				foreach ($this->Session->read( 'selections' ) as $key => $gameball) {
					echo '<tr>';
					echo '<td>' . $i . '</td>';
					echo '<td>' . $gameball['x'] . '</td>';
					echo '<td>' . $gameball['y'] . '</td>';
					echo '</tr>';

					$i++;
				}
				?>

			</table>
		</div>
	</div>

	<div class="onerow">
		<div class="col3">
			<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top" id="pay_pal_form">
				<input type="hidden" name="cmd" value="_s-xclick">
				<input type="hidden" name="hosted_button_id" value="FRT9UD9L6LSZ8">
				<input type="image" src="https://www.paypalobjects.com/en_GB/i/btn/btn_paynow_LG.gif" border="0" name="submit" alt="PayPal – The safer, easier way to pay online.">
				<img alt="" border="0" src="https://www.paypalobjects.com/en_GB/i/scr/pixel.gif" width="1" height="1">
			</form>
		</div>

		<div class="col3">
			<div class="form_container">
				<?php
				echo $this->Form->create('GameBalls', array('action' => 'saveSelection'));
				echo '<div class="input_row">';
				echo $this->Form->input('code',array(
					'class' => 'helper--clearfix wide_input ',
					'label' => array( 'text' => 'promo code' )
				));
				echo '</div>';
				echo $this->Form->end('submit');
				?>
				<?php echo $this->Session->flash(); ?>
			</div>
		</div>
	</div>

</div>
