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

?>

<div class="onerow">
	<div class="col4">
		<h2 class="dark_background">The Bobby Moore Fund</h2>


		<p>
			Since 1993, the Bobby Moore Fund has gone from strength to strength. With your help, over £2 million is now raised each year through events, partnerships, and activities organised by supporters.
		</p>
		<p>
			Thanks to your support, to date the Bobby Moore Fund has raised over £20 million. The funds are spent on world class bowel cancer research carried out by leading scientists working across the UK.
		</p>

		<?= $this->Html->image( 'bobby_moore_fund_logo.png', array('id'=>'charity_logo') ) ?>
		
	</div>
	<div class="col8 last">
		<div class="video_container ">
			<iframe class="youtube_video" src="//www.youtube.com/embed/m_S42QvAtXE?HD=1;rel=0;showinfo=0;controls=0" allowfullscreen></iframe>
		</div>
	</div>
</div>



<div class="onerow">
	<div class="col4">
		<h2 class="dark_background">Bobby Moore</h2>
		<?= $this->Html->image( 'bobbyMooreHeadshot.jpg', array('class'=>'headshot_image', 'align'=>'left') ) ?>

		<p>Robert Frederick Chelsea Moore was born on 12 April 1941 in Barking, Essex.</p>	

		<p>He played for West Ham United and Fulham FC and led England to World Cup victory in 1</p>

		<p>As captain of the only England football team ever to win the World Cup, Bobby Moore remains one of the greatest sporting heroes in football.</p>	

		<p>The famous image of Bobby holding the Jules Rimet trophy aloft at Wembley Stadium in 1966 is one that has become ingrained in every football fan's memory.</p>	

		<p>Bobby played for England 108 times, captained the team in a record 90 matches, won the World Cup, the FA Cup, the European Cup Winners' Cup and was Footballer of the Year.</p>	

		<p>During a career spanning over two decades, he secured a reputation for being one of the best defenders in the world.</p>	

		<p>Bobby was awarded an OBE in 1967.</p>	

		<p>Since Bobby died in 1993, almost 300,000 people have lost their lives to bowel cancer in the UK. Please support Bobby's legacy and help us tackle bowel cancer. There are many ways you can get involved, from joining an event or becoming a partner to making a donation.</p>		
	</div>
	<div class="col4">
		<h2 class="dark_background">Boris Johnson</h2>
		<?= $this->Html->image( 'BorisJohnson_headshot.jpg', array('class'=>'headshot_image', 'align'=>'left') ) ?>
		<p class="">Stephanie Moore MBE established the Bobby Moore Fund, in partnership with Cancer Research UK, in 1993.</p>

		<p class="">The Fund was set up in memory of Stephanie's late husband, legendary footballer Bobby Moore, who sadly died from bowel cancer aged just 51.</p>

		<p class="">We raise money for research into bowel cancer and also work to increase public awareness of the disease.</p>
	</div>

	<div class="col4 last">
		<h2 class="dark_background">Stephanie Moore</h2>
		<?= $this->Html->image( 'stephanieMooreHeadshot.jpg', array('class'=>'headshot_image', 'align'=>'left') ) ?>
		<p class="">Stephanie Moore MBE established the Bobby Moore Fund, in partnership with Cancer Research UK, in 1993.</p>

		<p class="">The Fund was set up in memory of Stephanie's late husband, legendary footballer Bobby Moore, who sadly died from bowel cancer aged just 51.</p>

		<p class="">We raise money for research into bowel cancer and also work to increase public awareness of the disease.</p>

		<p>As captain of the only England football team ever to win the World Cup, Bobby Moore remains one of the greatest sporting heroes in football.</p>	
	</div>
</div>


