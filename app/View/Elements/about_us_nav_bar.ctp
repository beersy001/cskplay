<ul id="about_us_nav_bar">
	<li id="about" class="">
		<?=$this->Html->link('Celebrity Spot Kick',array('controller' => 'pages', 'action' => 'csk'));?>
	</li>

	<li id="about" class="">
		<?=$this->Html->link('about us',array('controller' => 'pages', 'action' => 'aboutus/about_us'));?>
	</li>

	<li id="">
		<?=$this->Html->link('giving',array('controller' => 'pages', 'action' => 'aboutus/giving'));?>
		<!--
		<ul>
			<li><?=$this->Html->link('celebrities',array('controller' => 'games', 'action' => 'displayGame')); ?></li>
			<li><?=$this->Html->link('foundation',array('controller' => 'games', 'action' => 'displayDemo')); ?></li>
		</ul>
		-->
	</li>

	<li id="">
		<?=$this->Html->link('sports for children',array('controller' => 'pages', 'action' => 'aboutus/sports_for_children'));?>
	</li>

	<li id="">
		<?=$this->Html->link('prizes',array('controller' => 'pages', 'action' => 'aboutus/prizes'));?>
	</li>

	<li id="">
		<?=$this->Html->link('partners',array('controller' => 'partners', 'action' => 'viewAll'));?>
	</li>

	<li id="">
		<?=$this->Html->link('contact us',array('controller' => 'pages', 'action' => 'aboutus/contact_us'), array('class' => 'small_link'));?>
	</li>


</ul>