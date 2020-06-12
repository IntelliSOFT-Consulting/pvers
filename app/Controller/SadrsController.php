<?php
App::uses('AppController', 'Controller');
App::uses('Sanitize', 'Utility');
App::uses('CakeText', 'Utility');
App::uses('ThemeView', 'View');
App::uses('HtmlHelper', 'View/Helper');

/**
 * Sadrs Controller
 *
 * @property Sadr $Sadr
 */
class SadrsController extends AppController {
	public $components = array(
			// 'Security' => array('csrfExpires' => '+1 hour', 'validatePost' => false), 
			'Search.Prg', 
			// 'RequestHandler'
			);
	public $paginate = array();
    public $presetVars = true;

    public $uses = array('Sadr', 'SadrFollowup', 'Attachment');

	/*public function beforeFilter() {
		parent::beforeFilter();
		// add auth effectively to views
		// $this->Auth->allow('index', 'add', 'edit','view', 'find', 'download');
		$this->Security->blackHoleCallback = 'blackhole';
		if ($this->RequestHandler->isXml() || $this->RequestHandler->isAjax() || $this->request->params['action'] == 'edit')  $this->Security->csrfCheck = false;
	}

	public function blackhole($type) {
		$this->Session->setFlash(__('Sorry! The page has expired due to a '.$type.' error. Please refresh the page.'), 'flash_error');
		$this->redirect($this->referer());
	}*/

	public function vigiflowlink($id = null) {
		$this->Sadr->id = $this->Sadr->Luhn_Verify($this->request->data['Sadr']['id']);
		if ($this->Sadr->exists()) {
			$this->set('message', 'The report '.$id.' does not exist');
			$this->set('_serialize', 'message');
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Sadr->saveField('vigiflow_id', $this->request->data['Sadr']['vigiflow_id'])) {
				$this->set('message', $this->request->data['Sadr']['vigiflow_id']);
				$this->set('_serialize', 'message');
			} else {
				$this->set('message', 'Could not save '.$this->request->data['Sadr']['vigiflow_id']);
				$this->set('_serialize', 'message');
			}
		}
	}
