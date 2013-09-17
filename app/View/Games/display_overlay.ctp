<h1>Your Selection! - Loaded Overlay</h1>

<?php
	//if($this->Session->read('Auth.User.attemptsLeft') == 0){
	if($ballsRemaining == 0){
		echo "<p>Please purchase more Game Balls to play</p>";
	}else {
		
		echo $this->Form->create(array('action'=>'displayGame'));
		echo $this->Form->input('x',array('id'=>'x_input', 'readonly'));
		echo $this->Form->input('y',array('id'=>'y_input', 'readonly'));
		echo $this->Js->submit('Submit', array('id'=>'coord_submit', 'update'=> '#game_ball_bag'));
		echo $this->Form->end();
	}
?>

<br>
<br>
<p>Click here to try again</p>


