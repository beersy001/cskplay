<?php
App::uses('Debugger', 'Utility');
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
		<div class="[ col9 ]">
			<h1>Your Account</h1>
			<h2 class="[ helper--highlight-text ]">edit your details and view your Gameballs</h2>
		</div>

		<div class="[ col3  last ]">
			<a class="[ cta  cta--100pc  cta--highlight ]" href="<?=$this->Html->url(array('controller'=>'games', 'action'=>'displayGame'))?>">Play Now!</a>
		</div>
	</div>



	<div class="[ onerow ]  [ scene__element  scene__element--fadeinup ]  [ alt-background ]" id="my_account_container">

		<div class="col9">
			<h2>your details</h2>
			<div class="text_info">
				<?php
					$completeProfile = $this->Session->read('Auth.User.completeProfile');
					$username = $this->Session->read('Auth.User.username');
					$firstName = $this->Session->read('Auth.User.firstName');
					$surname = $this->Session->read('Auth.User.surname');
					$emailAddress = $this->Session->read('Auth.User.emailAddress');
					$contactNumber = $this->Session->read('Auth.User.contactNumber');
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

					if(isset($contactNumber)){
						echo '<p>phone number <span class="large_text">' . $contactNumber . '</span></p>';
					}

					if(isset($region)){
						echo '<p>region <span class="large_text">' . $region . '</span></p>';
					}

					if(!$completeProfile){
					}
				?>
				<?php echo $this->Form->create('User'); ?>

			</div>
		</div>

		<div class="[ col3  last ]  [ cta-wrapper ]">
			<a class="[ cta  cta--100pc ]" href="<?=$this->Html->url(array('controller'=>'users', 'action'=>'edit'))?>">edit details</a>
			<a class="[ cta  cta--100pc ]" href="<?=$this->Html->url(array('controller'=>'users', 'action'=>'editPassword'))?>">change your password</a>
		</div>
	</div>

		<div class="[ onerow ]  [ scene__element  scene__element--fadeinup ]">
			<div class="col12">
				<?php
				if (sizeof($usersPreviousGames) > 0) {
					echo $this->element('gameballs/months_played');
				}else{ ?>
					<h2>your Gameballs</h2>
					<p>you havn't played any Gameballs yet.</p>
					<a class="[ cta  cta--300px  cta--highlight ]" href="<?=$this->Html->url(array('controller'=>'games', 'action'=>'displayGame'))?>">Play Now!</a>
				<?php
				}
				?>
			</div>
		</div>

</div>