/**
 * index method
 */
	/*public function index() {
		$this->Sadr->recursive = 0;
		$this->set('sadrs', $this->paginate());
	}*/
	public function reporter_index() {
        $this->Prg->commonProcess();
        $page_options = array('25' => '25', '20' => '20');
        if (!empty($this->passedArgs['start_date']) || !empty($this->passedArgs['end_date'])) $this->passedArgs['range'] = true;
        if (isset($this->passedArgs['pages']) && !empty($this->passedArgs['pages'])) $this->paginate['limit'] = $this->passedArgs['pages'];
            else $this->paginate['limit'] = reset($page_options);

        $criteria = $this->Sadr->parseCriteria($this->passedArgs);
        $criteria['Sadr.user_id'] = $this->Auth->User('id');
        $this->paginate['conditions'] = $criteria;
        $this->paginate['order'] = array('Sadr.created' => 'desc');
        $this->paginate['contain'] = array('County');

        //in case of csv export
        if (isset($this->request->params['ext']) && $this->request->params['ext'] == 'csv') {
          $this->csv_export($this->Sadr->find('all', 
                  array('conditions' => $this->paginate['conditions'], 'order' => $this->paginate['order'], 'contain' => $this->paginate['contain'])
              ));
        }
        //end pdf export
        $this->set('page_options', $page_options);
        $this->set('sadrs', Sanitize::clean($this->paginate(), array('encode' => false)));
    }

	public function manager_index() {
        $this->Prg->commonProcess();
        $page_options = array('25' => '25', '20' => '20');
        if (!empty($this->passedArgs['start_date']) || !empty($this->passedArgs['end_date'])) $this->passedArgs['range'] = true;
        if (isset($this->passedArgs['pages']) && !empty($this->passedArgs['pages'])) $this->paginate['limit'] = $this->passedArgs['pages'];
            else $this->paginate['limit'] = reset($page_options);

        $criteria = $this->Sadr->parseCriteria($this->passedArgs);
        $criteria['Sadr.submitted'] = 2;
        $this->paginate['conditions'] = $criteria;
        $this->paginate['order'] = array('Sadr.created' => 'desc');
        $this->paginate['contain'] = array('County');

        //in case of csv export
        if (isset($this->request->params['ext']) && $this->request->params['ext'] == 'csv') {
          $this->csv_export($this->Sadr->find('all', 
                  array('conditions' => $this->paginate['conditions'], 'order' => $this->paginate['order'], 'contain' => $this->paginate['contain'])
              ));
        }
        //end pdf export
        $this->set('page_options', $page_options);
        $this->set('sadrs', Sanitize::clean($this->paginate(), array('encode' => false)));
    }

    public function sadrIndex() {
        $this->Prg->commonProcess();
		if (!empty($this->passedArgs['start_date']) || !empty($this->passedArgs['end_date'])) $this->passedArgs['range'] = true;
		if (isset($this->passedArgs['pages']) && !empty($this->passedArgs['pages'])) $this->paginate['limit'] = $this->passedArgs['pages'];
        else $this->paginate['limit'] = 20;
		if (isset($this->passedArgs['id']) && $this->Sadr->Luhn_Verify($this->passedArgs['id'])) $this->passedArgs['id'] = $this->Sadr->Luhn_Verify($this->passedArgs['id']);
		$criteria = $this->Sadr->parseCriteria($this->passedArgs);
		if($this->Auth->User('group_id') != 4) $criteria['Sadr.user_id'] = $this->Auth->user('id');
		else $criteria['Sadr.institution_code'] = $this->Auth->user('ward');
        $this->paginate['conditions'] = $criteria;
        $this->paginate['order'] = array('Sadr.created' => 'desc');
 		$this->Sadr->recursive = -1;

		if (strpos($this->request->url,'xls') !== false){
			$this->helpers[] = 'PhpExcel';
			$this->Sadr->recursive = 1;
			$routes = $this->Sadr->SadrListOfDrug->Route->find('list');
			$this->set(compact('routes'));
			$frequency = $this->Sadr->SadrListOfDrug->Frequency->find('list');
			$this->set(compact('frequency'));
			$dose = $this->Sadr->SadrListOfDrug->Dose->find('list');
			$this->set(compact('dose'));
		}
		if ($this->RequestHandler->isXml()) {
			$this->Sadr->recursive = 1;
			$this->response->download('SADRS_'.date('Y_m_d_His'));
		}
		$this->set('sadrs', $this->paginate());
    }

    public function admin_index() {
        $this->Prg->commonProcess();
		if (!empty($this->passedArgs['start_date']) || !empty($this->passedArgs['end_date'])) $this->passedArgs['range'] = true;
		if (isset($this->passedArgs['pages']) && !empty($this->passedArgs['pages'])) $this->paginate['limit'] = $this->passedArgs['pages'];
        else $this->paginate['limit'] = 20;
		if (isset($this->passedArgs['id']) && $this->Sadr->Luhn_Verify($this->passedArgs['id'])) $this->passedArgs['id'] = $this->Sadr->Luhn_Verify($this->passedArgs['id']);
		$criteria = $this->Sadr->parseCriteria($this->passedArgs);
        $this->paginate['conditions'] = $criteria;
        $this->paginate['order'] = array('Sadr.created' => 'desc');
 		$this->Sadr->recursive = -1;

		if (strpos($this->request->url,'xls') !== false){
			$this->helpers[] = 'PhpExcel';
			$this->Sadr->recursive = 1;
			$routes = $this->Sadr->SadrListOfDrug->Route->find('list');
			$this->set(compact('routes'));
			$frequency = $this->Sadr->SadrListOfDrug->Frequency->find('list');
			$this->set(compact('frequency'));
			$dose = $this->Sadr->SadrListOfDrug->Dose->find('list');
			$this->set(compact('dose'));
		}
		if ($this->RequestHandler->isXml()) {
			$this->Sadr->recursive = 1;
			$this->response->download('SADRS_'.date('Y_m_d_His'));
		}
		$this->set('sadrs', $this->paginate());
    }

    private function csv_export($csadrs = ''){
        //todo: check if data exists in $users
        $_serialize = 'csadrs';
        $_header = array('Id', 'Reference Number', 
            'Created',
            );
        $_extract = array('Sadr.id', 'Sadr.reference_no', 
            'Sadr.created');

        $this->response->download('SADRS_'.date('Ymd_Hi').'.csv'); // <= setting the file name
        $this->viewClass = 'CsvView.Csv';
        $this->set(compact('csadrs', '_serialize', '_header', '_extract'));
    }

	public function institutionCodes() {
		if($this->Auth->user('institution_code')) {
			$this->Sadr->recursive = -1;
			$this->paginate = array(
				'conditions' => array('Sadr.institution_code' => $this->Auth->user('institution_code')),
				'fields' => array('Sadr.report_title', 'Sadr.created'),
				'limit' => 25,
				'order' => array(
					'Sadr.created' => 'asc'
				)
			);
			$this->set('sadrs', $this->paginate());
		}
	}
