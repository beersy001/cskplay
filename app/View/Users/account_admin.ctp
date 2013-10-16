<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Pages
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

if (!Configure::read('debug')){
	throw new NotFoundException();
}

App::uses('Debugger', 'Utility');

// cakePHP html 'helper' to dynamicaly create a <script> tag
// loads gamePlay.js

$this->set('pageId', 'accountAdmin');

$this->Html->script( "moveUserSelections", array("inline"=>false));

foreach ($results as $element) {
	$xPos = $element['Game']['x'];
	$yPos = $element['Game']['y'];
	$id = $element['Game']['id'];

	echo $this->Html->image( 'logo.png', array('class'=>'crosshair','id' => $id . 'unselected', 'style' => 'left:' . $xPos . "px; top: " . $yPos . "px" ) );
	echo $this->Html->image( 'logo_inverse.png', array('class'=>'crosshair','id' => $id . 'selected', 'style' => 'left:' . $xPos . "px; top: " . $yPos . "px; display: none" ) );
}

?>

<script>
	$(function(){
		$("a#toggle").click(function(){
			closeIFrame();
		}); 
	});


	var closeIFrame = function(){
		if ($("#sidebar").css('display') == 'none'){
			$("#sidebar").show('slide',{direction:'left'},800);
		} else{
			$("#sidebar").hide('slide',{direction:'left'},100);
			location.reload();
		}
	};


	function changeSelectionIcon(elem){
		var rawId = elem.id.substring(elem.id.length - 4, 0);
		document.getElementById(rawId + 'unselected').style.display = 'none';
		document.getElementById(rawId + 'selected').style.display = 'block';
		document.getElementById(rawId + 'selected').style.zIndex = '20';
	}

	function changeSelectionIconBack(elem){
		var rawId = elem.id.substring(elem.id.length - 4, 0);
		document.getElementById(rawId + 'unselected').style.display = 'block';
		document.getElementById(rawId + 'selected').style.display = 'none';
		document.getElementById(rawId + 'selected').style.zIndex = '10';
	}

</script>



<iframe id="sidebar" src="purchaseGameBalls">
</iframe>

<div class="onerow">
	<div class="col5">

		<div class="alternate alternate_one">
			<h2>My Details</h2>
			Username: <?= $this->Session->read('Auth.User.username'); ?> <br>
			Full Name: <?= $this->Session->read('Auth.User.fullName'); ?> <br>
			Email Address: <?= $this->Session->read('Auth.User.email'); ?>
		</div>

		<div class="alternate alternate_two">
			<h2>Game Details</h2>
			Attempts Made: <?= sizeof($results); ?> <br>
			Attempts Left: <?= $currentUser['User']['attemptsLeft'] ?> <br>
			<a href="#" id="toggle">Buy More Game Balls</a> <br>
			<?= $this->Html->link('Play Now',array('controller' => 'games', 'action' => 'displayGame')) ?>


	<?php
		$count = 1;

		foreach ($results as $element) {
		$xPos = $element['Game']['x'];
		$yPos = $element['Game']['y'];
		$id = $element['Game']['id'];
	?>
		<div class="game_ball avaliable" id="<?= $id . 'icon' ?>" onmouseover="changeSelectionIcon(this)" onmouseout="changeSelectionIconBack(this)">
			<span><?=$count?> | </span>
			<?= $this->Html->image( 'logo_32_32.png', array('class'=>'game_ball_image', 'id' => '$id' . 'bagIcon') ) ?>
			<span>Game Ball | (<?= $xPos . " , " . $yPos ?>)</span>
		</div>
	<?php
		$count++;
		}
	?>

		</div>

	</div>

	<div class="col7 last">

		<?= $this->Html->image( 'gameImage1.jpg', array('class'=>'game_image', 'id'=>'main_image') ) ?>

	</div>
</div>


	
<?= $this->Html->image( 'gameImage1.jpg', array('id'=>'imageHidden','style'=>'display: none; position: absolute')) ?>