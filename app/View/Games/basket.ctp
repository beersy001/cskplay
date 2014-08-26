<div class="grid" id="main_grid">

	<div class="onerow scene__element scene__element--fadeinup">
		<div class="col6">
			<h1>Your Basket</h1>
			<p>1. check your gameballs</p>
			<p>2. complete your gameballs by paying with PayPal or entering a promotional code</p>
			
			<div class="payment-details-wrapper helper--clearfix">
				<div class="table-wrapper payment-details-wrapper__gameballs-wrapper">
					<table>
						<thead>
							<tr>
								<th scope="col">#</th>
								<th scope="col">x</th>
								<th scope="col">y</th>
								<th scope="col">cost</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$i = 1;
							foreach ($this->Session->read( 'selections' ) as $key => $gameball) {
								echo '<tr>';
								echo '<td scope="row">' . $i . '</td>';
								echo '<td>' . $gameball['x'] . '</td>';
								echo '<td>' . $gameball['y'] . '</td>';
								echo '<td>' . $gameball['price']. '</td>';
								echo '</tr>';

								$i++;
							}
							?>
						</tbody>
					</table>
				</div>

				<div class="payment-details-wrapper__paypal-wrapper">
					<h2>total to pay: <span class="paypal-wrapper__price">£<?=$this->Session->read( 'totalPrice' )?></span></h2>
					<img class="paypal-wrapper__paypal-btn" src="https://www.paypalobjects.com/en_GB/i/btn/btn_paynow_LG.gif">
				</div>				
			</div>
		</div>

		<div class="col4 last">
			<h1>Pay With PayPal</h1>
			
			<?= $this->Form->create('GameBalls', array(
				'action' => 'saveSelection',
				'inputDefaults' => array(
					'label' => false,
					'div' => false
				)
			)); ?>
				<ul>
					<li>
						<?= $this->Form->label('User.firstName', 'promo code'); ?>
						<?= $this->Form->input('code'); ?>
					</li>
					<li>
						<?= $this->Form->input('submit promo code',array('type' => 'submit', 'class' => 'cta')); ?>
					</li>
				</ul>
			<?= $this->Form->end();	?>

			<?= $this->Session->flash(); ?>
		</div>
	</div>
</div>
