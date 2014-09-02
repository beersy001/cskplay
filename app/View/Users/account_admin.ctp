<?php
App::uses('Debugger', 'Utility');

$this->Html->script( "moveUserSelections", array("inline"=>false));
$this->Html->script( "gamePlay", array("inline"=>false));

$endedBool = (isset($selections['ended']) && $selections['ended'] == true) ? true : false ;
?>

<script>
	$(document).ready(function() {

		$("#edit_details_button").click( function(event) {		
			$(".full_overlay").css("left","0px");
		});

		$("#cancel_edit_details_button").click( function(event) {	
			$(".full_overlay").css("left","-9999px");
		});
	});
</script>


<div class="full_overlay" id="edit_user_overlay">
	<div>
		<h2>edit your details</h2>
		<div class="form_container">
			<?php
				echo $this->Form->create('User', array(
					'controller'=>'Users',
					'action' => 'edit',
					'inputDefaults' => array(
						'label' => false,
						'div' => false
						)
					));

				echo $this->Form->input('id', array(
					'type' => 'hidden',
					'value' => AuthComponent::user('id')
				));


				echo $this->Form->label('User.firstName', 'first name');
				echo $this->Form->input('firstName');
				
				echo $this->Form->label('User.surname', 'surname');
				echo $this->Form->input('surname');

				echo $this->Form->label('User.emailAddress', 'email address');
				echo $this->Form->input('emailAddress');

				echo $this->Form->label('User.phoneNumberOne', '1st contact number');
				echo $this->Form->input('phoneNumberOne');


				echo $this->Form->end('submit');
			?>
		</div>

	</div>
</div>

<div class="grid" id="main_grid">

	<div class="[ onerow ]  [ scene__element  scene__element--fadeinup ]" id="my_account_container">

		<div class="col6">
			<p class="mock_link">edit</p>
			<h2>my details</h2>
			<div class="text_info">
				<?php
					$completeProfile = $this->Session->read('Auth.User.completeProfile');
					$username = $this->Session->read('Auth.User.username');
					$firstName = $this->Session->read('Auth.User.firstName');
					$surname = $this->Session->read('Auth.User.surname');
					$emailAddress = $this->Session->read('Auth.User.emailAddress');
					$phoneNumberOne = $this->Session->read('Auth.User.phoneNumberOne');
					$phoneNumberTwo = $this->Session->read('Auth.User.phoneNumberTwo');
					$region = $this->Session->read('Auth.User.region');
					$dateOfBirth = $this->Session->read('Auth.User.dateOfBirth');

					if(isset($username)){
						echo '<p>username <span class="large_text">' . $username . '</span></p>';
					}

					if(isset($firstName)){
						echo '<p>name <span class="large_text">' . $firstName . ' ' . $surname . '</span></p>';
					}

					if(isset($emailAddress)){
						echo '<p>email <span class="large_text">' . $emailAddress . '</span></p>';
					}

					if(isset($dateOfBirth)){
						echo '<p>date of birth <span class="large_text">' . $dateOfBirth . '</span></p>';
					}

					if(isset($phoneNumberOne)){
						echo '<p>phone number <span class="large_text">' . $phoneNumberOne . '</span></p>';
					}

					if(!empty($phoneNumberTwo)){
						echo '<p>phone number <span class="large_text">' . $phoneNumberTwo . '</span></p>';
					}

					if(isset($region)){
						echo '<p>region <span class="large_text">' . $region . '</span></p>';
					}

					echo '<p>gameballs remaining <span class="large_text">'. $currentUser['User']['gameBallsLeft'] .'</span></p>';

					if(!$completeProfile){
					}
				?>
				<?php echo $this->Form->create('User'); ?>

			</div>
		</div>
	</div>

	<?php
	if (sizeof($distinctMonths) > 0) {
	?>
		<div class="[ onerow ]  [ alt-background ]  [ scene__element  scene__element--fadeinup ]">
			<div class="col12">
				<?=$this->element('gameballs/months_played');?>
			</div>
		</div>
	<?php
	}
	?>
</div>