/**
 * view methods
 */
	public function view($id = null) {
		$this->Sadr->id = $this->Sadr->Luhn_Verify($id);
		if (!$this->Sadr->exists()) {
			$this->Session->setFlash(__('Could not verify the suspected adverse drug report ID. Please ensure the ID is correct.'), 'flash_error');
			$this->redirect('/');
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if (isset($this->request->data['continueEditing'])) {
				$this->Sadr->saveField('submitted', 0);
				$this->Session->setFlash(__('You can continue editing the report'), 'flash_success');
				$this->redirect(array('action' => 'edit', $this->Sadr->Luhn($this->Sadr->id)));
			}
			if (isset($this->request->data['sendToPPB'])) {
				$this->Sadr->saveField('submitted', 2);
				$this->Session->setFlash(__('Thank you for submitting your report. You will get an email with a link to the pdf copy of the report.'), 'flash_success');
				$this->redirect('/');
			}
		}
		Configure::load('appwide');
		$this->set('root', Configure::read('Domain.root'));
		$this->set('sadr', $this->Sadr->read(null));
		$routes = $this->Sadr->SadrListOfDrug->Route->find('list');
		$this->set(compact('routes'));
		$frequency = $this->Sadr->SadrListOfDrug->Frequency->find('list');
		$this->set(compact('frequency'));
		$dose = $this->Sadr->SadrListOfDrug->Dose->find('list');
		$this->set(compact('dose'));
		$this->set('followups', $this->Sadr->SadrFollowup->find('count', array('conditions' => array('SadrFollowup.sadr_id' => $this->Sadr->id))));
	}

	public function reporter_view($id = null) {
        $this->Sadr->id = $id;
        if (!$this->Sadr->exists()) {
            $this->Session->setFlash(__('Could not verify the SADR report ID. Please ensure the ID is correct.'), 'flash_error');
            $this->redirect('/');
        }

        if (strpos($this->request->url, 'pdf') !== false) {
            $this->pdfConfig = array('filename' => 'SADR_' . $id,  'orientation' => 'portrait');
            // $this->response->download('SADR_'.$sadr['Sadr']['id'].'.pdf');
        }

        if ($this->request->is('post') || $this->request->is('put')) {
            if (isset($this->request->data['continueEditing'])) {
                $this->Sadr->saveField('submitted', 0);
                $this->Session->setFlash(__('You can continue editing the report'), 'flash_success');
                $this->redirect(array('action' => 'edit', $this->Sadr->Luhn($this->Sadr->id)));
            }
            if (isset($this->request->data['sendToPPB'])) {
                $this->Sadr->saveField('submitted', 2);
                $this->Session->setFlash(__('Thank you for submitting your report. You will get an email with a link to the pdf copy of the report.'), 'flash_success');
                $this->redirect('/');
            }
        }

        $sadr = $this->Sadr->read(null);
        $this->set('sadr', $sadr);

		$this->set('sadr', $this->Sadr->read(null));
		$routes = $this->Sadr->SadrListOfDrug->Route->find('list');
		$this->set(compact('routes'));
		$frequency = $this->Sadr->SadrListOfDrug->Frequency->find('list');
		$this->set(compact('frequency'));
		$dose = $this->Sadr->SadrListOfDrug->Dose->find('list');
		$this->set(compact('dose'));

        if (strpos($this->request->url, 'pdf') !== false) {
            $this->pdfConfig = array('filename' => 'SADR_' . $id,  'orientation' => 'portrait');
            $this->response->download('SADR_'.$sadr['Sadr']['id'].'.pdf');
        }
    }

	public function admin_view($id = null) {
		$this->Sadr->id = $this->Sadr->Luhn_Verify($id);
		if (!$this->Sadr->exists()) {
			$this->Session->setFlash(__('Could not verify the suspected adverse drug report ID. Please ensure the ID is correct.'), 'flash_error');
			$this->redirect('/');
		}

		Configure::load('appwide');
		$this->set('root', Configure::read('Domain.root'));
		$this->set('sadr', $this->Sadr->read(null));
		$routes = $this->Sadr->SadrListOfDrug->Route->find('list');
		$this->set(compact('routes'));
		$frequency = $this->Sadr->SadrListOfDrug->Frequency->find('list');
		$this->set(compact('frequency'));
		$dose = $this->Sadr->SadrListOfDrug->Dose->find('list');
		$this->set(compact('dose'));
		$this->set('followups', $this->Sadr->SadrFollowup->find('count', array('conditions' => array('SadrFollowup.sadr_id' => $this->Sadr->id))));
		if ($this->RequestHandler->isXml()) {
			$this->response->download('SADR_'.date('Y_m_d_His'));
		}
	}

	public function admin_reply($id = null) {
		$this->Sadr->id = $this->Sadr->Luhn_Verify($id);
		if (!$this->Sadr->exists()) {
			$this->Session->setFlash(__('Could not verify the suspected adverse drug report ID. Please ensure the ID is correct.'), 'flash_error');
			$this->redirect('/');
		}
		Configure::load('appwide');
		$this->set('root', Configure::read('Domain.root'));
		$this->set('sadr', $this->Sadr->read(null));
		$this->Sadr->saveField('submitted', 1);
	}

	public function find() {
		$this->Sadr->id = $this->Sadr->Luhn_Verify($this->request->data['Sadr']['search']);
		if (!$this->Sadr->exists()) {
			$this->Session->setFlash(__('Could not verify the suspected adverse drug report ID. Please ensure the ID is correct.'), 'flash_error');
			$this->redirect(array('action' => 'add'));
		} else {
			$this->redirect(array('action' => 'view', $this->request->data['Sadr']['search']));
		}

	}

