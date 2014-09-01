<!DOCTYPE html>
<html>
	<head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <meta name="viewport" content="width=device-width" />

		<script src="http://code.jquery.com/jquery-1.11.0-beta2.js"></script>
		<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
		<script>var rootDir = "<?=basename(dirname(APP));?>"</script>

		<link href="http://fonts.googleapis.com/css?family=Chivo:400,900" rel="stylesheet" type="stylesheet">
		<link href="http://fonts.googleapis.com/css?family=Alegreya+Sans:100" rel="stylesheet" type="stylesheet">
		<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

		<?php
			echo $this->Html->charset(); 
			echo $this->Html->meta('icon');
			echo $this->Html->css('style.min');
			echo $this->Html->css('jquery-ui-1.10.3.custom');
			echo $this->Html->script('modernizr');
			echo $this->Html->script('mobile-detect.min');
			echo $this->Html->script('jquery.parallaxScorll');
			echo $this->Html->script('jquery.tubular');
			echo $this->Html->script('jquery.toggleDiv');
			echo $this->Html->script('jquery.smoothState');
			echo $this->Html->script('jquery.stickyMenu');
			echo $this->Html->script('countdown');
			echo $this->Html->script('gamePlay');
			echo $this->Html->script('cameraFlashes');
			echo $this->Html->script('changeActiveMenu');
			echo $this->Html->script('scrollingAnimation');
			echo $this->Html->meta('icon', $this->Html->url('/favicon.ico'));
			echo $this->fetch('meta');
			echo $this->fetch('css');
			echo $this->fetch('script');
			echo $this->Js->writeBuffer(array('cache'=>FALSE));

			echo $this->Html->script('page');
		?>
		
		<title><?= $title_for_page ?></title>
	</head>
	<body id="main" class="scene">
		<div id="fb-root"></div>
		<script>
			(function(d, s, id) {
				var js, fjs = d.getElementsByTagName(s)[0];
				if (d.getElementById(id)) return;
				js = d.createElement(s); js.id = id;
				js.src = "//connect.facebook.net/en_US/sdk.js";
				fjs.parentNode.insertBefore(js, fjs);
			}(document, 'script', 'facebook-jssdk'));
		</script>

		

		<div class="content-wrapper">
			<?= $this->element('header'); ?>
			<?= $this->fetch('content'); ?>
			<?= $this->element('footer'); ?>
		</div>
	</body>
</html>