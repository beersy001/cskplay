<div class="call-to-action">
	<h1>about csk</h1>
	<?= $this->Html->image( 'logo_orange.png' ); ?>
	<p>find out more about csk and what we are trying to achive in our about us pages</p>
	<?=$this->Html->link('more info',array('controller' => 'pages', 'action' => 'aboutus/about_us'), array( 'class' => 'cta cta--100pc'));?>
</div>