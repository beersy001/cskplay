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

<div id="page_body">
	<h2>Good Causes</h2>

	<p>
		Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla sed mi nec purus tincidunt blandit et vitae ligula. Pellentesque pharetra laoreet lorem, suscipit aliquam tortor euismod nec. Vivamus vel nisi et felis gravida molestie. Nunc a sodales odio. Phasellus vehicula mattis diam a interdum. Duis at congue urna, non malesuada ipsum. Donec in ipsum iaculis, vehicula elit sed, rhoncus libero. Nunc pulvinar elementum velit. Suspendisse rutrum, lectus sit amet tempor pretium, nulla sem vestibulum nisi, sit amet tincidunt eros est non nisl. Nulla eget turpis orci. Donec tempor pellentesque luctus. Quisque posuere aliquam placerat. Aliquam suscipit pretium nisl, condimentum feugiat neque fermentum placerat.
	</p>

</div>