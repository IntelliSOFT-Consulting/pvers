<?php
App::uses('AppModel', 'Model');
App::uses('File', 'Utility');
/**
 * HelpInfo Model
 *
 */
class HelpInfo extends AppModel {
	public $actsAs = array('Search.Searchable');
	public $filterArgs = array(
        array('name' => 'field_name', 'type' => 'query', 'method' => 'orConditions', 'encode' => true),
        array('name' => 'field_label', 'type' => 'like'),
        array('name' => 'help_type', 'type' => 'like'),
        array('name' => 'title', 'type' => 'like'),
        array('name' => 'content', 'type' => 'like'),
        array('name' => 'help_text', 'type' => 'like'),
        array('name' => 'type', 'type' => 'like'),
        // array('name' => 'id', 'type' => 'value'),
    );

        public function orConditions($data = array()) {
            $filter = $data['field_name'];
            $cond = array(
                'OR' => array(
                    $this->alias . '.field_name LIKE' => '%' . $filter . '%',
                    $this->alias . '.field_label LIKE' => '%' . $filter . '%',
                    $this->alias . '.help_type LIKE' => '%' . $filter . '%',
                    $this->alias . '.title LIKE' => '%' . $filter . '%',
                    $this->alias . '.content LIKE' => '%' . $filter . '%',
                    $this->alias . '.help_text LIKE' => '%' . $filter . '%',
                    $this->alias . '.type LIKE' => '%' . $filter . '%',
                ));
            return $cond;
        }

	public function help_infos() {
		/*
			*************** 	UNCOMMENT AFTER DEMO
		*/
		if (($help_infos = Cache::read('help_infos', 'long')) === false) {
			$help_infos = $this->find('all');
			Cache::write('help_infos', $this->compagt($help_infos), 'long');
		}
		return $help_infos;
		// return $this->compagt($help_infos);
    }

	public function compagt($help_infos) {
		$helps = array();
		foreach ($help_infos as $help_info) {
			$helps[$help_info['HelpInfo']['field_name']] = $help_info['HelpInfo'];
		}
		return $helps;
	}

	public function afterSave($created, $options = array()) {
		// Cache::clear(false,  $config = 'default');
		// clearCache();
		$file = new File(CACHE . 'long' . DS . 'cake_help_infos');
		$file->delete(); // I am deleting this file
		$file->close(); // Be sure to close the file when you're done
	}
}
