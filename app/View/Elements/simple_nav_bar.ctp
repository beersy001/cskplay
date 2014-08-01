<ul class="nav-warpper__nar-bar">
	<li class="nav-bar__link-wrapper" id="pages_menu_item">
		<?= $this->Html->link('about us',array('controller' => 'pages', 'action' => 'csk'), array('class' => 'link-wrapper__link')); ?>
	</li>

	<li class="nav-bar__link-wrapper" id="celebrities_menu_item">
		<?=$this->Html->link('celebrities',array('controller' => 'celebrities', 'action' => 'viewAll'), array('class' => 'link-wrapper__link'));?>
	</li>

	<li class="nav-bar__link-wrapper" id="charities_menu_item">
		<?=$this->Html->link('charities',array('controller' => 'charities', 'action' => 'viewAll'), array('class' => 'link-wrapper__link'));?>
	</li>

	<li class="nav-bar__link-wrapper" id="partners_menu_item">
		<?=$this->Html->link('partners',array('controller' => 'partners', 'action' => 'viewAll'), array('class' => 'link-wrapper__link'));?>
	</li>

	<li class="nav-bar__link-wrapper" id="play_menu_item">
		<?=$this->Html->link('play',array('controller' => 'games', 'action' => 'displayGame'), array('class' => 'link-wrapper__link')); ?>
	</li>

	<?php
	if($authUser['role'] == 'superuser' || $authUser['role'] == 'admin'){
	?>
		<li class="nav-bar__link-wrapper" id="admin_menu_item">
			<?=$this->Html->link('admin screen',array('controller' => 'users', 'action' => 'admin'), array('class' => 'link-wrapper__link'));?>
		</li>
	<?php
	}
	?>
</ul>