<?php
App::uses('AppModel', 'Model');
/**
 * Authority Model
 *
 */
class Authority extends AppModel {
	public function finder($query, $type) {
		if (($suggestions = Cache::read($query, 'mahs')) === false) {
			if($type == 'N') {
				$suggestions = $this->find('all', array(
					'fields' =>  array('Authority.mah_company_email', 'Authority.mah_name' ,  'Authority.mah_company_address', 'Authority.mah_company_telephone', 'Authority.master_mah'),
					'conditions' => array('Authority.mah_company_email LIKE' => '%'.$query.'%'),
					'limit' => 10,
					'recursive' => -1
				));
			} else {
				$suggestions = $this->find('all', array(
					'fields' =>  array('Authority.mah_company_email', 'Authority.mah_name' , 'Authority.mah_company_address',  'Authority.mah_company_telephone',  'Authority.master_mah' ),
					'conditions' => array('Authority.mah_name LIKE' => '%'.$query.'%'),
					'limit' => 10,
					'recursive' => -1
				));
			}
			Cache::write($query, $suggestions, 'mahs');
		}
		return $suggestions;
    }
}
