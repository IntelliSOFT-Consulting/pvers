<?php
App::uses('AppModel', 'Model');
/**
 * Country Model
 *
 */
class Country extends AppModel {
	public $actsAs = array('Search.Searchable');
	public $filterArgs = array(
        array('name' => 'name', 'type' => 'like')
    );
}
