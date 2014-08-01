

<div id="loupe" oncontextmenu="toggleLoupe();return false;">
	<?= $this->element('game/game_loupe'); ?>
</div>

<div id="game_and_pannel_container">
	<div class="game_image_container" oncontextmenu="toggleLoupe();return false;" onmouseout="removeLoupe()">
		<?= $this->element('game/game_images'); ?>
	</div>
</div>

<script>
	$(document).ready(function() {

		moveUserSelections("201402");
	
		playMode = true;


		$(".main_game_image").click( function(event) {		
			enterSelectMode();
		});
		
		$("#loupe_image_container").click( function(event) {
			if(submitMode == false){
				toggleSubmitMode();
			}
			registerSelectClick(event,"201402");
		});

		$(".main_game_image").mousemove(function(event) {
			findMouse(event,"201402");
		});
		
		$("#loupe_image_container").mousemove(function(event) {
			findMouseWithinLoupe(event,"201402");
		});
	});
</script>

