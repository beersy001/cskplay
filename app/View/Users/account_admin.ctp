<?php
App::uses('Debugger', 'Utility');

$this->Html->script( "moveUserSelections", array("inline"=>false));
$this->Html->script( "gamePlay", array("inline"=>false));

$endedBool = (isset($selections['ended']) && $selections['ended'] == true) ? true : false ;
?>

<script>
	$(document).ready(function() {
		var originalFontSize = 16;
		var sectionWidth = $('.adaptive_text').width();

		$('.adaptive_text a').each(function(){
			var spanWidth = $(this).width();
			var newFontSize = (sectionWidth/spanWidth) * originalFontSize;
			$(this).css({"font-size" : newFontSize, "line-height" : newFontSize/1.2 + "px"});
		});
	});
</script>

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
	<div id="edit_user_container">
		<?= $this->Html->image( 'quickLinks/pencil_white.png', array('class'=>'user_title_image', 'align'=>'left') ) ?>
		<p id="cancel_edit_details_button" class="mock_link">back to my account</a>
		<h2 class="large_indent border_bottom margin_bottom">edit your details</h2>
		<div class="large_indent form_container">
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

				echo '<div class="input_row">';
				echo $this->Form->label('User.firstName', 'first name',array('class' => 'helper--clearfix'));
				echo $this->Form->label('User.surname', 'surname');
				echo $this->Form->input('firstName',array('class' => 'helper--clearfix small_input', 'onChange'=>'validateFirstName();'));
				echo $this->Form->input('surname',array('class' => 'small_input'));
				echo '<div id="check_name" class="input_row_validaion tiny_text"></div>';

				echo '</div>';

				echo '<div class="input_row">';
				echo $this->Form->label('User.emailAddress', 'email address');
				echo $this->Form->input('emailAddress',array('class' => 'helper--clearfix medium_input'));
				echo '</div>';

				echo '<div class="input_row">';
				echo $this->Form->label('User.phoneNumberOne', '1st contact number',array('class' => 'helper--clearfix'));
				echo $this->Form->label('User.phoneNumberTwo', '2nd contact number');
				echo $this->Form->input('phoneNumberOne',array('class' => 'helper--clearfix small_input'));
				echo $this->Form->input('phoneNumberTwo',array('class' => 'small_input'));
				echo '</div>';

				echo $this->Form->end('submit');
			?>
		</div>

	</div>
</div>

<div class="grid" id="main_grid">

	<div class="onerow background_container" id="my_account_container">

		<div class="col6">
			<p id="edit_details_button" class="mock_link tiny_text">edit</p>
			<?= $this->Html->image( 'user_white.png', array('class'=>'user_title_image', 'align'=>'left') ) ?>
			<h2 class="large_indent">my details</h2>
			<div class="large_indent text_info">
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

		<div class="col6 last">
			<?= $this->Html->image( 'user_white.png', array('class'=>'user_title_image', 'align'=>'left') ) ?>
			<h2 class="large_indent">purchase gameballs</h2>
			<div class="large_indent">
				<?= $this->element('paypal'); ?>
			</div>
		</div>

	</div>

	<div class="onerow background_container <?php if (sizeof($distinctMonths) <= 0) { echo 'margin_bottom'; } ?>">

		<div class="col4">
			<?= $this->Html->image( 'team_white.png', array('class'=>'team_title_image', 'align'=>'left') ) ?>
			<h2 class="large_indent">create a team</h2>
			<div class="large_indent form_container">
				<?php
					echo $this->Form->create('Team', array(
						'controller'=>'Teams',
						'action' => 'createTeam',
						'inputDefaults' => array(
							'label' => false,
							'div' => false
							)
						));
					echo '<div class="input_row">';
					echo $this->Form->label('Team.name', 'team name',array('class' => 'tiny_text'));
					echo $this->Form->input('Team.name',array('class' => 'wide_input'));
					echo '</div>';
					echo $this->Form->end('submit');
				?>
			</div>
		</div>	

		<div class="col4">
			<?= $this->Html->image( 'team_white.png', array('class'=>'title_image team_title_image', 'align'=>'left') ) ?>
			<h2 class="large_indent">join a team</h2>
			<div class="large_indent form_container">
				<?php echo $this->Session->flash('joinTeam'); ?>

				<?php
					echo $this->Form->create('User', array(
						'controller'=>'Users',
						'action' => 'joinTeam',
						'inputDefaults' => array(
							'label' => false,
							'div' => false
							)
						));
					echo '<div class="input_row">';
					echo $this->Form->label('Team.name', 'team name',array('class' => 'helper--clearfix tiny_text'));
					echo $this->Form->input('Team.name',array('class' => 'wide_input helper--clearfix'));
					echo '</div>';
					echo '<div class="input_row">';
					echo $this->Form->label('Team.pinNumber', 'team pin number',array('class' => 'tiny_text'));
					echo $this->Form->input('Team.pinNumber',array('class' => 'wide_input', 'type' => 'number'));
					echo '</div>';
					echo $this->Form->end('submit');
				?>
			</div>
		</div>
			
		<div class="col4 last">
			<?= $this->Html->image( 'team_white.png', array('class'=>'title_image team_title_image', 'align'=>'left') ) ?>
			<h2 class="large_indent">my teams</h2>	
			<div class="large_indent">
				<?php
				if(isset($currentUser['User']['teams'])){
					foreach ($currentUser['User']['teams'] as $teamName => $teamDetails) {

						echo '<p>';
						echo $this->Html->link($teamName,array('controller'=>'teams', 'action'=>'viewTeam', 'id'=>$teamDetails['id']));
						echo '</p>';
						if(sizeof($currentUser['User']['teams']) > 1 ){	
						}
					}
				}else{
					echo '<p class="tiny_text">you are not currently in a team. <a href="#teamName">create</a> or <a href="#joinTeamName">join</a> a team</p>';
				}
				?>
			</div>
		</div>
	</div>

	<?php
	if (sizeof($distinctMonths) > 0) {
	?>

	<div class="onerow background_container margin_bottom">
		<div class="col7">
			<?= $this->Html->image( 'user_white.png', array('class'=>'title_image user_title_image', 'align'=>'left') ) ?>
			<h2 class="large_indent">my game history</h2>
			<div class="large_indent">
				<?= $this->element('gameballs/months_played'); ?>
			</div>
		</div>

		<div class="col5 last">
			<div class="adaptive_text">

				<?=$this->Html->link('play',array('controller'=>'games', 'action'=>'displayGame'), array('class'=>'no_decoration'))?>
			</div>
		</div>
	</div>
	<?php
	}
	?>
</div>

<?= $this->element('quick_links'); ?>