<script>
	function openFAQ(id){

		console.log($("#" + id).css("max-height"));

		if( $("#" + id).css("max-height") == "20px" ){
			$("#" + id).css("max-height","100px");
			$("#" + id).css("background","rgb(88,88,91)");
		} else{
			$("#" + id).css("max-height","20px");
			$("#" + id).css("background","transparent");
		}
	}
</script>

<div class="grid" id="main_grid">

	<div class="onerow background_container">
		<div class="col12">
			<h1 class="border_bottom margin_bottom">frequently asked questions</h1>
			<p class="large_indent">this is your 1st port of call for any queries about out game and site.</p>
			<p class="large_indent">If you cant find what you're looking for please feel free to
				<?= $this->Html->link('contact us', array('controller'=>'pages', 'action'=>'contactUs'))?></p>
		</div>
	</div>

	<?php

	$numberOfCols = 0;

	foreach ( $questions as $categoryId => $category ) {
		
		if( $numberOfCols == 0 ){
			echo '<div class="onerow background_container">';
			echo '<div class="col6">';
		}else if( $numberOfCols == 1 ){
			echo '<div class="col6 last">';
		}

		switch ($categoryId) {
			case 'game':
				$image = 'play_white';
				$class = 'game_title_image';
				break;
			case 'charity':
				$image = 'charity_white';
				$class = 'charity_title_image';
				break;
			case 'celebrity':
				$image = 'celebs_white';
				$class = 'celebrity_title_image';
				break;
			case 'prize money':
				$image = 'win_white';
				$class = 'win_title_image';
				break;
			case 'teams':
				$image = 'team_white';
				$class = 'team_title_image';
				break;
		}

		echo $this->Html->image( 'icons/' . $image . '.png', array('class'=> $class, 'align'=>'left') );
		echo '<h2>' . $categoryId . '</h2>';

		foreach ( $category as $id => $question ) { ?>
			
			<div class="faq_container" id="<?=$id?>" onclick="openFAQ('<?=$id?>')">
				<span>Q -</span><p><?=$question['Question']['question']; ?></p>
				<span>A -</span><p><?=$question['Question']['answer']; ?></p>
			</div>

		<?php
		}

		if( $numberOfCols == 0 ){
			echo '</div>';
			$numberOfCols = 1;
		}else if( $numberOfCols == 1 ){
			echo '</div></div>';
			$numberOfCols = 0;
		}
	}

	if( $numberOfCols == 1 ){
		echo '</div>';
	}
	?>

	<div class="onerow ">
	</div>

</div>