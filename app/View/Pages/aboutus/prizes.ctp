<div class="grid" id="main_grid">

	<div class="onerow background_container">
		<div class="col3">
		</div>

		<div class="col9 last">
			<h1>prizes</h1>
		</div>
	</div>

	<div class="onerow background_container margin_bottom">

		<div id="side_menu" class="col3">
			<?= $this->element('about_us_nav_bar'); ?>
		</div>

		<div class="col6">
			<div class="onerow">
				<div class="col4">
					<?= $this->Html->image('prizes/image1.jpg'); ?>
				</div>

				<div class="col8 last">
					<p>For just £1 you can win up to £10,000 by playing Celebrity Spot Kick!</p>
					<p>Use your skill and simply choose where you think our footballing expert believes the centre of the ball is on the celebrity spot kick photo.</p>
					<p>Each gameball you play gives you the chance to share in the £10,000 prize pool.</p>
				</div>
			</div>
			
			<div class="onerow margin_bottom">				
				<h2 class="border_bottom">how much does it cost?</h1>
				<p>It costs just £1 to purchase and play a Celebrity Spot Kick Gameball.</p>
				<p>For every 2 Gameballs purchased you get a third Gameball for free.</p>
				<p>So for £2, you get to the chance to use your sporting skills and play 3 times to try and win one of our top prizes.</p>
				<p>Don’t forget that you are helping one of many good causes each time you play, and it costs less than buying a latte!!</p>
			</div>

			<div class="onerow margin_bottom">
				<h2>what can you win?</h2>
				<p>We have 3 main cash prize pools each month:</p>
				<ul>
					<li>1st prize is £5,000</li>
					<li>2nd prize is £3,000</li>
					<li>3rd prize is £2,000</li>
				</ul>
			</div>

			<div class="onerow margin_bottom">
				<h2 class="border_bottom">leaderboard</h1>
				<p>The Leader Board will show you how well you are doing on a month by month basis against all the other Celebrity Spot Kick players in the UK.</p>
				<p>You can see where you are placed in your region as an individual or in the team(s) you are playing in.</p>
			</div>

			<div class="onerow margin_bottom">
				<h2 class="border_bottom">winners each month!</h1>
				<p>The number of winners will depend on the number of players either accurately choosing the exact spot of the centre of the ball, or the number of players equally being closest to the centre of the ball.</p>
				<p>So there will always be a number of winners whether the centre of the ball is selected or not.</p>
			</div>

			<div class="onerow margin_bottom">
				<h2 class="border_bottom">individual</h1>
				<p>By playing each month you also give yourself the chance of winning a £500 prize if you come at the top of your geographical region.</p>
				<p>You will also win a £500 cash prize towards the charity of your choice.</p>
				<p>If you come top of the Individual Leader Board at the end of the year you will win a £5,000 cash prize, and a further £5,000 cash prize that will go to  charity of your choice.</p>
			</div>

			<div class="onerow margin_bottom">
				<h2 class="border_bottom">team</h1>
				<p>You can also win one of our regional £500 team prizes each month.</p>
				<p>The team with the best average score each month will win a £500 cash prize.</p>
				<p>If your team continues to do well each month and sits at the top of the leaderboard at the end of the year, your team will win a £5,000 cash prize, and a further £5,000 cash prize towards the charity of your teams’ choice.</p>
			</div>

		</div>

		<div class="col3 no_padding last">
			<?= $this->element('blocks/play'); ?>
			<?= $this->element('blocks/find_out_more_celebrities'); ?>
			<?= $this->element('blocks/find_out_more_giving'); ?>
			<?= $this->element('blocks/find_out_more_about_us'); ?>
		</div>
	</div>
</div>

<?= $this->element('quick_links'); ?>