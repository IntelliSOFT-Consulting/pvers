<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		https://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
	public $components = array(
        'Acl',
        'Auth' => array(
            'authorize' => array(
                'Actions' => array('actionPath' => 'controllers')
            )
        ),
        'RequestHandler', 
		'Session',
		'Flash',
		'DebugKit.Toolbar'
	);

    public $helpers = array('Html', 'Form', 'Session');

    public function beforeFilter() {
		$this->Auth->allow('display');
        //Configure AuthComponent
        // $this->Auth->loginAction = array('controller' => 'users', 'action' => 'login');
        // $this->Auth->logoutRedirect = array('controller' => 'users', 'action' => 'login');
        // $this->Auth->loginRedirect = array('controller' => 'pages', 'action' => 'home', 'admin' => false);
		/*$this->Auth->authenticate = array(
			'all' => array (
				'scope' => array('User.is_active' => 1)   
			),  
			'Form' 
		);*/
		
		$this->Auth->authError = __('<div class="alert alert-error">
										<button data-dismiss="alert" class="close">&times;</button>
										<h4><strong>Sorry!</strong> You don\'t have sufficient permissions to access the location.</h4>
									 </div>', true);
		// $this->Auth->loginError = __('Invalid e-mail / password combination.  Please try again', true);
		$this->Auth->loginError = __('<div class="alert alert-error">
										<button data-dismiss="alert" class="close">&times;</button>
										<h4>Invalid e-mail / password combination.  Please try again.</h4>
									 </div>', true);
		$redir = 'default';
		if($this->Auth->User('group_id') == '1')  $redir = 'admin';
		if($this->Auth->User('group_id') == '2')  $redir = 'manager';
		if($this->Auth->User('group_id') == '3')  $redir = 'reporter';
		if($this->Auth->User('group_id') == '4')  $redir = 'partner';

		  $this->Auth->loginAction = array('controller' => 'users', 'action' => 'login', 'admin' => false);
		  $this->Auth->logoutRedirect = array('controller' => 'users', 'action' => 'login', 'admin' => false);
		  $this->Auth->loginRedirect = array('controller' => 'users', 'action' => 'dashboard', $redir => true);

		$this->Auth->authError = __('<div class="alert alert-error">
		              <button data-dismiss="alert" class="close">&times;</button>
		              <h4><strong>Sorry!</strong> You don\'t have sufficient permissions to access the location.</h4>
		             </div>', true);
		$this->Auth->loginError = __('<div class="alert alert-error">
		              <button data-dismiss="alert" class="close">&times;</button>
		              <h4>Invalid e-mail / password combination.  Please try again.</h4>
		             </div>', true);
		$this->set('redir', $redir);
    }
}
