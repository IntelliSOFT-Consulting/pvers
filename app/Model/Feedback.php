<?php
App::uses('AppModel', 'Model');
/**
 * Feedback Model
 *
 * @property User $User
 */
class Feedback extends AppModel {
	public $useTable = 'feedbacks';
	public $actsAs = array('Containable', 'Search.Searchable');
    public $filterArgs = array(
            'name' => array('type' => 'query', 'method' => 'findByName', 'field' => 'Feedback.user_id'),
            'subject' => array('type' => 'like', 'encode' => true),
            'feedback' => array('type' => 'like', 'encode' => true),
        );

    public function findByName($data = array()) {
       		$cond = array($this->alias.'.user_id' => $this->User->find('list', array(
                'conditions' => array(
                    'OR' => array(
                        'User.name LIKE' => '%' . $data['name'] . '%',
                        'User.email LIKE' => '%' . $data['name'] . '%',
                        'User.email LIKE' => '%' . $data['name'] . '%', )),
                'fields' => array('id', 'id')
                    )));
            return $cond;
    }
	//The Associations below have been created with all possible keys, those that are not needed can be removed

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
		)
	);

	public $hasMany = array(
    	'Reply' => array(
            'className' => 'Feedback',
            'foreignKey' => 'foreign_key',
            'dependent' => true,
            // 'conditions' => array('Attachment.model' => 'Application', 'Attachment.group' => 'attachment'),
                                   // 'className' => 'Feedback',
                                   // 'foreignKey' => 'application_id',
                                   // 'dependent' => false,
                      )
        );

	public $validate = array(
	'email' => array(
            'notBlank' => array(
                'rule'     => 'email',
                'required' => true,
                'message'  => 'Please provide a valid email address'
            ),
        ),
	'subject' => array(
	      'notblank' => array(
	        'rule' => array('notblank'),
	        'message' => 'Subject cannot be empty!',
	      ),
	    ),
	'feedback' => array(
	      'notblank' => array(
	        'rule' => array('notblank'),
	        'message' => 'Message body cannot be empty!',
	      ),
	    ),
	 );
}
