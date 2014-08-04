<?php 
echo $this->Session->flash();
echo '<script>var date = "' . date('Ym') . '"</script>';
$this->Html->script( "slideShow", array("inline"=>false));
?>
<div class="grid" id="main_grid">
	<div class="onerow background_container">
		<div class="col5" >
			<h2 class="margin_bottom border_bottom">a few more details</h2>

			<p>In order for us to know how to get hold of you incase you win, we need a few details from you</p>

			<div class="form_container">
				<?php
			
					echo $this->Form->create('User', array(
						'controller'=>'Users',
						'action' => 'addDetails',
						'inputDefaults' => array(
							'label' => false,
							'div' => false
							)
						));
					echo '<div class="input_row">';
					echo $this->Form->label('User.phoneNumberOne', '1st contact number',array('class' => 'helper--clearfix'));
					echo $this->Form->label('User.phoneNumberTwo', '2nd contact number');
					echo $this->Form->input('phoneNumberOne',array('class' => 'helper--clearfix'));
					echo $this->Form->input('phoneNumberTwo');
					echo '</div>';

					echo '<div class="input_row date_of_birth">';
					echo $this->Form->label('User.dayOfBirth', 'date of birth',array('class' => 'helper--clearfix'));
					echo $this->Form->day('dayOfBirth', array('class'=>'helper--clearfix', 'empty' => 'day'));
					echo $this->Form->month('monthOfBirth', array('empty' => 'month'));
					echo $this->Form->year('yearOfBirth','2014','1901', array('empty' => 'year'));
					echo '</div>';

					echo '<div class="input_row">';
					echo $this->Form->label('User.region', 'region',array('class' => 'helper--clearfix'));
					echo $this->Form->input('region', array(
						'options' => array(
							'north east'=>'north east',
							'north west'=>'north west',
							'south east'=>'south east',
							'south west'=>'south west',
							'london'=>'london',
							'midlands'=>'midlands',
							'wales'=>'wales',
							'scotland'=>'scotland',
							'northern ireland'=>'northern ireland'
							),
						'class' => 'helper--clearfix'
						));
					echo '</div>';
					echo $this->Form->end('submit');
				?>
			</div>
		</div>
		<div class="col1">
		</div>

		<div class="col6">
			<div id="slideshow">
				<?= $this->Html->image( 'slideshow/image1.jpg', array('id'=>'slide1', 'class'=>'active') ) ?>
				<?= $this->Html->image( 'slideshow/image2.jpg', array('id'=>'slide2') ) ?>
				<?= $this->Html->image( 'slideshow/image3.jpg', array('id'=>'slide3') ) ?>
				<?= $this->Html->image( 'slideshow/image4.jpg', array('id'=>'slide4') ) ?>
				<?= $this->Html->image( 'slideshow/image5.jpg', array('id'=>'slide5') ) ?>
			</div>
		
			<script>
				$(function() {
					setInterval( "slideSwitch('slideshow')", 3500 );
				});
			</script>
		</div>

	</div>
</div>