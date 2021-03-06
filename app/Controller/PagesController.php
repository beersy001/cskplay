<?php
/**
 * Static content controller.
 *
 * This file will render views from views/pages/
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
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
App::uses('AppController', 'Controller');

/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers/pages-controller.html
 */
class PagesController extends AppController {


	public function display() {

		$path = func_get_args();

		$count = count($path);
		if (!$count) {
			$this->redirect('/');
		}
		$page = $subpage = $title_for_layout = null;

		if (!empty($path[0])) {
			$page = $path[0];
		}
		if (!empty($path[1])) {
			$subpage = $path[1];
		}
		if (!empty($path[$count - 1])) {
			$title_for_layout = Inflector::humanize($path[$count - 1]);
		}

		$title_for_layout = preg_replace('/(?<!^)([A-Z])/', ' \\1', $title_for_layout);


		$this->set('title_for_page', strtolower($title_for_layout));
		$this->set('pageId', $page);

		if(strtolower($title_for_layout) == 'good causes'){
			$this->set('title_for_page', 'this months charity');
		}

		if($title_for_layout == 'Home'){

			$this->layout= 'home_page';

			$this->set('backgroundImage', '/cskplay/app/webroot/img/backdrop.png');
			$this->set('backgroundPosition', 'center 70%');
			$this->set('backgroundRepeat', 'no-repeat');
			$this->set('backgroundSize', 'cover');
			$this->set('backgroundAttachment', 'scroll');
			$this->set('title_for_page', '');
		}
		
		$this->set(compact('page', 'subpage', 'title_for_layout'));
		$this->render(implode('/', $path));
	}
}