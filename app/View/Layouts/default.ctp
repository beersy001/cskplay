<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

?>

<!DOCTYPE html>
<html>
	<head>

		<link href='http://fonts.googleapis.com/css?family=Chivo:400,900' rel='stylesheet' type='text/css'>
		<?php
			echo $this->Html->charset(); 
			echo $this->Html->meta('icon');
			echo $this->Html->css('cake.generic');
			echo $this->Html->css('grid_layout');
			echo $this->Html->css('style');
			echo $this->Html->script('jquery');
			echo $this->Html->script('countdown');
			echo $this->Html->script('page');
			echo $this->fetch('meta');
			echo $this->fetch('css');
			echo $this->fetch('script');
			echo $this->Js->writeBuffer(array('cache'=>FALSE));
			echo $scripts_for_layout;
		?>

		<title><?= $pageId ?></title>
		
		<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
		<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>


	</head>
	<body>
		<div id="fb-root"></div>
		<script>
			(function(d, s, id) {
				var js, fjs = d.getElementsByTagName(s)[0];
				if (d.getElementById(id)) return;
				js = d.createElement(s); js.id = id;
				js.src = "//connect.facebook.net/en_GB/all.js#xfbml=1&appId=503746699700838";
				fjs.parentNode.insertBefore(js, fjs);
			}(document, 'script', 'facebook-jssdk')
			);
		</script>
		
		<?= $this->element('header'); ?>
		<div id="container">
			<div class="grid" id="main_grid">

				<?php echo $this->Session->flash(); ?>
				<?php echo $this->fetch('content'); ?>

			</div>
			<?= $this->element('footer'); ?>
		</div>
	</body>
</html>