<?php
App::uses('AppModel', 'Model');
App::uses('AuthComponent', 'Controller/Component');
/**
 * User Model
 *
 * @property Group $Group
 * @property Pqmp $Pqmp
 * @property Sadr $Sadr
 */
class User extends AppModel {
/**
 * Validation rules
 *
 * @var array
 */

	public $name = 'User';
    public $actsAs = array('Acl' => array('type' => 'requester'), 'Search.Searchable');
	public $filterArgs = array(
        array('name' => 'username', 'type' => 'like'),
        array('name' => 'name', 'type' => 'like'),
        array('name' => 'email', 'type' => 'like'),
		array('name' => 'range', 'type' => 'expression', 'method' => 'makeRangeCondition', 'field' => 'User.created BETWEEN ? AND ?'),
    );

	public function makeRangeCondition($data = array()) {
		if(!empty($data['start_date'])) $start_date = date('Y-m-d', strtotime($data['start_date']));
		else $start_date = date('Y-m-d', strtotime('2012-05-01'));

		if(!empty($data['end_date'])) $end_date = date('Y-m-d', strtotime($data['end_date']));
		else $end_date = date('Y-m-d');

		return array($start_date, $end_date);
	}

	public $validate = array(
              'username' => array(
                'notempty' => array(
                  'rule' => array('notempty'),
                  'message' => 'Username required',
                  //'allowEmpty' => false,
                  //'required' => false,
                  //'last' => false, // Stop validation after this rule
                  //'on' => 'create', // Limit validation to 'create' or 'update' operations
                ),
                'unique' => array(
                  'rule' => 'isUnique',
                  'required' => 'create',
                  'message' => 'The username is already in use. Please specify a different username'
                ),
              ),
		'name' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Your name or alias is required'
			)
		),
		'email' => array(
            'notEmpty' => array(
                'rule'     => 'email',
                'required' => true,
                'message'  => 'Please provide a valid email address'
            ),
			'unique' => array(
				'rule' => 'isUnique',
				'required' => 'create',
				'message' => 'The email is already in use. Please specify a different email'
			),
        ),
		'old_password' => array(
			'compareOldPasswords' => array(
				'rule' => array('compareOldPasswords'),
				'message' => 'This password does not match the old password',
				'allowEmpty' => true,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'password' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Password cannot be empty!',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'confirm_password' => array(
            'minLength' => array(
                'rule' => array('minLength', '6'),
                'required' => true,
				'message' => 'Your password must be at least 6 characters long',
            ),
            'notEmpty' => array(
                'rule' => 'notEmpty',
                'message' => 'Cannot be empty'
            ),
            'comparePasswords' => array(
                'rule' => 'comparePasswords' ,// Protected function below
				'message' => 'Passwords do not match',
            ),
        ),
		'group_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Group' => array(
			'className' => 'Group',
			'foreignKey' => 'group_id',
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
		),
		'County' => array(
			'className' => 'County',
			'foreignKey' => 'county_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
	);

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Pqmp' => array(
			'className' => 'Pqmp',
			'foreignKey' => 'user_id',
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
		'Sadr' => array(
			'className' => 'Sadr',
			'foreignKey' => 'user_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

	// public function beforeSave() {
        // $this->data['User']['password'] = AuthComponent::password($this->data['User']['password']);
        // return true;
    // }

	protected function comparePasswords($field = null){
		// pr(Security::hash($field['confirm_password'], null, true));
		// pr(AuthComponent::password($this->data['User']['password']));
		// pr($field['confirm_password']);
		// pr($this->data['User']);
		// pr($this->data['User']['password']);
        return ($field['confirm_password'] === $this->data['User']['password']);
    }
	protected function compareOldPasswords($field = null){
		if (isset($field['old_password'])) {
			// pr(AuthComponent::password($field['old_password']));
			$a = $this->find('first', array('conditions' => array('User.id' => $this->data['User']['id']), 'recursive' => -1, 'fields' => 'User.password'));
			return (AuthComponent::password($field['old_password']) === $a['User']['password']);
		}
		return true;
    }

	public function beforeSave($options = array()) {
		if (isset($this->data[$this->alias]['password'])) {
			$this->data[$this->alias]['password'] = AuthComponent::password($this->data[$this->alias]['password']);
		}
		if (isset($this->data[$this->alias]['confirm_password'])) {
			$this->data[$this->alias]['confirm_password'] = AuthComponent::password($this->data[$this->alias]['confirm_password']);
		}
		return true;
	}

    public function parentNode() {
        if (!$this->id && empty($this->data)) {
            return null;
        }
        if (isset($this->data['User']['group_id'])) {
            $groupId = $this->data['User']['group_id'];
        } else {
            $groupId = $this->field('group_id');
        }
        if (!$groupId) {
            return null;
        } else {
            return array('Group' => array('id' => $groupId));
        }
    }


	function sendForgotEmail() {
		$users = $this->find('list', array(
				'fields' => array('User.id', 'User.email'),
				'conditions' => array('User.forgot_password' => 1),
				'recursive' => -1
			));
		Configure::load('appwide');
		$email = new CakeEmail();
		foreach ($users as $key => $val) {
			$this->id = $key;
			$this->saveField('forgot_password', 2);
			$email->config('gmail');
			$email->template('forgot_password');
			$email->emailFormat('html');
			$email->from(array('demo@demo.intellisoftkenya.com' => 'The Pharmacy and Poisons Board'));
			$email->to($val);
			$email->subject('Change of password request');
			$email->viewVars(array('ID' => $this->Luhn($this->id, 7), 'root' => Configure::read('Domain.root')));
			$email->send();
		}
	}

}
