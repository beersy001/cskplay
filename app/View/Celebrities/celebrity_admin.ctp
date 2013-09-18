


<div class="onerow">
	<div class="col6 alternate alternate_one">
		<h2>CSK Play - Celebrity Admin</h2>

		<?php echo $this->Session->flash(); ?>

		<?php
			echo $this->Form->create( array('controller'=>'Celebrities', 'action'=>'addCelebrity'));
			echo $this->Form->input('name');
			echo $this->Form->input('month');
			echo $this->Form->input('picture');
			echo $this->Form->input('text', array('type'=>'textarea'));
			echo $this->Form->submit('Submit');
			echo $this->Form->end();
		?>
	</div>

	<div class="col6 alternate alternate_two last">
		<?php
			foreach($celebrities as $celeb){
				echo $this->Form->create(array('controller'=>'Celebrities', 'action'=>'editCelebrity'));
				echo $this->Form->input('name',		array('value'=>$celeb['Celebrity']['name']));
				echo $this->Form->input('month',	array('value'=>$celeb['Celebrity']['month']));
				echo $this->Form->input('picture',	array('value'=>$celeb['Celebrity']['picture']));
				echo $this->Form->input('text',		array('type'=>'textarea', 'value'=>$celeb['Celebrity']['text']));
				echo $this->Form->submit('Edit',	array('value'=>'edit', 'name'=>'submitButton'));
				echo $this->Form->submit('Delete',	array('value'=>'delete', 'name'=>'submitButton'));
				echo $this->Form->end();
			}

		?>
	</div>
</div>