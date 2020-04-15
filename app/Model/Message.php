<?php
App::uses('AppModel', 'Model');
App::uses('CakeEmail', 'Network/Email');
/**
 * Message Model
 *
 * @property Sadr $Sadr
 * @property Pqmp $Pqmp
 * @property SadrFollowup $SadrFollowup
 */
class Message extends AppModel {

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Sadr' => array(
			'className' => 'Sadr',
			'foreignKey' => 'sadr_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Pqmp' => array(
			'className' => 'Pqmp',
			'foreignKey' => 'pqmp_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'SadrFollowup' => array(
			'className' => 'SadrFollowup',
			'foreignKey' => 'sadr_followup_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
	
	public $validate = array(
		'receiver' => array(
            'notEmpty' => array(
                'rule'     => 'email',
                'required' => true,
                'message'  => 'Please provide a valid email address'
            ),
        ),
	);
	
	function sendAllReportsEmail() {
		Configure::load('appwide');
		$messages = $this->find('all', array(
				'fields' => array('Message.id', 'Message.receiver'),
				'conditions' => array('Message.sent' => 2),
				'limit' => Configure::read('Emails.limit'),
				'recursive' => -1
			));
		$Sadr = ClassRegistry::init('Sadr'); 
		$Pqmp = ClassRegistry::init('Pqmp'); 
		$limit = Configure::read('Reports.limit');
		
		$email = new CakeEmail();
		$email->config('gmail');
		
		foreach ($messages as $message) {
			$this->id = $message['Message']['id'];
			$this->saveField('sent', 3);
			$sadrs = $Sadr->find('all', array(
				'fields' => array('Sadr.id', 'Sadr.report_title', 'Sadr.created'),
				'conditions' => array('Sadr.reporter_email' => $message['Message']['receiver']),
				'recursive' => 0,
			));
			$pqmps = $Pqmp->find('all', array(
				'fields' => array('Pqmp.id', 'Pqmp.brand_name', 'Pqmp.created'),
				'conditions' => array('Pqmp.reporter_email' => $message['Message']['receiver']),
				'recursive' => -1,
			));
			 
						
			$email->template('all_sadrs');
			$email->emailFormat('html');
			$email->to($message['Message']['receiver']);
			$email->subject(Configure::read('Reports.all_sadr.subject').count($sadrs));
			$email->viewVars(array('email' => $message['Message']['receiver'], 'root' => Configure::read('Domain.root'), 'sadrs' => $sadrs));
			if(!$email->send()) {
				$this->log($email, 'debug');
			}
							
			$email->template('all_pqmps');
			$email->emailFormat('html');
			$email->to($message['Message']['receiver']);
			$email->subject(Configure::read('Reports.all_pqmp.subject').count($pqmps));
			$email->viewVars(array('email' => $message['Message']['receiver'], 'root' => Configure::read('Domain.root'), 'pqmps' => $pqmps));
			if(!$email->send()) {
				$this->log($email, 'debug');
			}
		}
	}
	
	function sendEmail() {
		Configure::load('appwide');
		$messages = $this->find('all', array(
				// 'fields' => array('Message.id', 'Message.receiver'),
				'conditions' => array('Message.sent' => 0),
				'limit' => Configure::read('Emails.limit'),
				'recursive' => -1
			));
		$email = new CakeEmail();
		$email->config('gmail');
		foreach ($messages as $message) {
			$this->id = $message['Message']['id'];
			if ($this->saveField('sent', 1)){
				$email->emailFormat('html');
				$email->to($message['Message']['receiver']);
				$email->subject($message['Message']['subject']);
				if(!$email->send($message['Message']['message'])) {
					$this->log($email, 'debug');
				}
			}
		}
	}
	
}
