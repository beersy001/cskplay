<!-- app/View/Users/add.ctp -->

<?php echo $this->Session->flash(); ?>

<h2>Add User</h2>

<div class="users form">
	<?php
		echo $this->Form->create('User'); 
		echo $this->Form->input('username');
		echo $this->Form->input('password');
		echo $this->Form->input('role', array('options' => array('admin' => 'Admin', 'user' => 'User')));
		echo $this->Form->end('Submit');
	?>
</div>
