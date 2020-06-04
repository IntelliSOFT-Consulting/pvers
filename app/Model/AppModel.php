<?php
/**
 * Application model for CakePHP.
 *
 * This file is application-wide model file. You can put all
 * application-wide model-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @package       app.Model
 * @since         CakePHP(tm) v 0.2.9
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Model', 'Model');

/**
 * Application model for Cake.
 *
 * Add your application-wide methods in the class below, your models
 * will inherit them.
 *
 * @package       app.Model
 */
class AppModel extends Model {
	//For softdelete purpose
	public function exists($id = null) {
		if ($this->Behaviors->loaded('SoftDelete')) {
			return $this->existsAndNotDeleted($id);
		} else {
			return parent::exists($id);
		}
	}

	public function delete($id = null, $cascade = true) {
	    $result = parent::delete($id, $cascade);
	    if ($result === false && $this->Behaviors->enabled('SoftDelete')) {
	       return (bool)$this->field('deleted', array('deleted' => 1));
	    }
	    return $result;
	}

	function dateFormatAfterFind($dateString) {
		return date('d-m-Y', strtotime($dateString));
	}

	public function dateFormatBeforeSave($dateString) {
		return date('Y-m-d', strtotime($dateString));
	}
	
	function dateTimeFormatAfterFind($dateString) {
		return date('d-m-Y H:i', strtotime($dateString));
	}

	public function dateTimeFormatBeforeSave($dateString) {
		return date('Y-m-d H:i', strtotime($dateString));
	}
}
