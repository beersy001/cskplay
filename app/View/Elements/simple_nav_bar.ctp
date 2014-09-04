<div class="[ nav-wrapper__inner-wrapper ]">
	<ul>
		<i class="nav-bar__close-btn fa fa-times fa-3x helper--mobile-only-inline helper--font-color"></i>

		<li class="nav-bar__link-wrapper helper--mobile-only" id="home_menu_item">
			<?=$this->Html->link('home',array('controller' => 'pages', 'action' => 'home'), array('class' => 'link-wrapper__link')); ?>
		</li>

		<li id="pages_menu_item">
			<?= $this->Html->link('about csk',array('controller' => 'pages', 'action' => 'csk'), array('class' => 'link-wrapper__link')); ?>
		</li>

		<li  id="celebrities_menu_item">
			<?=$this->Html->link('celebrities',array('controller' => 'celebrities', 'action' => 'viewAll'), array('class' => 'link-wrapper__link'));?>
		</li>

		<li id="partners_menu_item">
			<?=$this->Html->link('partners',array('controller' => 'partners', 'action' => 'viewAll'), array('class' => 'link-wrapper__link'));?>
		</li>

		<li id="play_menu_item">
			<?=$this->Html->link('play',array('controller' => 'games', 'action' => 'displayGame'), array('class' => 'link-wrapper__link')); ?>
		</li>

		<li class="helper--mobile-only" id="login_menu_item">
			<?=$this->Html->link('login',array('controller' => 'users', 'action' => 'login'), array('class' => 'link-wrapper__link')); ?>
		</li>

		<li class="helper--mobile-only" id="register_menu_item">
			<?=$this->Html->link('register',array('controller' => 'users', 'action' => 'add'), array('class' => 'link-wrapper__link')); ?>
		</li>

		<?php
		if($authUser['role'] == 'superuser' || $authUser['role'] == 'admin'){
		?>
			<li  id="admin_menu_item">
				<?=$this->Html->link('admin screen',array('controller' => 'users', 'action' => 'admin'), array('class' => 'link-wrapper__link'));?>
			</li>
		<?php
		}
		?>
	</ul>
</div>