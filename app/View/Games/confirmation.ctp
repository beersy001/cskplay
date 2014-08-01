<script>
	$(document).ready(function() {
		var originalFontSize = 16;
		var sectionWidth = $('.adaptive_text').width();

		$('.adaptive_text a').each(function(){
			var spanWidth = $(this).width();
			var newFontSize = (sectionWidth/spanWidth) * originalFontSize;
			$(this).css({"font-size" : newFontSize, "line-height" : newFontSize/1.2 + "px"});
		});
	});
</script>

<div class="grid" id="main_grid">
	<div class="onerow background_container">
		<div class="col12">
			<h1 class="border_bottom">thank you!</h1>
		</div>
	</div>

	<div class="onerow background_container">
		<div class="col8">
			<iframe id="player" frameborder="0" allowfullscreen="1" title="YouTube video player" width="700" height="413" src="https://www.youtube.com/embed/bNLy54amlio?autoplay=1&amp;controls=0&amp;showinfo=0&amp;rel=0&amp;enablejsapi=1&amp;origin=http%3A%2F%2Flocalhost"></iframe>
		</div>


		<div class="col4 last">
			<p>thank you for playing Celebrity spot kick, view you gameballs in the 'my account' area</p>
			<p>every gameball you play helps us give more and more to the charities our celebrities have chosen to support. we couldn't do it without your help!</p>
			<div class="adaptive_text">
				<br><br>
				<?=$this->Html->link('play again',array('controller'=>'games', 'action'=>'displayGame'), array('class'=>'no_decoration'))?>
			</div>
		</div>
	</div>

	<div class="onerow background_container">
		<div class="col12">
			<h1>your gameballs</h1>
			<table class="confirmation__table">
				<th>#</th>
				<th>id</th>
				<th>x</th>
				<th>y</th>
				<?php
				$i = 1;
				foreach ($insertedGameBalls as $key => $gameball) {
					echo '<tr>';
					echo '<td class="coord">' . $i . '</td>';
					echo '<td class="id">' . $gameball['GameBall']['id'] . '</td>';
					echo '<td class="coord">' . $gameball['GameBall']['x'] . '</td>';
					echo '<td class="coord">' . $gameball['GameBall']['y'] . '</td>';
					echo '</tr>';

					$i++;
				}
				?>

			</table>
		</div>

	</div>

	<div class="onerow background_container margin_bottom">
		<div class="col3">
			<?= $this->element('blocks/find_out_more_prizes'); ?>
		</div>
		<div class="col3">
			<?= $this->element('blocks/find_out_more_celebrities'); ?>
		</div>
		<div class="col3">
			<?= $this->element('blocks/find_out_more_giving'); ?>
		</div>
		<div class="col3 last">	
			<?= $this->element('blocks/find_out_more_about_us'); ?>
		</div>
	</div>
	
</div>

<?= $this->element('quick_links'); ?>