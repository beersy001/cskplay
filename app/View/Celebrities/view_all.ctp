<div class="onerow">
	<div id="headshots">
		<div class="headshot"></div>
		<?php foreach($celebrities as $celeb){
			$imageName = $celeb['Celebrity']['firstName'] . $celeb['Celebrity']['surname'] . '_headshot.jpg';
			echo $this->Html->image( $imageName, array('class' => 'floating_image border') );
		}
		?>
	</div>
</div>