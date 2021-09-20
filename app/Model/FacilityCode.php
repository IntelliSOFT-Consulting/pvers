<?php
App::uses('AppModel', 'Model');
/**
 * FacilityCode Model
 *
 */
class FacilityCode extends AppModel {
	public $actsAs = array('Search.Searchable');
	public $filterArgs = array(
        array('name' => 'facility_code', 'type' => 'value'),
        array('name' => 'facility_name', 'type' => 'like'),
    );
	
	
	public function finder($query, $type) {
		if (($suggestions = Cache::read($query, 'facs')) === false) {
			if($type == 'N') {
				$suggestions = $this->find('all', array(
					'fields' =>  array('FacilityCode.facility_code', 'FacilityCode.facility_name' ,  'FacilityCode.official_address', 'FacilityCode.official_mobile', 'FacilityCode.district', 'FacilityCode.county' ),
					'conditions' => array('FacilityCode.facility_code LIKE' => '%'.$query.'%'),
					'limit' => 10,
					'recursive' => -1
				));
			} else {
				$suggestions = $this->find('all', array(
					'fields' =>  array('FacilityCode.facility_code', 'FacilityCode.facility_name' ,  'FacilityCode.official_address',  'FacilityCode.official_mobile', 'FacilityCode.district', 'FacilityCode.county' ),
					'conditions' => array('FacilityCode.facility_name LIKE' => '%'.$query.'%'),
					'limit' => 10,
					'recursive' => -1
				));
			}
			Cache::write($query, $suggestions, 'facs');
		}
		return $suggestions;
    }

    public function afterSave($created, $options = array()) {
		Cache::clear(false,  $config = 'facs');
		clearCache();
	}
}
