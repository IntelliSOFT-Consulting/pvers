<?php
App::uses('AppModel', 'Model');
/**
 * SadrsFollowup Model
 *
 * @property User $User
 * @property County $County
 * @property Sadr $Sadr
 * @property Designation $Designation
 */
class SadrFollowup extends AppModel {

	//The Associations below have been created with all possible keys, those that are not needed can be removed
    public $actsAs = array('Search.Searchable');
	public $filterArgs = array(
        array('name' => 'description_of_reaction', 'type' => 'like'),
        array('name' => 'submitted', 'type' => 'value'),
        array('name' => 'device', 'type' => 'value'),
        array('name' => 'sadr_id', 'type' => 'like'),
        array('name' => 'id', 'type' => 'like'),
		array('name' => 'range', 'type' => 'expression', 'method' => 'makeRangeCondition', 'field' => 'SadrFollowup.created BETWEEN ? AND ?'),
    );

	public function makeRangeCondition($data = array()) {
		if(!empty($data['start_date'])) $start_date = date('Y-m-d', strtotime($data['start_date']));
		else $start_date = date('Y-m-d', strtotime('2012-05-01'));

		if(!empty($data['end_date'])) $end_date = date('Y-m-d', strtotime($data['end_date']));
		else $end_date = date('Y-m-d');

		return array($start_date, $end_date);
	}

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'County' => array(
			'className' => 'County',
			'foreignKey' => 'county_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Sadr' => array(
			'className' => 'Sadr',
			'foreignKey' => 'sadr_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Designation' => array(
			'className' => 'Designation',
			'foreignKey' => 'designation_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);


/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Attachment' => array(
			'className' => 'Attachment',
			'foreignKey' => 'sadr_followup_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'SadrListOfDrug' => array(
			'className' => 'SadrListOfDrug',
			'foreignKey' => 'sadr_followup_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
	);

	public $validate = array(
		'description_of_reaction' => array(
            'notBlank' => array(
                'rule'     => 'notBlank',
                'required' => true,
                'message'  => 'Please provide a brief description of the reaction'
            ),
        ),
		'sadr_id' => array(
            'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Please provide the initial sadr report id',
				//'allowEmpty' => false,
				'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			// 'sadrIdExists' => array(
                // 'rule'     => 'sadrIdExists',
                // 'required' => false,
				// 'on'       => 'create',
                // 'message'  => 'The Unique form ID provided does not exist.'
            // ),
        ),
		'reporter_email' => array(
            'notBlank' => array(
                'rule'     => 'email',
                'required' => true,
                'message'  => 'Please provide a valid email address',
				'on' => 'create',
            ),
        ),
	);

	// protected function sadrIdExists($field = null) {
		// if (isset($field['sadr_id']) && $this->Luhn_Verify($field['sadr_id'])) $field['sadr_id'] = $this->Luhn_Verify($field['sadr_id']);
		// $sadr = $this->find('first', array('conditions' => array('Sadr.id' => $field['sadr_id'])));
		// if($sadr) {
			// $this->data['SadrFollowup']['reporter_email'] = $sadr['Sadr']['reporter_email'];
			// return true;
		// }
		// return false;
	// }

	function afterFind($results, $primary = false) {
		foreach ($results as $key => $val) {
			if (isset($val['SadrFollowup']['id'])) {
				$results[$key]['SadrFollowup']['id'] = $this->Luhn($val['SadrFollowup']['id']);
			}

			if (isset($val['SadrFollowup']['sadr_id'])) {
				$results[$key]['SadrFollowup']['sadr_id'] = $this->Luhn($val['SadrFollowup']['sadr_id']);
			}

			if (isset($val['SadrListOfDrug'])) {
				foreach ($val['SadrListOfDrug'] as $kay => $vall) {
					if (isset($vall['id'])) {
						$results[$key]['SadrListOfDrug'][$kay]['id'] = $this->Luhn($vall['id']);
					}
					if (isset($vall['start_date'])) {
						$results[$key]['SadrListOfDrug'][$kay]['start_date'] = $this->dateFormatAfterFind($vall['start_date']);
					}
					if (isset($vall['stop_date'])) {
						$results[$key]['SadrListOfDrug'][$kay]['stop_date'] = $this->dateFormatAfterFind($vall['stop_date']);
					}
				}
			}
			if (isset($val['Attachment'])) {
				foreach ($val['Attachment'] as $kay => $vall) {
					if (isset($vall['id'])) {
						$results[$key]['Attachment'][$kay]['id'] = $this->Luhn($vall['id']);
					}
				}
			}
		}
		return $results;
	}


	function sendEmail() {
		Configure::load('appwide');
		$followups = $this->find('list', array(
				'fields' => array('SadrFollowup.id', 'SadrFollowup.reporter_email'),
				'conditions' => array('SadrFollowup.emails' => 0),
				'limit' => Configure::read('Emails.limit'),
				'recursive' => -1
			));
		$email = new CakeEmail();
		foreach ($followups as $key => $val) {
			$this->id = $this->Luhn_Verify($key);
			if($this->saveField('emails', 1)){
				$email->config('gmail');
				$email->template('new_sadr_followup');
				$email->emailFormat('html');
				$email->to($val);
				$email->cc(array('pv@pharmacyboardkenya.org', 'info@pharmacyboardkenya.org'));
				$email->subject(Configure::read('Emails.new_sadrfollowup.subject').$key);
				$email->viewVars(array('ID' => $key, 'root' => Configure::read('Domain.root')));
				if(!$email->send()) {
					$this->log($email, 'debug');
				}
			}
		}
	}

	function sendSubmitEmail() {
		Configure::load('appwide');
		$followups = $this->find('list', array(
				'fields' => array('SadrFollowup.id', 'SadrFollowup.reporter_email'),
				'conditions' => array('SadrFollowup.emails' => 1, 'SadrFollowup.submitted' => array(1,2)),
				'limit' => Configure::read('Emails.limit'),
				'recursive' => -1
			));
		$email = new CakeEmail();
		foreach ($followups as $key => $val) {
			$this->id = $this->Luhn_Verify($key);
			if($this->saveField('emails', 2)) {
				$email->config('gmail');
				$email->template('submitted_sadr_followup');
				$email->emailFormat('html');
				$email->to($val);
				$email->cc(array('pv@pharmacyboardkenya.org', 'info@pharmacyboardkenya.org'));
				$email->subject(Configure::read('Emails.submitted_sadrfollowup.subject').$key);
				$email->viewVars(array('ID' => $key, 'root' => Configure::read('Domain.root')));
				if(!$email->send()) {
					$this->log($email, 'debug');
				}
			}
		}
	}

	function sendNotifyEmail() {
		Configure::load('appwide');
		$sadrs = $this->find('all', array(
				'fields' => array('SadrFollowup.id', 'SadrFollowup.reporter_email', 'SadrFollowup.notified'),
				'conditions' => array('SadrFollowup.notified <' => 2, 'SadrFollowup.submitted' => 0, 'SadrFollowup.modified <' => date("Y-m-d H:i:s", strtotime("-1 day"))),
				'recursive' => -1
			));
		$email = new CakeEmail();
		foreach ($sadrs as $sadr) {
			$this->id = $this->Luhn_Verify($sadr['SadrFollowup']['id']);
			if($this->saveField('notified', $sadr['SadrFollowup']['notified'] + 1)){
				$email->config('gmail');
				$email->template('notify_sadrfollowup');
				$email->emailFormat('html');
				$email->to($sadr['SadrFollowup']['reporter_email']);
				$email->subject(Configure::read('Emails.notify_sadrfollowup.subject').$sadr['SadrFollowup']['id']);
				$email->viewVars(array('ID' => $sadr['SadrFollowup']['id'], 'root' => Configure::read('Domain.root')));
				if(!$email->send()){
					$this->log($email, 'debug');
				}
			}
		}
	}

}
