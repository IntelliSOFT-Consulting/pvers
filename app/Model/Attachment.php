<?php
App::uses('AppModel', 'Model');
/**
 * Attachment Model
 *
 * @property Sadr $Sadr
 * @property Pqmp $Pqmp
 */
class Attachment extends AppModel {

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
    var $name = 'Attachment';
	var $actsAs = array('Media.Transfer', 'Media.Coupler', 'Media.Meta', 'Search.Searchable');
	public $filterArgs = array(
        array('name' => 'basename', 'type' => 'like'),
		array('name' => 'range', 'type' => 'expression', 'method' => 'makeRangeCondition', 'field' => 'Attachment.created BETWEEN ? AND ?'),
    );
	
	public function makeRangeCondition($data = array()) {
		if(!empty($data['start_date'])) $start_date = date('Y-m-d', strtotime($data['start_date']));
		else $start_date = date('Y-m-d', strtotime('2012-05-01'));
		
		if(!empty($data['end_date'])) $end_date = date('Y-m-d', strtotime($data['end_date']));
		else $end_date = date('Y-m-d');
		
		return array($start_date, $end_date);
	}
		
	
	/*var $validate = array(
		'file' => array(
			'resource'   => array(
				'rule' => 'checkResource',
				'allowEmpty' => false,
				'message' => 'Please upload a file!'
			),
			'access'     => array('rule' => 'checkAccess'),
			'permission' => array('rule' => array('checkPermission', '*')),
			'size'       => array('rule' => array('checkSize', '5M')),
			'pixels'     => array(
				'rule' => array('checkPixels', '1600x1600'),
				'message' => 'The photo you have uploaded is too large. Resize the photo to within 640x480 pixels. Refer to the help section below on how to resize.'
			)
		)
	);*/
	var $validate = array(
		'file' => array(
			// 'resource'   => array('rule' => 'checkResource'),
			'resource'   => array(
				'rule' => 'checkResource',
				'allowEmpty' => false,
				'message' => 'Please attach a file!'
			),
			'access'     => array('rule' => 'checkAccess'),
			// 'location'   => array('rule' => array('checkLocation', array(
				// MEDIA_TRANSFER, '/tmp/'
			// ))),
			'permission' => array('rule' => array('checkPermission', '*')),
			'size'       => array('rule' => array('checkSize', '5M')),
			// 'pixels'     => array('rule' => array('checkPixels', '1600x1600')),  // removed image restriction
			// 'extension'  => array('rule' => array('checkExtension', false, array(
				// 'jpg', 'jpeg', 'png', 'tif', 'tiff', 'gif', 'pdf', 'tmp'
			// ))),
			// 'mimeType'   => array('rule' => array('checkMimeType', false, array(
			// 	'image/jpeg', 'image/png', 'image/tiff', 'image/gif', 'application/pdf'	)))
		),
		'alternative' => array(
			'rule'       => 'checkRepresent',
			'on'         => 'create',
			'required'   => false,
			'allowEmpty' => true,
		));
	
	// function afterFind($results) {
		// foreach ($results as $key => $val) {
			// if (isset($val['Attachment']['id'])) {
				// $results[$key]['Attachment']['id'] = $this->Luhn($val['Attachment']['id']);
			// }
			// if (isset($val['Attachment']['sadr_id'])) {
				// $results[$key]['Attachment']['sadr_id'] = $this->Luhn($val['Attachment']['sadr_id']);
			// }
			// if (isset($val['Attachment']['pqmp_id'])) {
				// $results[$key]['Attachment']['pqmp_id'] = $this->Luhn($val['Attachment']['pqmp_id']);
			// }			
		// }		
		// return $results;
	// }
}
