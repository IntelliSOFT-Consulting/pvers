<?php
App::uses('AppModel', 'Model');
/**
 * Message Model
 *
 */
class Message extends AppModel {
	public $actsAs = array('Containable', 'Search.Searchable');
    public $filterArgs = array(
            'name' => array('type' => 'like', 'encode' => true),
            'subject' => array('type' => 'like', 'encode' => true),
            'content' => array('type' => 'like', 'encode' => true),
        );
}
