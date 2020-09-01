<?php
App::uses('AppModel', 'Model');
/**
 * Meddra Model
 *
 */
class Meddra extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'llt_name';


	public function finder($query) {
		if (($suggestions = Cache::read($query, 'reactions')) === false) {
			$suggestions = $this->find('all', array(
				'fields' => array('Meddra.llt_name'),
				'limit' => 20,
				'conditions' => array('Meddra.llt_name LIKE' => '%'.$query.'%'),
				'recursive' => -1,
			));
			Cache::write($query, $suggestions, 'reactions');
		} else {
            // $suggestions[]['Meddra']['drug_name'] = 'urongo'; 
        }
		return $suggestions;
    }
}
