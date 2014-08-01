<?php
$this->Html->script( 'gamePlay', array('inline'=>false));
$this->Html->script( 'ajaxGetSelections', array('inline'=>false));
$this->Html->script( 'moveUserSelections', array('inline'=>false));
?>
<div class="grid" id="game_grid">
	<div id="loupe" oncontextmenu="toggleLoupe();return false;">
		<?= $this->element('game/game_loupe'); ?>
	</div>

	<div class="game_instructions">
		<div class="onerow background_container margin_bottom">
			<div class="col4">
				<p class="round_number">1</p>
				<p class="centered_instruction">Click on an area in the photo where you think the ball is!!</p>
			</div>
			<div class="col4">
				<p class="round_number">2</p>
				<p class="centered_instruction">Click on the magnifying glass to choose your actual location</p>
			</div>
			<div class="col4 last">
				<p class="round_number">3</p>
				<p class="centered_instruction">Click again to choose more than one location then submit</p>
			</div>
		</div>

	</div>

	<div id="game_and_pannel_container" class="margin_bottom">

		<div id="saving_pannel" class="ajax_loading_pannel">
			<div class="ajax_loading_pannel_inner">
				<h1>saving...</h1>
			</div>
		</div>

		<div id="saved_pannel_outer" class="ajax_loading_pannel">
			<div id="saved_pannel_inner" class="ajax_loading_pannel_inner">

				<div>
					<iframe class="youtube_video" src="//www.youtube.com/embed/IUf9EzPFJdo?controls=0&showinfo=0&rel=0" allowfullscreen frameborder="0"></iframe>
				</div>

				<h1>wow, good spot!!</h1>
				<br>
				<h2 id="remove_selection_confirmation" class="mock_link">play again</h2>
				<p>or</p>
				<h2><?= $this->Html->link('check out my page!',array('controller'=>'celebrities', 'action' => 'profile', 'month'=>date('Ym'))); ?></h2>

			</div>
		</div>

		<div id="game_video_container">
			<div id="game_video_inner">
				<div id="player"></div>
				<span id="hide_game_video" onclick="toggleVideoPlayer()">hide video</span>
			</div>
		</div>

		<div id="game_sidebar">
			<?= $this->element('game/game_sidebar'); ?>
		</div>

		<div id="purchase_gameballs_sidebar">
			<div>
				<h2>purchase gameballs</h2>
				<p class="tiny_text">either purchase gameballs from paypal or enter a promo code<p>
				<?= $this->element('paypal'); ?>
				<p class="mock_link cancel">cancel</p>
			</div>
		</div>

		<div class="game_image_container" id="outer_game_image_container" oncontextmenu="toggleLoupe();return false;" onmouseout="removeLoupe()">
			<?= $this->element('game/game_images'); ?>
		</div>
	</div>

	<div class="onerow no_padding">
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

<script>


		
	$( document ).on("click", ".main_game_image", function(event) {
		enterSelectMode();
	});
	
	$( document ).on("click", "#loupe_image_container", function(event) {
		registerSelectClick(event,date);
		showLoupeTeamSlider(event,date);
	});

	$( document ).on("mousemove", ".main_game_image", function(event) {
		findMouse(event,date);
	});
	
	$( document ).on("mousemove", "#loupe_image_container", function(event) {
		findMouseWithinLoupe(event,date);
	});

	$( document ).on("click", ".purchase_link", function(event) {
		console.log("purchase");
		$("#purchase_gameballs_sidebar").css("width","630px");
	});

	$( document ).on("click", ".cancel", function(event) {
		$("#purchase_gameballs_sidebar").css("width","100px");
	});

	$( document ).on("click", "#remove_selection_confirmation", function(event) {
		$("#saved_pannel_outer").css("left","-9999px");
	});

	$( document ).on("click", ".tab", function(event) {
		toggleTabs();
		toggleCompAndPracticeMode();
	});


	function ajaxSubmitGameBall(){

		$("#saving_pannel").css("left","0px");

		var x = $("#x_input").val();
		var y = $("#y_input").val();
		var team = $("#team_input").val();

		var dataString = 'x='+ x + '&y=' + y + '&team=' + team;

		$.ajax({
			url: "/" + rootDir + "/gameBalls/saveSelection",
			cache: false,
			type: "POST",
			data: dataString,
			success: function (data) {

				$("#game_sidebar").html(data);
				$("#single_crosshair").remove();
				$("#loupe_crosshair").remove();
				$("#loupe").css("display","none");

				playMode = true;
				submitMode = false;
				viewMode = "none";
				permanentlyShowGameBalls = false;

				ajaxGetSelections();

				$("#saving_pannel").css("left","-9999px");
				$("#saved_pannel_outer").css("left","0px");
			}
		});
	}

	function ajaxFetchCurrentCompetition(){
		removeAllGameballs();
		$.ajax({
			url: "/" + rootDir + "/games/fetchCompetition",
			cache: false,
			type: "GET",
			success: function (data) {
				$("#outer_game_image_container").html(data);
				ajaxFetchLoupe(0);
				ajaxGetSelections();
			}
		});
	}

	function ajaxFetchPractice(month,element){
		removeAllGameballs();

		$(".sidebar_list_item").attr("id", "");


		$(element).attr("id", "active");

		$.ajax({
			url: "/" + rootDir + "/games/fetchPractice/month:" + month,
			cache: false,
			type: "GET",
			success: function (data) {
				$("#outer_game_image_container").html(data);
				ajaxFetchLoupe(month);
			}
		});
	}

	function ajaxFetchLoupe(month){
		var url;
		if(month != 0){
			var url = "/" + rootDir + "/games/fetchLoupe/month:" + month;
		}else{
			var url = "/" + rootDir + "/games/fetchLoupe";
			console.log("no month");
		}

		$.ajax({
			url: url,
			cache: false,
			type: "GET",
			success: function (data) {

				$("#loupe").html(data);
			}
		});
	}

	function submitGameBall(){
		$( "#GameBasketForm" ).submit();
	}
	
</script>
</div>

<?= $this->element('quick_links'); ?>