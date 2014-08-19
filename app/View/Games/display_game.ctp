<?php
$this->Html->script( 'gamePlay', array('inline'=>false));
//$this->Html->script( 'ajaxGetSelections', array('inline'=>false));
?>

<div class="grid">
	<div id="loupe" oncontextmenu="toggleLoupe();return false;">
		<?= $this->element('game/game_loupe'); ?>
	</div>

	<div class="onerow">
		<div class="col4">
			<p class="helper--round-number">1</p>
			<p class="helper--center-align">Click an area in the photo where you think the ball is</p>
		</div>
		<div class="col4">
			<p class="helper--round-number">2</p>
			<p class="helper--center-align">Then click inside the magnifying glass to pinpoint your selection</p>
		</div>
		<div class="col4 last">
			<p class="helper--round-number">3</p>
			<p class="helper--center-align">Click again to choose more than one location then submit</p>
		</div>

	</div>

	<div class="onerow alt-background">
		<?php /*
		<div id="game_video_container">
			<div id="game_video_inner">
				<div id="player"></div>
				<span id="hide_game_video" onclick="toggleVideoPlayer()">hide video</span>
			</div>
		</div>
		*/ ?>

		<div class="col4">
			<h1>Your Gameballs</h1>
			<?= $this->element('game/game_sidebar'); ?>
		</div>

		<div class="col8 last">
			<h1><?= $currentCompetition["Game"]["celebFirstName"] . " " . $currentCompetition["Game"]["celebSurname"] . " - " . $currentCompetition["Game"]["sport"] ?></h1>
			<?= $this->element('game/game_images'); ?>
		</div>
	</div>

	<div class="onerow">
		<div class="col3">
			<?= $this->element('blocks/find_out_more_giving'); ?>
		</div>

		<div class="col3">
			<?= $this->element('blocks/find_out_more_celebrities'); ?>
		</div>

		<div class="col3">
			<?= $this->element('blocks/find_out_more_prizes'); ?>
		</div>

		<div class="col3 last">
			<?= $this->element('blocks/find_out_more_about_us'); ?>
		</div>
	</div>

	<?php /*
	<div class="col12">
		<!-- 1. The <iframe> (and video player) will replace this <div> tag. -->
		<script>
			// 2. This code loads the IFrame Player API code asynchronously.
			var tag = document.createElement('script');

			tag.src = "https://www.youtube.com/iframe_api";
			var firstScriptTag = document.getElementsByTagName('script')[0];
			firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

		  // 3. This function creates an <iframe> (and YouTube player)
		  //    after the API code downloads.
			var player;
			function onYouTubeIframeAPIReady() {
				player = new YT.Player('player', {

					width: '740',
					height: '413',
					videoId: '<?=$competition["Game"]["videoId"]?>',
					playerVars: {
						'autoplay': 1,
						'controls': 0,
						'showinfo' : 0,
						'rel' : 0
						
					},
					events: {
						'onStateChange': onPlayerStateChange
					}
				});
			}
		  // 5. The API calls this function when the player's state changes.
		  //    The function indicates that when playing a video (state=1),
		  //    the player should play for six seconds and then stop.

			function onPlayerStateChange(event) {
				if (event.data === 0) {
					console.log("finished!");
					playMode = true;
					$("#game_video_container").css('left', '-1500px');
				}
			}

			function toggleVideoPlayer(){
				if( $("#game_video_container").css('left') == '-1500px')  {
					$("#game_video_container").css('left', '0px');
				} else {
					$("#game_video_container").css('left', '-1500px');
				}
			}

		</script>
	</div>
	*/?>
</div>