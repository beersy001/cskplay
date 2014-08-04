<?php
	echo $this->Session->flash(); 
	echo '<script>var date = "' . date('Ym') . '"</script>';

	$this->Html->script( "registrationValidation", array("inline"=>false));
	$this->Html->script( "slideShow", array("inline"=>false));
?>

<div class="grid" id="main_grid">
	<div class="onerow background_container margin_bottom">
		<div class="col5 form_container">
			<h2 class="border_bottom">register with us...</h2>
			<br>
	<!--			
			<form action="<?=$this->Html->url(array('action' =>'add'))?>" id="UserAddForm" method="post" accept-charset="utf-8" onsubmit="return validateForm()">
				<div style="display:none;">
					<input type="hidden" name="_method" value="POST">
				</div>

				<div class="input_row">
					<label id="UserNameLabel" for="UserFirstName">name</label>
					<input name="data[User][firstName]" maxlength="2000" type="text" id="UserFirstName" class="helper--clearfix"  autofocus onChange="validateFirstName();">
					<input name="data[User][surname]" maxlength="2000" type="text" id="UserSurname" onChange="validateSurname();">
					<label id="UserFirstNameLabel" for="UserFirstName" class="tiny_text helper--clearfix">first name</label>
					<label id="UserSurnameLabel" for="UserSurname" class="tiny_text">last name</label>
					<div id="check_name" class="tiny_text"></div>
				</div>
				<div class="input_row">
					<label id="UserEmailAddressLabel" for="UserEmailAddress">email address</label>
					<input name="data[User][emailAddress]" maxlength="2000" type="text" id="UserEmailAddress" class="helper--clearfix wide_input" onChange="validateEmailAddress();" >
					<div id="check_email_address" class="tiny_text"></div>
				</div>
				
				<div class="input_row">
					<label id="UserUsernameLabel" for="UserUsername">username</label>
					<input name="data[User][username]" maxlength="2000" type="text" id="UserUsername" class="helper--clearfix wide_input" onChange="validateUsername();">
					<div id="check_username" class="tiny_text"></div>
				</div>

				<div class="input_row">
					<label id="UserPasswordLabel" for="UserPassword">password</label>
					<input name="data[User][password]" type="password" id="UserPassword" class="helper--clearfix" onChange="validatePassword();">
					<input name="data[User][passwordVerify]" maxlength="2000" type="password" id="UserPasswordVerify" onChange="validatePassword();" >
					<label id="UserPasswordOneLabel" for="UserPassword" class="tiny_text helper--clearfix">password</label>
					<label id="UserPasswordTwoLabel" for="UserPasswordVerify" class="tiny_text" >verify password</label>
					<div id="check_passwords_match" class="tiny_text"></div>
				</div>

				<div class="input_row">
					<label id="UserPhoneNumberLabel" for="UserPhoneNumberOne">telephone number</label>
					<input name="data[User][phoneNumberOne]" maxlength="2000" type="tel" id="UserPhoneNumberOne" class="helper--clearfix" onChange="validatePhoneNumber();" >
					<input name="data[User][phoneNumberTwo]" maxlength="2000" type="tel" id="UserPhoneNumberTwo">
					<label id="UserPhoneNumberOneLabel" for="UserPhoneNumberOne" class="tiny_text helper--clearfix">primary number</label>
					<label id="UserPhoneNumberTwoLabel" for="UserPhoneNumberTwo" class="tiny_text">secondary number (optional)</label>
					<div id="check_phone_number" class="tiny_text"></div>
				</div>

				<div class="input_row">
					<label id="UserDayOfBirthLabel" for="UserDayOfBirth">date of birth</label>
					<select name="data[User][dayOfBirth]" type="text" id="UserDayOfBirth" class="helper--clearfix dob_field" >
						<option value="01">01</option>
						<option value="02">02</option>
					</select>
					<select name="data[User][monthOfBirth]" type="text" id="UserMonthOfBirth" class="dob_field">
						<option value="01">January</option>
						<option value="02">February</option>
						<option value="03">March</option>
					</select>
					<select name="data[User][yearOfBirth]" type="text" id="UserYearOfBirth" class="dob_field">
						<option value="2013">2013</option>
						<option value="2012">2012</option>
						<option value="2011">2011</option>
						<option value="2010">2010</option>
						<option value="2009">2009</option>
					</select>



					<label id="UserDayOfBirthFormatLabel" for="UserDayOfBirth" class="tiny_text helper--clearfix dob_field">day</label>
					<label id="UserMonthOfBirthFormatLabel" for="UserMonthOfBirth" class="tiny_text dob_field">month</label>
					<label id="UserYearOfBirthFormatLabel" for="UserYearOfBirth" class="tiny_text dob_field">year</label>
					<div id="check_date_of_birth" class="tiny_text"></div>
				</div>


				<div class="input_row select">
					<label id="UserRegionLabel" for="UserRegion">region</label>
					<select name="data[User][region]"  id="UserRegion" class="helper--clearfix wide_input" onChange="validateRegion();">
						<optgroup label="England">
							<option value="north west england">North West</option>
							<option value="north east england">North East</option>
							<option value="midlands england">Midlands</option>
							<option value="south west england">South West</option>
							<option value="south east england">South East</option>
							<option value="london england">London</option>
						</optgroup>
						<optgroup label="Wales">
							<option value="north wales">North</option>
							<option value="east wales">East</option>
							<option value="west wales">West</option>
							<option value="south wales">South</option>
						</optgroup>
						<optgroup label="Northern Ireland">
							<option value="north northern ireland">North</option>
							<option value="east northern ireland">East</option>
							<option value="west northern ireland">West</option>
							<option value="south northern ireland">South</option>
						</optgroup>
						<optgroup label="Scotland">
							<option value="north scotland">North</option>
							<option value="east scotland">East</option>
							<option value="west scotland">West</option>
							<option value="south scotland">South</option>
						</optgroup>
					</select>
					<div id="check_region" class="tiny_text"></div>
				</div>
				<div class="submit">
					<input type="submit" value="Submit">
				</div>
			</form>
	-->

			<?php
				
				echo $this->Form->create('User', array(
					'controller'=>'Users',
					'action' => 'add',
					'inputDefaults' => array(
						'label' => false,
						'div' => false
						)
					));
				echo '<div class="input_row">';
				echo $this->Form->label('User.firstName', 'first name',array('class' => 'helper--clearfix'));
				echo $this->Form->label('User.surname', 'surname');
				echo $this->Form->input('firstName',array('class' => 'helper--clearfix small_input', 'onChange'=>'validateFirstName();'));
				echo $this->Form->input('surname',array('class' => 'small_input'));
				echo '<div id="check_name" class="input_row_validaion tiny_text"></div>';

				echo '</div>';

				echo '<div class="input_row">';
				echo $this->Form->label('User.username', 'username',array('class' => 'helper--clearfix'));
				echo $this->Form->label('User.emailAddress', 'email address');
				echo $this->Form->input('username',array('class' => 'helper--clearfix small_input'));
				echo $this->Form->input('emailAddress',array('class' => 'small_input'));
				echo '</div>';

				echo '<div class="input_row">';
				echo $this->Form->label('User.phoneNumberOne', '1st contact number',array('class' => 'helper--clearfix'));
				echo $this->Form->label('User.phoneNumberTwo', '2nd contact number');
				echo $this->Form->input('phoneNumberOne',array('class' => 'helper--clearfix small_input'));
				echo $this->Form->input('phoneNumberTwo',array('class' => 'small_input'));
				echo '</div>';

				echo '<div class="input_row">';
				echo $this->Form->label('User.password', 'password',array('class' => 'helper--clearfix'));
				echo $this->Form->label('User.passwordVerify', 'verify password');
				echo $this->Form->input('password',array('class' => 'helper--clearfix small_input','onchange' => 'validatePassword();'));
				echo $this->Form->input('passwordVerify', array('type'=>'password', 'class' => 'small_input'));
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
		<div class="col1"></div>

		<div class="col4 last form_container" id="login_page_form">
			<h2 class="border_bottom">...or login</h2>
			<br>

			<?php
					echo $this->Form->create('User', array('controller'=>'Users', 'action' => 'login'));
					echo '<div class="input_row">';

					echo $this->Form->input('username',array(
						'class' => 'helper--clearfix wide_input',
						'label' => array(
							'text' => 'username'
						)
					));
					echo '</div>';
					echo '<div class="input_row">';
					echo $this->Form->input('password',array(
						'class' => 'helper--clearfix wide_input',
						'label' => array(
							'text' => 'password'
						)
					));
					echo '</div>';
					echo $this->Form->end('submit');
				?>
				<br/><br/><br/>

			<?= $this->Html->image( 'facebook_login_image.png', array('id'=>'facebook_button', 'url' => $fb_login_url) );?>
			<!--
			<br>
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
		-->
		</div>
	</div>
</div>