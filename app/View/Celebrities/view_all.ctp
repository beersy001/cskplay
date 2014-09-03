<div class="grid" id="main_grid">
	<div class="onerow scene__element scene__element--fadeinup">

		<div class="col4">
			<h1>our celebrities</h1>
			<h2 class="helper--highlight-text">or past and present stars</h2>
			<p>Welcome to our celebrities page.  Each of these fantastic celebrities have joined forces with us to bring a new focus to giving and help make lots of different sports accessible to children in the UK.  Each celebrity has their own charity that we will be raising money for.</p>
			<p>To find out more about each of our celebrities, their charities, and why they are fully committed to our aims and dreams, click on their links.</p>
		</div>

		<div class="col4">
			<h1>current celebrity</h1>
			<h2 class="helper--highlight-text">James Corden</h2>
			<p>Our current celebrity is actor, comedian, synchronised swimming extraordinaire, and presenter James Cordon!! Have a look at his outtakes, interview and sample some of his slinky penalty skills.</p>
			<p>James supports the teenage cancer trust charity and is hoping to raise as much money as possible over the next 4 weeks.</p>
		</div>

		<div class="col4 last">
			<h1>next celebrity</h1>
			<h2 class="helper--highlight-text">Kiera Knightley</h2>
			<p>Our next celebrity is going to be Keira Knightley.  Keira is a brilliant actress who has a hidden talent – she can play make music by playing her teeth!!</p>
			<p>Keira has great sporting ability, proven by her role in Bend it like Beckham! Keira supports Cancer Trust UK and is looking forward to you helping her raise some great sums for them.</p>
		</div>

	</div>

	<div class="onerow alt-background scene__element scene__element--fadeinup">
		<div class="col12">

			<div id="thumbnail_container">
				<?php

				foreach($celebrities as $celeb){
					$celebMonth = $celeb['Celebrity']['month'];
					$sortedCelebrities[$celebMonth] = $celeb['Celebrity'];
				}

				krsort($sortedCelebrities);

				foreach($sortedCelebrities as $celeb){

					$imageName = 'headshot.jpg';
					$fileName = ucfirst( strtolower($celeb['firstName']) ) . ucfirst( strtolower($celeb['surname']) );
					$celebName = strtolower($celeb['firstName'] . ' ' . $celeb['surname']);
					$realDate = DateTime::createFromFormat('!Ym', $celeb['month'])->format('F Y');
					?>

					<div class="crossfade-wrapper crossfade-wrapper--width200">
						<a href="<?= $this->Html->url(array('controller'=>'celebrities', 'action'=>'profile', 'month'=>$celeb['month']))?>">

							<div class="crossfade-wrapper__layer crossfade-wrapper__layer--bottom crossfade-wrapper__layer--circle">
								<?= $this->Html->image( 'celebrities/' . $fileName . '/' . $imageName ); ?>
							</div>

							<div class="crossfade-wrapper__layer crossfade-wrapper__layer--top crossfade-wrapper__layer--circle crossfade-wrapper__layer--grey">
								<div class="layer__text-wrapper">
									<p class="text-wrapper__text"><?=$celebName?><br><?=strtolower($realDate)?></p>
								</div>
							</div>

						</a>
					</div>
				<?php
				}
				?>
			</div>
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
			<?= $this->element('blocks/find_out_more_about_us'); ?>
		</div>

		<div class="col3 last">
			<?= $this->element('blocks/find_out_more_prizes'); ?>
		</div>
	</div>
</div>


<!-- <?= $this->element('quick_links'); ?> -->