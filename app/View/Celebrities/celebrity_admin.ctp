<script>
	function toggleNewEntryForm(x){

		var display = document.getElementById(x).style.display;

		console.log(display);

		if(display == 'none' || display == ''){
			document.getElementById(x).style.display = "block";
		}else{
			document.getElementById(x).style.display = "none";
		}
	}
</script>


<div class="onerow">
	<div class="col2 alternate alternate_one">
		<input type="button" value="Enter New Celeb" onclick="toggleNewEntryForm('dim_new_entry')" />
	</div>

	<div id="all_celebs" class="col10 alternate alternate_two last">

		<div class="onerow">
			<div class="col2">
				<p>Name</p>
			</div>
			<div class="col2">
				<p>Month</p>
			</div>
			<div class="col2">
				<p>Picture</p>
			</div>
			<div class="col2">
				<p>Text</p>
			</div>
			<div class="col2">
				<p>Edit</p>
			</div>
			<div class="col2 last">
				<p>Delete</p>
			</div>
		</div>
		


		<?php foreach($celebrities as $celeb){ 
			$celebText = $celeb

		?>
			<form>
				<input name="data[Celebrity][name]" value=<?=$celeb['Celebrity']['name'] ?> type="text">
				<input name="data[Celebrity][month]" value=<?=$celeb['Celebrity']['month'] ?> type="text">
				<input name="data[Celebrity][picture]" value=<?=$celeb['Celebrity']['picture'] ?> type="text">
				<input name="data[Celebrity][text]" value=<?= $celeb['Celebrity']['text'] ?> type="text">
				<input name="submitButton" value="Edit" type="submit">
				<input name="submitButton" value="Delete" type="submit">
			</form>
		<?php
		print_r($celeb['Celebrity']['text']);

		 } ?>

		<?php
		/*
			foreach($celebrities as $celeb){
				echo $this->Form->create(array('controller'=>'Celebrities', 'action'=>'editCelebrity'));
				echo $this->Form->input('name',		array('value'=>$celeb['Celebrity']['name']));
				echo $this->Form->input('month',	array('value'=>$celeb['Celebrity']['month']));
				echo $this->Form->input('picture',	array('value'=>$celeb['Celebrity']['picture']));
				echo $this->Form->input('text',		array('type'=>'textarea', 'value'=>$celeb['Celebrity']['text']));
				echo $this->Form->submit('Edit',	array('class'=>'submitButton', 'value'=>'edit', 'name'=>'submitButton'));
				echo $this->Form->submit('Delete',	array('class'=>'submitButton', 'value'=>'delete', 'name'=>'submitButton'));
				echo $this->Form->end();
			}
		*/
		?>
	</div>
</div>

<div id="dim_new_entry" class="dim">
	<div id="new_entry">
		<?php echo $this->Session->flash(); ?>

		<?php
			echo $this->Form->create();
			echo $this->Form->input('name');
			echo $this->Form->input('month');
			echo $this->Form->input('picture');
			echo $this->Form->input('text', array('type'=>'textarea'));
			echo $this->Js->submit('Submit',array('update'=>'#all_celebs'));
			echo $this->Form->end();
		?>

		<input type="button" value="Close" onclick="toggleNewEntryForm('dim_new_entry')" />
	</div>
</div>