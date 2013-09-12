<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
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
App::uses('Controller', 'Controller');


/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {

	public $helpers = array('Html'); 
	
	public $components = array(
		//'DebugKit.Toolbar',
		'Session',
		'Auth' => array(
			'loginRedirect' => array('controller' => 'pages', 'action' => 'home'),
			'logoutRedirect' => array('controller' => 'pages', 'action' => 'home'),
			'authError' => "Access Denied",
			'authorize' => array('controller')
		)
	);


	public function beforeFilter(){

		App::import('Vendor', 'facebook-php-sdk-master/src/facebook');
		$this->Facebook = new Facebook(array(
			'appId'  => '503746699700838',
			'secret' => '36979bf24abf8718d89defdb933889e5'
		));

		if($this->Facebook->getUser()){
			$this->set('facebookUserId', $this->Facebook->getUser());
			$this->set('facebookUserProfile', $this->Facebook->api('/me','GET'));
		} else{
			$this->set('facebookUserId', null);
		}

		$this->Auth->allow('display','view','displayWinners','thisMonthsCelebrity');
		$this->set('authUser', $this->Auth->user());

	}

	public function isAuthorized($user){

		return true;
	}

	public function beforeRender(){
		$this->set('fb_login_url', $this->Facebook->getLoginUrl(array(
			'scope'=>'email',
			'redirect_uri' => Router::url(array(
				'controller' => 'users',
				'action' => 'login'),
				true))
		));
		$this->set('fb_logout_url', $this->Facebook->getLogoutUrl(array('next' => Router::url(array('controller' => 'users', 'action' => 'logout'), true))));

		$this->set('user', $this->Auth->user());

	}
}
