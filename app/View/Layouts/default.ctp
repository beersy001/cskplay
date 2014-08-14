<!DOCTYPE html>
<html>
	<head>
		<?php
			
		?>
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no"/>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

		<script src="http://code.jquery.com/jquery-1.11.0-beta2.js"></script>
		<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
		<script>var rootDir = "<?=basename(dirname(APP));?>"</script>

		<link href="http://fonts.googleapis.com/css?family=Chivo:400,900" rel="stylesheet" type="stylesheet">
		<link href="http://fonts.googleapis.com/css?family=Alegreya+Sans:100" rel="stylesheet" type="stylesheet">
		<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">

		<?php

			echo $this->Html->charset(); 
			echo $this->Html->meta('icon');
			echo $this->Html->css('style.min');
			echo $this->Html->css('jquery-ui-1.10.3.custom');
			echo $this->Html->script('mobile-detect.min');
			echo $this->Html->script('jquery.parallaxScroll');
			echo $this->Html->script('jquery.tubular');
			echo $this->Html->script('countdown');
			echo $this->Html->script('changeActiveMenu');
			echo $this->Html->script('smoothAnchorScrolling');
			echo $this->Html->meta('icon', $this->Html->url('/favicon.ico'));
			echo $this->fetch('meta');
			echo $this->fetch('css');
			echo $this->fetch('script');
			echo $this->Js->writeBuffer(array('cache'=>FALSE));



			
			echo $this->Html->script('page');
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