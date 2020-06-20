<?php
App::uses('AppController', 'Controller');
/**
 * Attachments Controller
 *
 * @property Attachment $Attachment
 */
class AttachmentsController extends AppController {

	public $components = array('Search.Prg');
	public $paginate = array();
    public $presetVars = array(
        array('field' => 'basename', 'type' => 'value'),
        array('field' => 'start_date', 'type' => 'value'),
        array('field' => 'end_date', 'type' => 'value'),
    );

	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('download','delete');
	}
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Attachment->recursive = 0;
		$this->set('attachments', $this->paginate());
	}

	public function admin_index() {
        $this->Prg->commonProcess();
		if (!empty($this->passedArgs['start_date']) || !empty($this->passedArgs['end_date'])) $this->passedArgs['range'] = true;
		if (isset($this->passedArgs['pages']) && !empty($this->passedArgs['pages'])) $this->paginate['limit'] = $this->passedArgs['pages'];
        else $this->paginate['limit'] = 20;
		$criteria = $this->Attachment->parseCriteria($this->passedArgs);
        $this->paginate['conditions'] = $criteria;
        $this->paginate['order'] = array('Attachment.created' => 'desc');
 		$this->Attachment->recursive = -1;
		$this->set('attachments', $this->beforeDisplay($this->paginate()));
    }
	
/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Attachment->id = $id;
		if (!$this->Attachment->exists()) {
			throw new NotFoundException(__('Invalid attachment'));
		}
		$this->set('attachment', $this->Attachment->read(null, $id));
	}
	
	public function download($id = null) {
		$this->viewClass = 'Media';
		$this->Attachment->id = $id;
		if (!$this->Attachment->exists()) {
			// throw new NotFoundException(__('Invalid attachment'));
			$this->Session->setFlash(__('The requested file does not exist!.'), 'flash_error');
			$this->redirect($this->referer());
		} else { 
			$attachment = $this->Attachment->read(null, $id);
			// Render app/webroot/files/example.docx
			$params = array(
				'id'        => $attachment['Attachment']['basename'],
				// 'name'      => 'example',
				// 'extension' => 'docx',
				'download'  => true,
				'path'      => 'media'. DS .'transfer'. DS .$attachment['Attachment']['dirname'] . DS
			);
			$this->set($params);
		}
	}
	
	public function admin_download($id = null) {
		$this->viewClass = 'Media';
		$this->Attachment->id = $id;
		if (!$this->Attachment->exists()) {
			// throw new NotFoundException(__('Invalid attachment'));
			$this->Session->setFlash(__('The requested file does not exist!.'), 'flash_error');
			$this->redirect($this->referer());
		} else { 
			try{
				$attachment = $this->Attachment->read(null, $id);
				// Render app/webroot/files/example.docx
				$params = array(
					'id'        => $attachment['Attachment']['basename'],
					// 'name'      => 'example',
					// 'extension' => 'docx',
					'download'  => true,
					'path'      => 'media'. DS .'transfer'. DS .$attachment['Attachment']['dirname'] . DS
				);
				$this->set($params);
			} catch(Exception $e) {
				$this->Session->setFlash(__('The requested file does not exist!.'), 'flash_error');
				$this->redirect($this->referer());
			}
		}
	}
/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Attachment->create();
			if ($this->Attachment->save($this->request->data)) {
				$this->Session->setFlash(__('The attachment has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The attachment could not be saved. Please, try again.'));
			}
		}
		$sadrs = $this->Attachment->Sadr->find('list');
		$pqmps = $this->Attachment->Pqmp->find('list');
		$this->set(compact('sadrs', 'pqmps'));
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Attachment->id = $id;
		if (!$this->Attachment->exists()) {
			throw new NotFoundException(__('Invalid attachment'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Attachment->save($this->request->data)) {
				$this->Session->setFlash(__('The attachment has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The attachment could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Attachment->read(null, $id);
		}
		$sadrs = $this->Attachment->Sadr->find('list');
		$pqmps = $this->Attachment->Pqmp->find('list');
		$this->set(compact('sadrs', 'pqmps'));
	}

/**
 * delete method
 *
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		if($id) {
			$this->Attachment->id = $id;
		} else {
			$this->Attachment->id = $this->data['id'];		
		}
		if (!$this->Attachment->exists()) {
			throw new NotFoundException(__('Invalid attachment'));
		}
		if ($this->Attachment->delete()) {
			if (!$this->request->is('ajax')) {
				$this->Session->setFlash(__('Attachment deleted'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->set('message', 'phwesk!! finally some progress');
				$this->set('_serialize', 'message');
			}
		} else {
			$this->Session->setFlash(__('Attachment was not deleted'));
			$this->redirect(array('action' => 'index'));
		}
	}
	
	function beforeDisplay($results) {
		foreach ($results as $key => $val) {
			if (isset($val['Attachment']['id'])) {
				$results[$key]['Attachment']['id'] = $this->Attachment->Luhn($val['Attachment']['id']);
			}
			if (isset($val['Attachment']['sadr_id'])) {
				$results[$key]['Attachment']['sadr_id'] = $this->Attachment->Luhn($val['Attachment']['sadr_id']);
			}
			if (isset($val['Attachment']['pqmp_id'])) {
				$results[$key]['Attachment']['pqmp_id'] = $this->Attachment->Luhn($val['Attachment']['pqmp_id']);
			}			
		}		
		return $results;
	}
}
