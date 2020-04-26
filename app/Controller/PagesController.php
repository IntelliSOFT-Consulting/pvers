<?php
/**
 * Static content controller.
 *
 * This file will render views from views/pages/
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

App::uses('AppController', 'Controller');
App::uses('File', 'Utility');

/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers/pages-controller.html
 */
class PagesController extends AppController {

/**
 * Controller name
 *
 * @var string
 */
	public $name = 'Pages';

/**
 * Default helper
 *
 * @var array
 */

/**
 * This controller does not use a model
 *
 * @var array
 */
	public $uses = array('Feedback', 'Sadr', 'Aefi', 'Pqmp', 'SadrFollowup');

	public function admin_index() {

	}

	public function admin_dashboard() {
        $this->set('title_for_layout', 'Dashboard');
		$this->Feedback->recursive = -1;
		$this->set('feedbacks', $this->Feedback->find('list', array('limit' => 5, 'order' => array('Feedback.created' => 'desc'))));
		$this->set('count_sadrs', $this->Sadr->find('count', array('conditions' => array('Sadr.submitted' => '2'))));
		$this->set('count_aefis', $this->Aefi->find('count', array('conditions' => array('Aefi.submitted' => '2'))));
		$this->set('count_pqmps', $this->Pqmp->find('count', array('conditions' => array('Pqmp.submitted' => '2', 'Pqmp.created >' => date("Y-m-d H:i:s", strtotime("-3 day"))))));
		$this->set('count_feedbacks', $this->Feedback->find('count', array('conditions' => array('Feedback.created >' => date("Y-m-d H:i:s", strtotime("-3 day"))))));
		if($this->request->is('post')) {
			if(!empty($this->request->data['Page']['file']['tmp_name'])) {
				// pr($this->request->data);
				$file = new File($this->request->data['Page']['file']['tmp_name']);
				$xmlString = $file->read();
				$xmlArray = Xml::toArray(Xml::build($xmlString, array('return' => 'domdocument')));
				// pr($xmlArray);
				$success = false;
				if(isset($xmlArray['response']['report'][0])) {
					foreach($xmlArray['response']['report'] as $report) {
						if(!empty($report)) {
							// pr(array_keys($report));
							// pr($report);
							if(in_array('Sadr',array_keys($report))) {
								$model = $this->Sadr;
								$report['Sadr']['report_type'] = 'Initial Report';
								$report['Sadr']['submitted'] = 5;
								$report['Sadr']['device'] = 5;
								if(!isset($report['SadrListOfDrug'][0])){
									$report['SadrListOfDrug'] = array(0 => $report['SadrListOfDrug']);
								}
								unset($model->validate['form_id']);
							}
							if(in_array('Pqmp',array_keys($report))) {
								$model = $this->Pqmp;
								$report['Pqmp']['submitted'] = 5;
								$report['Pqmp']['complaint'] = '';
								$report['Pqmp']['device'] = 1;
							}
							if(in_array('SadrFollowup',array_keys($report))) {
								$model = $this->SadrFollowup;
								$report['SadrFollowup']['submitted'] = 5;
								$report['SadrFollowup']['device'] = 1;
								if(!isset($report['SadrListOfDrug'][0])){
									$report['SadrListOfDrug'] = array(0 => $report['SadrListOfDrug']);
								}
							}
							$model->create();
							if($model->saveAssociated($report, array('validate' => 'first'))) {
								$success = true;
							} else {
								$this->Session->setFlash(__('The upload was not completely successful. View imported records to see which were successfull imported'), 'flash_error');
								$success = false;
								break;
							}
						}
					}
				} else {
							// pr($xmlArray['response']['report']);
					if(!empty($xmlArray['response']['report'])) {
						if(in_array('Sadr',array_keys($xmlArray['response']['report']))) {
							$model = $this->Sadr;
							$xmlArray['response']['report']['Sadr']['report_type'] = 'Initial Report';
							$xmlArray['response']['report']['Sadr']['submitted'] = 5;
							$xmlArray['response']['report']['Sadr']['device'] = 1;
							if(!isset($xmlArray['response']['report']['SadrListOfDrug'][0])){
								$xmlArray['response']['report']['SadrListOfDrug'] = array(0 => $xmlArray['response']['report']['SadrListOfDrug']);
							}
							unset($model->validate['form_id']);
						}
						if(in_array('Pqmp',array_keys($xmlArray['response']['report']))) {
							$model = $this->Pqmp;
							$xmlArray['response']['report']['Pqmp']['submitted'] = 5;
							$xmlArray['response']['report']['Pqmp']['device'] = 1;
							$xmlArray['response']['report']['Pqmp']['complaint'] = '';
						}
						if(in_array('SadrFollowup',array_keys($xmlArray['response']['report']))) {
							$model = $this->SadrFollowup;
							$xmlArray['response']['report']['SadrFollowup']['submitted'] = 5;
							$xmlArray['response']['report']['SadrFollowup']['device'] = 1;
							$xmlArray['response']['report']['SadrFollowup']['sadr_id'] = $model->Luhn_Verify($xmlArray['response']['report']['SadrFollowup']['sadr_id']);
							if(!isset($xmlArray['response']['report']['SadrListOfDrug'][0])){
								$xmlArray['response']['report']['SadrListOfDrug'] = array(0 => $xmlArray['response']['report']['SadrListOfDrug']);
							}
						}
						$model->create();
						if($model->saveAssociated($xmlArray['response']['report'], array('validate' => 'first'))) {
							$success = true;
						} else {
							$this->Session->setFlash(__('The upload was not completely successful. View imported records to see which were successfull imported'), 'flash_error');
							$success = false;
						}
					}
				}
				if($success) $this->Session->setFlash(__('The records have been successfully uploaded. View imported records to see the records that were uploaded.'), 'flash_success');
				$file->close();
			} else {
				$this->Session->setFlash(__('No file Selected. Please select a valid XML file.'), 'flash_error');
				// $this->redirect(array('action'=>'dashboard'));
			}
		}
	}

	public function admin_reports() {

	}
/**
 * Displays a view
 *
 * @param mixed What page to display
 * @return void
 */
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
		$this->set(compact('page', 'subpage', 'title_for_layout'));
		$this->render(implode('/', $path));
	}
}
