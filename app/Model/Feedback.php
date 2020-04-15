<?php
App::uses('AppModel', 'Model');
/**
 * Feedback Model
 *
 * @property User $User
 * @property Sadr $Sadr
 */
class Feedback extends AppModel {

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	public $useTable = 'feedbacks';
    public $actsAs = array('Search.Searchable');
	public $filterArgs = array(
        array('name' => 'feedback', 'type' => 'query', 'method' => 'orConditions', 'encode' => true),
		array('name' => 'range', 'type' => 'expression', 'method' => 'makeRangeCondition', 'field' => 'Feedback.created BETWEEN ? AND ?'),
    );

	 // public $filterArgs = array(
  //               'filter' => array('type' => 'query', 'method' => 'orConditions', 'encode' => true),
  //           );
        public function orConditions($data = array()) {
            $filter = $data['feedback'];
            $cond = array(
                'OR' => array(
                    $this->alias . '.feedback LIKE' => '%' . $filter . '%',
                    $this->alias . '.email LIKE' => '%' . $filter . '%',
                ));
            return $cond;
        }

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
	public $displayField = 'feedback';
	public $belongsTo = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
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
		)
	);

	public $validate = array(
        'feedback' => array(
	      'notempty' => array(
	        'rule' => array('notempty'),
	        'message' => 'Message required',
	      )
	  )
      );
}
