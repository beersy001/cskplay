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

$this->Html->script( "alterSelectionPosition", array("inline"=>false));


foreach ($results as $element) {
	$xPos = $element['Game']['x'];
	$yPos = $element['Game']['y'];

	echo $this->Html->image( 'logo.png', array('class'=>'crosshair', 'style' => 'left:' . $xPos . "px; top: " . $yPos . "px" ) );
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
	</script>



<iframe id="sidebar" src="purchaseGameBalls">
</iframe>


<div class="onerow">
	<div class="col12">
		<h1>My Page</h1>
	</div>
</div>


<div class="onerow">
	<div class="col5">
		
		<h2>My Details</h2>
		Username: <?= $this->Session->read('Auth.User.username'); ?> <br>
		Full Name: <?= $this->Session->read('Auth.User.fullName'); ?> <br>
		Email Address: <?= $this->Session->read('Auth.User.email'); ?>

		<br>
		<br>

		<h2>Game Details</h2>
		Attempts Made: <?= sizeof($results); ?> <br>
		Attempts Left: <?= $currentUser['User']['attemptsLeft'] ?> <br>
		<a href="#" id="toggle">Buy More Game Balls</a> <br>
		<?= $this->Html->link('Play Now',array('controller' => 'games', 'action' => 'displayGame')) ?>


	</div>

	<div class="col7 last">

		<h2>My Selections</h2>

		<?= $this->Html->image( 'gameImage1.jpg', array('id'=>'game_image') ) ?>

	</div>
</div>


	
<?= $this->Html->image( 'gameImage1.jpg', array('id'=>'imageHidden','style'=>'display: none; position: absolute')) ?>