<script type="text/javascript">
	var el=document.getElementById("container");
	el.style.background = "url('/cskplay/app/webroot/img/backdrop_dark.png')";
	el.style.backgroundPosition = "center 70%";
	el.style.backgroundRepeat = "no-repeat"; 
	el.style.backgroundAttachment = "fixed";
	el.style.backgroundSize = "cover";
</script>


<div class="onerow">

		<h1 id="contact_us_heading">Contact Us</h1>
	<div class="col12">

		<?php
			echo $this->Form->create(array('url'=>'#', 'id'=>'contact_us_form'));
			echo $this->Form->input('name',			array());
			echo $this->Form->input('emailAddress',	array());
			echo $this->Form->input('message',		array('type'=>'textarea'));
			echo $this->Form->submit('Send Message',array('class'=>'submitButton', 'value'=>'edit', 'name'=>'submitButton'));
			echo $this->Form->end();

		?>
	</div>
	
</div>

