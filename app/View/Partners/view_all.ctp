<div class="grid" id="main_grid">
	<div class="onerow background_container">
		<div class="col3">
		</div>

		<div class="col9 last">
			<h1>partners</h1>
		</div>
	</div>




	<div class="onerow background_container margin_bottom">

		<div class="col3">
			<?= $this->element('about_us_nav_bar'); ?>
		</div>

		<div class="col9 last">

			<div class="conerow">

				<div class="col6">
					<p>We are grateful to have the following partners that we continually work closely with to bring you Celebrity Spot Kick, and allow us to do all the good things we can.  Our partners have helped us from developing our site to sponsoring us through marketing, utilising sports stadiums to ensuring we are doing our utmost in giving in the best possible way.</p>
				</div>

				<div class="col6 last">
					<p>Our partners are diverse.  Please take a look at each of our partners to see how they are helping us and why they decided to be part of Celebrity Spot Kick.</p>
				</div>
			</div>
			
			<div class="onerow">


					<div id="thumbnail_container">

				
					<?php

					foreach($partners as $partner){

						echo '<div class="crossfade float_left">';
							echo '<div class="fade_bottom">';
								echo $this->Html->image( 'partners/' . $partner['Partner']['partnerNameId'] . '/' . 'logo.png' );
							echo '</div>';
							echo '<div class="fade_top">';
								echo $this->Html->link('',array('controller'=>'partners', 'action'=>'profile', 'partnerNameId'=>$partner['Partner']['partnerNameId']));
							echo '</div>';
							//echo '<span class="footer">' . $partner['Partner']['name'] . '</span>';

						echo '</div>';
					}

					?>
				</div>
			</div>
		</div>
	</div>


</div>

<?= $this->element('quick_links'); ?>