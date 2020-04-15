<?php
/**
 * PHP 5
 *
 * deactivatable : CakePHP behavior for soft deletion (https://github.com/elitalon/cakephp-deactivatable)
 * Copyright 2012, Eliezer Talon <elitalon@gmail.com>
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2012, Eliezer Talon <elitalon@gmail.com>
 * @link          https://github.com/elitalon/cakephp-deactivatable
 * @package       Deactivatable.Model.Behavior
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

/**
 * Deactivatable behavior
 *
 * @package Deactivatable.Model.Behavior
 */
class DeactivatableBehavior extends ModelBehavior {
	/**
	 * Default settings
	 *
	 * @var array
	 */
	public $default = array(
		'field' => array('active' => true),
		'force' => true,
	);

	/**
	 * Tells whether a filter field is used in query's conditions
	 *
	 * @var boolean
	 */
	protected $_findConditionsUseFilter = false;

	/**
	 * Configures behavior settings
	 *
	 * - `field`: a `key => value` pair, being the key the name of the
	 * field that represents the _active_ flag and the value a boolean
	 * flag to filter unactive records in `find()` methods.
	 *
	 * - `force`: a boolean flag to force deletion if records are not
	 * referenced by any associated model.
	 *
	 * @param Model $Model Model using this behavior
	 * @param array $settings Array of settings
	 * @return void
	 */
	public function setup(Model $Model, array $settings = array()) {
		if (empty($settings)) {
			$settings = $this->default;
		} elseif (!array_key_exists('field', $settings)) {
			$settings['field'] = $this->default['field'];
		} elseif (!array_key_exists('force', $settings)) {
			$settings['force'] = $this->default['force'];
		} elseif (!is_array($settings['field'])) {
			$settings['field'] = array($settings['field'] => true);
		}

		$field = key($settings['field']);
		if (!$Model->hasField($field)) {
			trigger_error(sprintf('DeactivatableBehavior::setup(): model %s has no field %s', $Model->alias, $field), E_USER_NOTICE);
			return;
		}

		$filter = $settings['field'][$field];
		if (!is_bool($filter) && !is_numeric($filter)) {
			$settings['field'][$field] = true;
		}

		$force = $settings['force'];
		if (!is_bool($force) && !is_numeric($force)) {
			$settings['force'] = true;
		}

		$this->settings[$Model->alias] = $settings;
	}

	/**
	 * Returns true if a record is being referenced by other models
	 *
	 * @param Model $Model Model using this behavior
	 * @param integer $id ID of a record
	 * @return boolean True if a record is referenced by another model
	 */
	public function isReferenced(Model $Model, $id) {
		if (empty($Model->hasMany) && empty($Model->hasOne)) {
			return false;
		}

		$associations = array_merge($Model->hasOne, $Model->hasMany);
		foreach ($associations as $associatedModel => $association) {
			$references = $Model->{$associatedModel}->find('count', array(
				'conditions' => array(
					sprintf('%s.%s', $associatedModel, $association['foreignKey']) => $id,
				),
				'callbacks' => false,
			));

			if ($references > 0) {
				return true;
			}
		}

		foreach ($Model->hasAndBelongsToMany as $associatedModel => $association) {
			$virtualModel = $association['with'];
			$references = $Model->{$virtualModel}->find('count', array(
				'conditions' => array(
					sprintf('%s.%s', $virtualModel, $association['foreignKey']) => $id,
				),
				'callbacks' => false,
			));

			if ($references > 0) {
				return true;
			}
		}

		return false;
	}

	/**
	 * Deactivates a record instead of deleting it
	 *
	 * @param Model $Model Model using this behavior
	 * @param integer $id ID of the record to deactivate
	 * @return mixed Array on success, false otherwise
	 */
	public function deactivate(Model $Model, $id) {
		$Model->id = $id;
		return $Model->saveField(key($this->settings[$Model->alias]['field']), false);
	}

	/**
	 * Before delete callback
	 *
	 * @param Model $Model Model using this behavior
	 * @return boolean True to continue deletion, false if record has
	 * been deactivated
	 */
	public function beforeDelete(Model $Model) {
		if (!$this->isReferenced($Model, $Model->id) && $this->settings[$Model->alias]['force']) {
			return true;
		} else {
			$this->deactivate($Model, $Model->id);
			return false;
		}
	}

	/**
	 * Activates a record
	 *
	 * @param Model $Model Model using this behavior
	 * @param integer $id ID of the record to deactivate
	 * @return mixed Array on success, false otherwise
	 */
	public function activate(Model $Model, $id) {
		$Model->id = $id;
		return $Model->saveField(key($this->settings[$Model->alias]['field']), true);
	}

	/**
	 * Callback method for `array_walk_recursive` that returns true if
	 * $key is present in $filterFields
	 *
	 * @param mixed $value Value of an array item
	 * @param mixed $key Key of an array item
	 * @param array $filterFields Array with the filter field with and
	 * without model prefix
	 * @link http://www.php.net/manual/en/function.array-walk-recursive.php
	 */
	protected function _searchFilterField($value, $key, array $filterFields) {
		if (in_array($key, $filterFields)) {
			$this->_findConditionsUseFilter = true;
		}
	}

	/**
	 * Before find callback
	 *
	 * Modifies query conditions to filter unactive records excepts
	 * these situations:
	 *
	 * - We are specifically getting the filter field
	 * - We are already using the filter field in conditions
	 *
	 * @param Model $Model Model using this behavior
	 * @param array $query Data used to execute this query
	 * @return boolean|array False or null will abort the operation. You can return an array to replace the
	 * $query that will be eventually run.
	 */
	public function beforeFind(Model $Model, $query) {
		$field = key($this->settings[$Model->alias]['field']);
		$wellformedField = sprintf('%s.%s', $Model->alias, $field);
		$requestedFields = is_array($query['fields']) ? $query['fields'] : array();

		if (in_array($field, $requestedFields) || in_array($wellformedField, $requestedFields)) {
			return true;
		}

		$conditions = is_array($query['conditions']) ? $query['conditions'] : array();
		if (empty($conditions)) {
			$conditions[$wellformedField] = true;
		} else {
			$this->_findConditionsUseFilter = false;
			foreach ($conditions as $condition => $options) {
				if ($field === $condition || $wellformedField === $condition) {
					$this->_findConditionsUseFilter = true;
					break;
				} elseif (is_array($options)) {
					array_walk_recursive($options, array($this, '_searchFilterField'), array($field, $wellformedField));
				}
			}
			if (!$this->_findConditionsUseFilter) {
				$conditions[$wellformedField] = true;
			}
			$this->_findConditionsUseFilter = false;
		}
		$query['conditions'] = $conditions;
		return $query;
	}
}
