<!DOCTYPE html>
<html>
	<head>

		<script src="http://code.jquery.com/jquery-1.11.0-beta2.js"></script>
		<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
		<script>var rootDir = "<?=basename(dirname(APP));?>"</script>

		<link href='http://fonts.googleapis.com/css?family=Chivo:400,900' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Alegreya+Sans:100' rel='stylesheet' type='text/css'>

		<?php
			echo $this->Html->charset(); 
			echo $this->Html->meta('icon');
			echo $this->Html->css('style');
			echo $this->Html->css('jquery-ui-1.10.3.custom');
			echo $this->Html->script('countdown');
			echo $this->Html->script('changeActiveMenu');
			echo $this->Html->script('page');
			echo $this->Html->meta('icon', $this->Html->url('/favicon.ico'));
			echo $this->fetch('meta');
			echo $this->fetch('css');
			echo $this->fetch('script');
			echo $this->Js->writeBuffer(array('cache'=>FALSE));
		?>
		
		<title><?= $pageId ?></title>

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

		<div id="ajax_container"></div>

		<?= $this->element('header'); ?>

		<div class="body-wrapper">
			<?= $this->fetch('content'); ?>
			<?= $this->element('footer'); ?>
		</div>
	</body>
</html>