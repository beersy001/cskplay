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
	<div class="[ onerow ]  [ scene__element  scene__element--fadeinup ]">
		<div class="col6">
			<h1>Thank You!</h1>
			<h2 class="helper--highlight-text">your Gameballs have been saved</h2>
		</div>

		<div class="col6 last">
		</div>
	</div>

	<div class="[ onerow ]  [ alt-background ]  [ scene__element  scene__element--fadeinup ]">

		

		<div class="col7">
			
			<div class="table-wrapper">
				<table class="confirmation__table">
					<thead>
						<tr>
							<th>#</th>
							<th>id</th>
							<th>x</th>
							<th>y</th>
							<th>date and time</th>
							<th>price</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$i = 1;
						foreach ($insertedGameBalls as $key => $gameball) {
							echo '<tr>';
							echo '<td>' . $i . '</td>';
							echo '<td>' . $gameball['GameBall']['id'] . '</td>';
							echo '<td>' . $gameball['GameBall']['x'] . '</td>';
							echo '<td>' . $gameball['GameBall']['y'] . '</td>';
							echo '<td>' . date('d M Y - H:i', $gameball['GameBall']['created']->sec)   . '</td>';
							echo '<td>' . $gameball['GameBall']['price'] . '</td>';
							echo '</tr>';


							$i++;
						}
						?>
					</tbody>
				</table>
			</div>
		</div>
		<div class="col5 last">
			<h2>thank you</h2>
			<p>thank you for playing Celebrity spot kick, view you gameballs in the <a href="/users/accountAdmin/">my account</a> area</p>
			<p>every gameball you play helps us give more and more to our sporting foundation</p>
		</div>
	</div>

	<div class="[ onerow helper--no-pad ]  [ parallax parallax--100pc-high  parallax--bg-position ]  [ scene__element  scene__element--fadeinup ]" style="background-image:url(/img/celebrities/ryangiggs/banner.jpg)">
		<div class="banner-wapper">
			<div class="banner-wapper__text-wrapper">
				<?= $this->Html->link('Play Again!',array('controller' => 'games', 'action' => 'displayGame'),array( 'class' => 'text-wrapper__link')) ?>
			</div>
		</div>
	</div>

	

	<div class="[ onerow ]  [ alt-background ]">
		<div id="thank-you-video-wrapper" class="colcenter40"><!--
			<iframe id="player" frameborder="0" allowfullscreen="1" title="YouTube video player" width="700" height="413" src="https://www.youtube.com/embed/bNLy54amlio?autoplay=1&amp;controls=0&amp;showinfo=0&amp;rel=0&amp;enablejsapi=1&amp;origin=http%3A%2F%2Flocalhost"></iframe>
		-->
		</div>

		<script>
			$('#thank-you-video-wrapper').tubular({
				videoId: 'bNLy54amlio',
				mute: false,
				repeat: false,
				controls: 1,
				autoPlay: false,
				fullscreen: false
			});
		</script>
	</div>



	<div class="onerow">
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