/**
 * download methods
 */
	public function download($id = null) {
		$this->Sadr->id = $id;
		if (!$this->Sadr->exists()) {
			$this->Session->setFlash(__('Could not verify the suspected adverse drug report ID. Please ensure the ID is correct.'), 'flash_error');
			$this->redirect(array('action' => 'add'));
		}
		$sadr = $this->Sadr->read(null);
		$sadr = Sanitize::clean($sadr, array('escape' => true));
		$this->set('sadr', $sadr);
		//if(!$sadr['Sadr']['vigiflow_id']) {
			$routes = $this->Sadr->SadrListOfDrug->Route->find('list');
			$this->set(compact('routes'));
			$frequency = $this->Sadr->SadrListOfDrug->Frequency->find('list');
			$this->set(compact('frequency'));
			$dose = $this->Sadr->SadrListOfDrug->Dose->find('list');
			$this->set(compact('dose'));
			if ($this->RequestHandler->isXml()) {
				$doseUnit = $this->Sadr->SadrListOfDrug->Dose->find('list', array('fields' => array('id', 'icsr_code')));
				$this->set(compact('doseUnit'));
				$routesMatch = $this->Sadr->SadrListOfDrug->Route->find('list', array('fields' => array('id', 'icsr_code')));
				$this->set(compact('routesMatch'));
				$this->Sadr->saveField('submitted', 3);
			}
			$this->response->download('SADR_'.$sadr['Sadr']['id']);
		//} else {
		//	$this->Session->setFlash(__('The report could not be exported to E2B. It is already linked with a vigiflow ID'), 'flash_error');
		//	$this->redirect($this->referer());
		//}
	}

