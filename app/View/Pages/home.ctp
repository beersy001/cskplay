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


<script>
	

</script>

<?= $this->Html->image( 'logo_20_20.png', array('class'=>'flash', 'id'=>'flash1') ) ?>



<div id="home_padding"></div> 

<div id="home_buttons">
	<!--
	<?= $this->Html->image( 'play_now_button.png', array('id'=>'play_now_button', 'url' => array('controller' => 'games', 'action' => 'displayGame')) ) ?>
	<?= $this->Html->image( 'view_demo_button.png', array('id'=>'view_demo_button', 'url' => array('controller' => 'pages', 'action' => 'viewDemo')) ) ?>
	-->
	<button class="button large_button" id="play_now_button">Play Now</button>
	<button class="button large_button" id="view_demo_button">View Demo</button>

</div>

<div class="background_container">
	<div class="onerow" id="about_us">
	
		<div class="col4">

			<h1>About Us</h1>
			<p>CSK Play is the idea of two best friends, Jonathan Lawson and Munur Shah.  Jonathan and Munur have been best friends from the age of 11 (now somewhere in their 40’s), and although their initial careers took them in different directions, they always talked about “giving something back” to the community.</p>
			<p>CSK Play’s mission is just that, to raise money for charities, good causes and CSK’s Sporting Foundation through sport orientated online competitions. CSK’s aim is to ensure each competition is both fun and worthwhile for our customers and charities alike. </p>
		</div>

		<div class="col4">
		<p>They have created CSK Play with a number of ideas in mind:</p>

	<ul>
		<li>Creating a fun and interactive sporting competition where 100% of profits will be split between:
			<ol>
				<li class="inner">Our Charity partner</li>
				<li class="inner">CSK’s Sporting Foundation</li>
				<li class="inner">Each month’s Celebrity’s chosen Charity</li>
			</ol>
		</li>
		<li>Giving all children in the UK the ability to try many different sports – making sports accessible and creating a legacy of Sport kick started from the success of the London 2012 Olympics</li>
		<li>Continued awareness of multiple Charities</li>
	</ul>
		</div>

		<div class="col4 last">
		<h2>CSK Play Sporting Foundation – Sports for Children </h2>
			<p>CSK Play will donate 30% of the profits to its Sporting Foundation.</p>
			<p>The Sporting Foundation will focus on giving all children the ability to engage in sports they may now necessarily be able to participate in due their availability/cost.</p>
			<p>We will initially work with schools in the UK to provide on-going sessions, sports trainers and facilities for free.</p>
		</div>
	</div>


		<div class="onerow">
			<div class="col4 footer_element center_align">
				<?= $this->Html->image( 'good_causes.png', array('id'=>'good_causes_button', 'class'=>'center', 'url' => array('controller' => 'pages', 'action' => 'goodCauses')) ) ?>
				<br>
				<?= $this->Html->link('Good Causes',array('controller' => 'pages', 'action' => 'goodCauses'),array('class' => 'large_link')) ?>
			</div>
			<div class="col4 footer_element center_align">
				<?= $this->Html->image( 'check_results.png', array('id'=>'check_results_button', 'class'=>'center', 'url' => array('controller' => 'pages', 'action' => 'goodcauses')) ) ?>
				<br>
				<?= $this->Html->link('Check Results',array('controller' => 'pages', 'action' => 'goodcauses'),array('class' => 'large_link')) ?>
			</div>
			<div class="col4 last footer_element center_align">
				<?= $this->Html->image( 'outtakes.png', array('id'=>'outtakes_button', 'class'=>'center', 'url' => array('controller' => 'celebrities', 'action' => 'outtakes')) ) ?>
				<br>
				<?= $this->Html->link('Outtakes',array('controller' => 'celebrities', 'action' => 'outtakes'),array('class' => 'large_link')) ?>
			</div>
		</div>
</div>

