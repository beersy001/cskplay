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

if (!Configure::read('debug')):
	throw new NotFoundException();
endif;

App::uses('Debugger', 'Utility');

$this->Html->script( "moveHomeButtons", array("inline"=>false));
?>



<?php echo $this->Session->flash(); ?>


<script type="text/javascript">
	var el=document.getElementById("container");
	el.style.background = "url('/cskplay/app/webroot/img/backdrop.png')";
	el.style.backgroundPosition = "center 70%";
	el.style.backgroundRepeat = "no-repeat"; 
	el.style.backgroundAttachment = "fixed";
	el.style.backgroundSize = "cover";
</script>




<div id="home_padding"></div> 

<div id="home_buttons">
	<?= $this->Html->image( 'play_now_button.png', array('id'=>'play_now_button', 'url' => array('controller' => 'games', 'action' => 'displayGame')) ) ?>
	<?= $this->Html->image( 'view_demo_button.png', array('id'=>'view_demo_button', 'url' => array('controller' => 'pages', 'action' => 'viewDemo')) ) ?>
</div>

<div id="page_footer">
	<div class="onerow">
		<div class="col4 footer_element center_align">
			<?= $this->Html->image( 'good_causes.png', array('id'=>'good_causes_button', 'class'=>'center', 'url' => array('controller' => 'pages', 'action' => 'goodcauses')) ) ?>
			<br>
			<?= $this->Html->link('Good Causes',array('controller' => 'pages', 'action' => 'goodcauses'),array('class' => 'large_link')) ?>
		</div>
		<div class="col4 footer_element center_align">
			<?= $this->Html->image( 'check_results.png', array('id'=>'check_results_button', 'class'=>'center', 'url' => array('controller' => 'pages', 'action' => 'goodcauses')) ) ?>
			<br>
			<?= $this->Html->link('Check Results',array('controller' => 'pages', 'action' => 'goodcauses'),array('class' => 'large_link')) ?>
		</div>
		<div class="col4 last footer_element center_align">
			<?= $this->Html->image( 'outtakes.png', array('id'=>'outtakes_button', 'class'=>'center', 'url' => array('controller' => 'celebrities', 'action' => 'outtakes')) ) ?>
			<br>
			<?= $this->Html->link('Outtakes',array('controller' => 'pages', 'action' => 'goodcauses'),array('class' => 'large_link')) ?>
		</div>
	</div>
</div>