/**
 * add method
 *
 * @return void
 */
	public function add($report = null) {
		$this->set('title_for_layout', 'New SADR');
		$response = array();
		if ($this->request->is('post') || $this->request->is('put')) {
			$this->Sadr->create();
			if (strpos($this->request->url,'xml') !== false) {
				//XML REQUEST
				// pr($this->request->data);
				$this->Sadr->set($this->request->data);
				unset($this->Sadr->validate['form_id']);
				// unset($this->Sadr->validate['list']);
				// unset($this->Sadr->SadrListOfDrug->validate);
				$this->beforeSaving();
				if ($this->Sadr->saveAssociated($this->request->data)) {
					$response['message'] = 'Thank you for submitting the report. A copy of the yellow form report has been sent to the email address you provided';
					$response['id'] = $this->Sadr->Luhn($this->Sadr->id);
					$this->set('message', $response);
				} else {
					$response['message'] = 'Sorry. We could not save your report. Please review the validation errors and resubmit.';
					$this->set('message', $response);
				}
				//XML REQUEST
			} else {
				$this->Sadr->set($this->request->data);
				if($this->Auth->user('id')) {
					$this->request->data['Sadr']['user_id'] = $this->Auth->user('id');
				}
				if ($this->request->data['Sadr']['report_type'] == 'Follow-up Report') {
					$fieldlist = array('device', 'report_type', 'emails', 'reporter_email', 'form_id');
				} else {
					$fieldlist = array('device', 'report_type', 'emails', 'reporter_email');
				}
				if ($this->Sadr->validates(array('fieldList' => $fieldlist)) && empty($this->data['Sadr']['bot_stop'])) {
					$device = 0;
					if($this->RequestHandler->isMobile()) {
						$device = 2; // Mobile web devices
						$this->request->data['Sadr']['device'] = 2; // Mobile web devices
					}
					if ($this->data['Sadr']['report_type'] == 'Follow-up Report')  {
						if ($this->SadrFollowup->save(
									array('SadrFollowup' => array('device' => $device, 'sadr_id' =>  $this->Sadr->Luhn_Verify($this->data['Sadr']['form_id']),
											'reporter_email' => $this->data['Sadr']['reporter_email']))
									, array('fieldList' =>  array('device', 'sadr_id', 'emails',  'reporter_email'))
								)
							)
						{
							$this->Session->setFlash(__('SADR Follow up form'), 'flash_success');
							$this->redirect(array('controller' => 'sadr_followups', 'action' => 'edit', $this->SadrFollowup->Luhn($this->SadrFollowup->id)));
						} else {
							$this->Session->setFlash(__('Hmm! Seems something went wrong! Please retry'), 'flash_error');
						}
					} else {
						if($this->Auth->user('id')) {
							$this->createSadr();
							$fieldlist = array('device', 'report_type',  'emails', 'reporter_email', 'user_id', 'county_id', 'designation_id', 'reporter_name', 'reporter_email',
											'name_of_institution', 'address', 'institution_code', 'contact', 'reporter_phone');
						}
                                                unset($this->Sadr->validate['county_id']);
						if($this->Sadr->save($this->request->data, array('fieldList' => $fieldlist))) {
							$this->Session->setFlash(__('Form for reporting suspected adverse drug reactions. Note the form ID. An email has been sent to the address you provided containing the report ID.'), 'flash_success');
							$this->redirect(array('action' => 'edit', $this->Sadr->Luhn($this->Sadr->id)));
						} else {
							$this->Session->setFlash(__('Hmm! Seems something went wrong!'), 'flash_error');
						}
					}
				} else {
					$response['message'] = 'Could not create Yellow form. Please ensure the data is correct.';
					$this->Session->setFlash(__($response['message']), 'flash_error');
				}
			}
		}
	}

    public function reporter_followup($id = null) {
        if ($this->request->is('post')) {
            $this->Sadr->id = $id;
            if (!$this->Sadr->exists()) {
                throw new NotFoundException(__('Invalid SADR'));
            }
            $sadr = Hash::remove($this->Sadr->find('first', array(
                        'contain' => array('SadrListOfDrug', 'SadrListOfMedicine'),
                        'conditions' => array('Sadr.id' => $id)
                        )
                    ), 'Sadr.id');

            $sadr = Hash::remove($sadr, 'SadrListOfDrug.{n}.id');
            $sadr = Hash::remove($sadr, 'SadrListOfMedicine.{n}.id');
            $data_save = $sadr['Sadr'];
            $data_save['SadrListOfDrug'] = $sadr['SadrListOfDrug'];
            if(isset($sadr['SadrListOfMedicine'])) $data_save['SadrListOfMedicine'] = $sadr['SadrListOfMedicine'];
            $data_save['sadr_id'] = $id;

            $count = $this->Sadr->find('count',  array('conditions' => array(
                        'Sadr.reference_no LIKE' => $sadr['Sadr']['reference_no'].'%',
                        )));
            $count = ($count < 10) ? "0$count" : $count;
            $data_save['reference_no'] = $sadr['Sadr']['reference_no'].'_F'.$count;
            $data_save['report_type'] = 'Followup';
            $data_save['submitted'] = 0;

            if ($this->Sadr->saveAssociated($data_save, array('deep' => true, 'validate' => false))) {
                    $this->Session->setFlash(__('Follow up '.$data_save['reference_no'].' has been created'), 'alerts/flash_info');
                    $this->redirect(array('action' => 'edit', $this->Sadr->id));               
            } else {
                $this->Session->setFlash(__('The followup could not be saved. Please, try again.'), 'alerts/flash_error');
                $this->redirect($this->referer());
            }
        }
    }

	public function reporter_add() {        
        $count = $this->Sadr->find('count',  array('conditions' => array(
            'Sadr.created BETWEEN ? and ?' => array(date("Y-01-01 00:00:00"), date("Y-m-d H:i:s")))));
        $count++;
        $count = ($count < 10) ? "0$count" : $count;
        $this->Sadr->create();
        $this->Sadr->save(['Sadr' => ['user_id' => $this->Auth->User('id'),  
        	'reference_no' => 'SADR/'.date('Y').'/'.$count,
        	'report_type' => 'Initial', 
        	'designation_id' => $this->Auth->User('designation_id'), 
        	'county_id' => $this->Auth->User('county_id'), 
        	'institution_code' => $this->Auth->User('institution_code'), 
        	'address' => $this->Auth->User('institution_address'),
        	'reporter_name' => $this->Auth->User('name'),
			'reporter_email' => $this->Auth->User('email'),
			'reporter_phone' => $this->Auth->User('phone_no'),
			'contact' => $this->Auth->User('institution_contact'),
			'name_of_institution' => $this->Auth->User('name_of_institution')
            ]], false);
        $this->Session->setFlash(__('The SADR has been created'), 'alerts/flash_success');
        $this->redirect(array('action' => 'edit', $this->Sadr->id));
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
        $this->set('title_for_layout', 'Edit Sadr '.$id);
		$this->Sadr->id = $this->Sadr->Luhn_Verify($id);
		if (!$this->Sadr->exists()) {
			// throw new NotFoundException(__('Invalid sadr'));
			$this->Session->setFlash(__('Could not verify the suspected adverse drug report ID. Please ensure the ID is correct.'), 'flash_error');
			$this->redirect(array('action' => 'add'));
		} else {
			$sadr = $this->Sadr->read(null);
			if ($sadr['Sadr']['submitted'] > 1) {
				$this->Session->setFlash(__('The Report has been sent to PPB. You don\'t have permissions to edit it further.'), 'flash_error');
				$this->redirect(array('action' => 'view', $id));
			}
		}
		// pr($this->Sadr);
		if ($this->request->is('post') || $this->request->is('put')) {
			if(!empty($this->request->data)) {
				if (isset($this->request->data['cancelReport'])) {
					$this->Session->setFlash(__('You have canceled a report'), 'flash_success');
					$this->redirect('/');
				}
				$this->beforeSaving();
				$validate = false;
				if (isset($this->request->data['submitReport'])) {	$validate = 'first';	}
				//Set Logged in user
				if($this->Auth->user('id')) {
					$this->request->data['Sadr']['user_id'] = $this->Auth->user('id');
				}
				if(isset($this->request->data['Attachment']) && !empty($this->request->data['Attachment'])) {
					foreach($this->request->data['Attachment'] as $attachment) {
						$dataToSave[]['Attachment'] = $attachment;
					}
				}
				if (isset($dataToSave) && !$this->Attachment->saveAll($dataToSave, array('validate' => 'only'))) {
					$this->beforeDisplaying();
					$this->Session->setFlash(__('The attachments you provided are invalid. Please review the error and resubmit.'), 'flash_error');
				} else {
					if ($this->Sadr->saveAssociated($this->request->data, array('validate' => $validate, 'deep' => true))) {
						if (!$this->request->is('ajax')) {
							if($validate == 'first') {
								$this->Sadr->saveField('submitted', 2);
								$this->Session->setFlash(__('Thank you for submitting the report.
								A copy of the yellow form report has been sent to the email address you provided'), 'flash_success');
								$this->redirect(array('action' => 'view', $this->Sadr->Luhn($this->Sadr->id)));
							} else {
								$this->Session->setFlash(__('The sadr has been saved'), 'flash_success');
								$this->redirect(array('action' => 'edit', $this->Sadr->Luhn($this->Sadr->id)));
							}
						} else {
							$this->set('message', 'phwesk!! finally some progress'.$id);
							$this->set('_serialize', 'message');
						}
					} else {
						$this->beforeDisplaying();
						// pr($this->request->data);
						// pr($this->validationErrors);
						$this->Session->setFlash(__('The report could not be saved. Please, review the fields marked in red.'), 'flash_error');
					}
				}
			} else {
				$this->Session->setFlash(__('The Report could not be saved. Please ensure the file size is less than 5MB'), 'flash_error');
				$this->redirect(array('action' => 'edit', $id));
			}
		} else {
			$this->request->data = $sadr;
		}

		// $this->set('attachments', $this->Sadr->Attachment->find('all', array('conditions'=> array('Attachment.sadr_id' => $sadr['Sadr']['id']))));
		// $this->set('attachments', $sadr['Attachment']);
		$counties = $this->Sadr->County->find('list', array('order' => array('County.county_name' => 'ASC')));
		$this->set(compact('counties'));
		$sub_counties = $this->Sadr->SubCounty->find('list', array('order' => array('SubCounty.sub_county_name' => 'ASC')));
		$this->set(compact('sub_counties'));
		$designations = $this->Sadr->Designation->find('list');
		$this->set(compact('designations'));
		$routes = $this->Sadr->SadrListOfDrug->Route->find('list');
		$this->set(compact('routes'));
		$frequency = $this->Sadr->SadrListOfDrug->Frequency->find('list');
		$this->set(compact('frequency'));
		$dose = $this->Sadr->SadrListOfDrug->Dose->find('list');
		$this->set(compact('dose'));
		$this->set('followups', $this->Sadr->SadrFollowup->find('count', array('conditions' => array('SadrFollowup.sadr_id' => $this->Sadr->id))));
	}

	public function reporter_edit($id = null) { 
        $this->Sadr->id = $id;
        if (!$this->Sadr->exists()) {
            throw new NotFoundException(__('Invalid SADR'));
        }
        $sadr = $this->Sadr->read(null, $id);
        if ($sadr['Sadr']['submitted'] > 1) {
                $this->Session->setFlash(__('The sae has been submitted'), 'alerts/flash_info');
                $this->redirect(array('action' => 'view', $this->Sadr->id));
        }
        if ($sadr['Sadr']['user_id'] !== $this->Auth->user('id')) {
                $this->Session->setFlash(__('You don\'t have permission to edit this SADR!!'), 'alerts/flash_error');
                $this->redirect(array('controller' => 'users', 'action' => 'dashboard'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            $validate = false;
            if (isset($this->request->data['submitReport'])) {
                $validate = 'first';                
            }
            if ($this->Sadr->saveAssociated($this->request->data, array('validate' => $validate, 'deep' => true))) {
                if (isset($this->request->data['submitReport'])) {
                    $this->Sadr->saveField('submitted', 2);
                    $sadr = $this->Sadr->read(null, $id);

                    //******************       Send Email and Notifications to Applicant and Managers          *****************************
                    $this->loadModel('Message');
                    $html = new HtmlHelper(new ThemeView());
                    $message = $this->Message->find('first', array('conditions' => array('name' => 'reporter_sadr_submit')));
                    $variables = array(
                      'name' => $this->Auth->User('name'), 'reference_no' => $sadr['Sadr']['reference_no'],
                      'reference_link' => $html->link($sadr['Sadr']['reference_no'], array('controller' => 'sadrs', 'action' => 'view', $sadr['Sadr']['id'], 'reporter' => true, 'full_base' => true), 
                        array('escape' => false)),
                      'modified' => $sadr['Sadr']['modified']
                      );
                    $datum = array(
                        'email' => $sadr['Sadr']['reporter_email'],
                        'id' => $id, 'user_id' => $this->Auth->User('id'), 'type' => 'reporter_sadr_submit', 'model' => 'Sadr',
                        'subject' => CakeText::insert($message['Message']['subject'], $variables),
                        'message' => CakeText::insert($message['Message']['content'], $variables)
                      );

                    $this->loadModel('Queue.QueuedTask');
					$this->QueuedTask->createJob('GenericEmail', $datum);
					$this->QueuedTask->createJob('GenericNotification', $datum);
                    
                    //Notify managers
                    $users = $this->Sadr->User->find('all', array(
                        'contain' => array(),
                        'conditions' => array('User.group_id' => 2)
                    ));
                    foreach ($users as $user) {
                      $variables = array(
                        'name' => $user['User']['name'], 'reference_no' => $sadr['Sadr']['reference_no'], 
                        'reference_link' => $html->link($sadr['Sadr']['reference_no'], array('controller' => 'saes', 'action' => 'view', $sadr['Sadr']['id'], 'manager' => true, 'full_base' => true), 
                          array('escape' => false)),
                        'modified' => $sadr['Sadr']['modified']
                      );
                      $datum = array(
                        'email' => $user['User']['email'],
                        'id' => $id, 'user_id' => $user['User']['id'], 'type' => 'reporter_sadr_submit', 'model' => 'Sadr',
                        'subject' => CakeText::insert($message['Message']['subject'], $variables),
                        'message' => CakeText::insert($message['Message']['content'], $variables)
                      );

					  $this->QueuedTask->createJob('GenericEmail', $datum);
					  $this->QueuedTask->createJob('GenericNotification', $datum);
                    }
                    //**********************************    END   *********************************

                    $this->Session->setFlash(__('The SADR has been submitted to PPB'), 'alerts/flash_success');
                    $this->redirect(array('action' => 'view', $this->Sadr->id));      
                }
                // debug($this->request->data);
                $this->Session->setFlash(__('The SADR has been saved'), 'alerts/flash_success');
                $this->redirect($this->referer());
            } else {
                $this->Session->setFlash(__('The SADR could not be saved. Please, try again.'), 'alerts/flash_error');
            }
        } else {
            $this->request->data = $this->Sadr->read(null, $id);
        }

        //$sadr = $this->request->data;

        $counties = $this->Sadr->County->find('list', array('order' => array('County.county_name' => 'ASC')));
		$this->set(compact('counties'));
		$sub_counties = $this->Sadr->SubCounty->find('list', array('order' => array('SubCounty.sub_county_name' => 'ASC')));
		$this->set(compact('sub_counties'));
		$designations = $this->Sadr->Designation->find('list');
		$this->set(compact('designations'));
		$routes = $this->Sadr->SadrListOfDrug->Route->find('list');
		$this->set(compact('routes'));
		$frequency = $this->Sadr->SadrListOfDrug->Frequency->find('list');
		$this->set(compact('frequency'));
		$dose = $this->Sadr->SadrListOfDrug->Dose->find('list');
		$this->set(compact('dose'));
    }

	public function admin_edit($id = null) {
        $this->set('title_for_layout', 'Edit Sadr '.$id);
		$this->Sadr->id = $this->Sadr->Luhn_Verify($id);
		if (!$this->Sadr->exists()) {
			// throw new NotFoundException(__('Invalid sadr'));
			$this->Session->setFlash(__('Could not verify the suspected adverse drug report ID. Please ensure the ID is correct.'), 'flash_error');
			$this->redirect(array('action' => 'index'));
		} else {
			$sadr = $this->Sadr->read(null);
		}
		// pr($this->Sadr);
		if ($this->request->is('post') || $this->request->is('put')) {
			if (isset($this->request->data['deleteReport'])) {
				$this->Session->setFlash(__('You have Deleted a report'), 'flash_success');
				$this->redirect(array('action' => 'index'));
			}
			$this->beforeSaving();
			$validate = 'first';
			//Set Logged in user
			if($this->Auth->user('id')) {
				$this->request->data['Sadr']['user_id'] = $this->Auth->user('id');
			}
			// pr($this->data);
			if ($this->Sadr->saveAssociated($this->request->data, array('validate' => $validate))) {
				if (!$this->request->is('ajax')) {
					$this->Session->setFlash(__('You have successfully saved the report'), 'flash_success');
					$this->redirect(array('action' => 'edit', $this->Sadr->Luhn($this->Sadr->id)));
				} else {
					$this->set('message', 'phwesk!! finally some progress'.$id);
					$this->set('_serialize', 'message');
				}
			} else {
				$this->beforeDisplaying();
				$this->Session->setFlash(__('The report could not be saved. Please, review the fields marked in red.'), 'flash_error');
			}
		} else {
			// $this->request->data = $this->Sadr->read(null);
			$this->request->data = $sadr;
		}

		// $this->set('attachments', $this->Sadr->Attachment->find('all', array('conditions'=> array('Attachment.sadr_id' => $sadr['Sadr']['id']))));
		$this->set('attachments', $sadr['Attachment']);
		$counties = $this->Sadr->County->find('list', array('order' => array('County.county_name' => 'ASC')));
		$this->set(compact('counties'));
		$sub_counties = $this->Sadr->SubCounty->find('list', array('order' => array('SubCounty.sub_county_name' => 'ASC')));
		$this->set(compact('sub_counties'));
		$designations = $this->Sadr->Designation->find('list');
		$this->set(compact('designations'));
		$routes = $this->Sadr->SadrListOfDrug->Route->find('list');
		$this->set(compact('routes'));
		$frequency = $this->Sadr->SadrListOfDrug->Frequency->find('list');
		$this->set(compact('frequency'));
		$dose = $this->Sadr->SadrListOfDrug->Dose->find('list');
		$this->set(compact('dose'));
		$this->set('followups', $this->Sadr->SadrFollowup->find('count', array('conditions' => array('SadrFollowup.sadr_id' => $this->Sadr->id))));
	}
/**
 * delete method
 *
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Sadr->id = $this->Sadr->Luhn_Verify($id);
		if (!$this->Sadr->exists()) {
			$this->Session->setFlash(__('Could not verify the suspected adverse drug report ID. Please ensure the ID is correct.'), 'flash_error');
			$this->redirect(array('action' => 'index'));
		}
		if ($this->Sadr->deactivate($this->Sadr->id)) {
			$this->Session->setFlash(__('Sadr deleted'), 'flash_success');
			$this->redirect($this->referer());
		}
		$this->Session->setFlash(__('Sadr was not deleted'), 'flash_error');
		$this->redirect(array('action' => 'index'));
	}

	public function admin_archive($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Sadr->id = $this->Sadr->Luhn_Verify($id);
		if (!$this->Sadr->exists()) {
			$this->Session->setFlash(__('Could not verify the suspected adverse drug report ID. Please ensure the ID is correct.'), 'flash_error');
			$this->redirect(array('action' => 'index'));
		}
		if ($this->Sadr->saveField('submitted', 6)) {
			$this->Session->setFlash(__('The report has been Archived. You can view it in the Archived List'), 'flash_success');
			$this->redirect($this->referer());
		}
		$this->Session->setFlash(__('Sadr was not Archived'));
		$this->redirect(array('action' => 'index'));
	}

	/**
	**			Utility functions here
	**/

	public function createSadr() {
		if($this->Auth->User('id')) {
			$this->request->data['Sadr']['user_id'] = $this->Auth->User('id');
			$this->request->data['Sadr']['designation_id'] = $this->Auth->User('designation_id');
			$this->request->data['Sadr']['county_id'] = $this->Auth->User('county_id');
			$this->request->data['Sadr']['reporter_name'] = $this->Auth->User('name');
			// $this->request->data['Sadr']['reporter_email'] = $this->Auth->User('email');
			$this->request->data['Sadr']['name_of_institution'] = $this->Auth->User('name_of_institution');
			$this->request->data['Sadr']['address'] = $this->Auth->User('institution_address');
			$this->request->data['Sadr']['institution_code'] = $this->Auth->User('institution_code');
			$this->request->data['Sadr']['contact'] = $this->Auth->User('institution_contact');
			$this->request->data['Sadr']['reporter_phone'] = $this->Auth->User('phone_no');
		}
	}
}
