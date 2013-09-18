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
	<div class="col6 alternate alternate_one">
		<h1><?=$celebName?></h1>
		<?= $this->Html->image( $celebImage, array('id'=>'celebPicture', 'class' => 'middle_image') ) ?>
	</div>

	<div class="col6 last alternate alternate_one">
		<h2>This Months Celebrity</h2>
		<p>
			<?=$celebText?>
		</p>
	</div>
</div>




