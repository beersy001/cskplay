<!-- app/View/Users/add.ctp -->

<?php echo $this->Session->flash(); ?>


<div class="onerow">
	<div class="col12 alternate_one" >
		<h2>Add User</h2>
		<div class="users form">
			<?php
				echo $this->Form->create('User');
				echo $this->Form->input('fullName');
				echo $this->Form->input('emailAddress');
				echo $this->Form->input('username');
				echo $this->Form->input('password');
				echo $this->Form->input('passwordVerify');
				echo $this->Form->end('Submit');
			?>
		</div>
	</div>
</div>