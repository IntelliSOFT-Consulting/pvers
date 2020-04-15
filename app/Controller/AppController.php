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
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
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
		'Session'
    );
    // public $helpers = array('Html', 'Form', 'Session', 'Javascript', 'Ajax', 'AssetCompress.AssetCompress');
    public $helpers = array('Html', 'Form', 'Session', 'AssetCompress.AssetCompress');
    // public $uses = array('HelpInfo');

    public function beforeFilter() {
		if (($this->request->prefix === 'admin')) {            
			$this->layout = 'admin';                   
		} 
		$this->Auth->allow('display');
        //Configure AuthComponent
        $this->Auth->loginAction = array('controller' => 'users', 'action' => 'login');
        $this->Auth->logoutRedirect = array('controller' => 'users', 'action' => 'login');
        $this->Auth->loginRedirect = array('controller' => 'pages', 'action' => 'home', 'admin' => false);
		$this->Auth->authenticate = array( 
			'all' => array (
				'scope' => array('User.is_active' => 1)   
			),  
			'Form' 
		);
		$this->uses[] = 'HelpInfo';
		$this->set('help_infos', $this->HelpInfo->help_infos());
		// $this->Auth->authError = __('<p>Sorry, but you don\'t have sufficient permissions to access this location.</p>', true);
		$this->Auth->authError = __('<div class="alert alert-error">
										<button data-dismiss="alert" class="close">&times;</button>
										<h4><strong>Sorry!</strong> You don\'t have sufficient permissions to access the location.</h4>
									 </div>', true);
		// $this->Auth->loginError = __('Invalid e-mail / password combination.  Please try again', true);
		$this->Auth->loginError = __('<div class="alert alert-error">
										<button data-dismiss="alert" class="close">&times;</button>
										<h4>Invalid e-mail / password combination.  Please try again.</h4>
									 </div>', true);
    }
	
	 public function isAuthorized($user) {        
		// if (($this->params['prefix'] === 'admin') && ($user['is_admin'] != 1)) {            
		if (($this->request->prefix === 'admin') && ($user['is_admin'] != 1)) {            
			return false;                   
		}         
		return true;    
	}
	 
	/*
	************************************ UTILITY FUNCTIONS **********************************
	*/
	public function beforeSaving() {
		if (!empty($this->request->data['Sadr']['id'])) {
			$this->request->data['Sadr']['id'] = $this->Sadr->Luhn_Verify($this->request->data['Sadr']['id']);
		}
		
		if (!empty($this->request->data['SadrFollowup']['id'])) {
			$this->request->data['SadrFollowup']['id'] = $this->SadrFollowup->Luhn_Verify($this->request->data['SadrFollowup']['id']);
		}
		
		if (!empty($this->request->data['SadrFollowup']['sadr_id'])) {
			$this->request->data['SadrFollowup']['sadr_id'] = $this->SadrFollowup->Luhn_Verify($this->request->data['SadrFollowup']['sadr_id']);
		}
		
		if (!empty($this->request->data['Pqmp']['id'])) {
			$this->request->data['Pqmp']['id'] = $this->Pqmp->Luhn_Verify($this->request->data['Pqmp']['id']);
		}
		
		if (!empty($this->request->data['SadrListOfDrug'])) {
			foreach ($this->request->data['SadrListOfDrug'] as $key => $val) {
				if (!empty($val['id'])) {
					$this->request->data['SadrListOfDrug'][$key]['id'] = $this->Sadr->Luhn_Verify($val['id']);
				}
				if (empty($val['id']) && empty($val['drug_name']) && empty($val['brand_name']) && empty($val['dose']) && empty($val['route']) 
					&& empty($val['frequency']) && empty($val['start_date']) && empty($val['stop_date']) && empty($val['indication']) && empty($val['suspected_drug'])) {
					unset($this->request->data['SadrListOfDrug'][$key]);
				}
			}
		}
				
		if (!empty($this->request->data['Attachment'])) {
			foreach ($this->request->data['Attachment'] as $key => $val) {
				if (!empty($val['id'])) {
					$this->request->data['Attachment'][$key]['id'] = $this->Sadr->Luhn_Verify($val['id']);
				}
				// if (empty($val['filename']['name'])) {
					// unset($this->request->data['Attachment'][$key]);
				// }
			}
		}
		
		return $this->request->data;
	}
	
	public function beforeDisplaying() {
		if (!empty($this->request->data['Sadr']['id'])) {
			$this->request->data['Sadr']['id'] = $this->Sadr->Luhn($this->request->data['Sadr']['id']);
		}
		if (!empty($this->request->data['SadrFollowup']['id'])) {
			$this->request->data['SadrFollowup']['id'] = $this->SadrFollowup->Luhn($this->request->data['SadrFollowup']['id']);
		}
		if (!empty($this->request->data['SadrFollowup']['sadr_id'])) {
			$this->request->data['SadrFollowup']['sadr_id'] = $this->SadrFollowup->Luhn($this->request->data['SadrFollowup']['sadr_id']);
		}
		if (!empty($this->request->data['Pqmp']['id'])) {
			$this->request->data['Pqmp']['id'] = $this->Pqmp->Luhn($this->request->data['Pqmp']['id']);
		}

		if (!empty($this->request->data['SadrListOfDrug'])) {
			foreach ($this->request->data['SadrListOfDrug'] as $key => $val) {
				if (!empty($val['id'])) {
					// pr('isset?? WAAH!!  '.$val['id']);
					$this->request->data['SadrListOfDrug'][$key]['id'] = $this->Sadr->Luhn($val['id']);
				}
			}
		}
		
		if (!empty($this->request->data['Attachment'])) {
			foreach ($this->request->data['Attachment'] as $key => $val) {
				if (!empty($val['id'])) {
					$this->request->data['Attachment'][$key]['id'] = $this->Sadr->Luhn($val['id']);
				}
			}
		}
		
		return $this->request->data;
	}
	
	public function compagt($help_infos) {
		$helps = array();
		foreach ($help_infos as $help_info) {
			$helps[$help_info['HelpInfo']['field_name']] = $help_info['HelpInfo'];
		}
		return $helps;
	}
}