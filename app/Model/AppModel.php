<?php
/**
 * Application model for Cake.
 *
 * This file is application-wide model file. You can put all
 * application-wide model-related methods here.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Model
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
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
/**
 * Number of iterations for checksum
 *
 * @var integer
 */
	public $iterations = 3;
	
	function dateFormatAfterFind($dateString) {
		return date('d-m-Y', strtotime($dateString));
	}

	public function dateFormatBeforeSave($dateString) {
		return date('Y-m-d', strtotime($dateString));
	}
	
	function Luhn_Verify($number, $iterations = 3){
		$result = substr($number, 0, - $iterations);
		if ($this->Luhn($result, $iterations) == $number)
		{
			return $result;
		}
		return false;
	}
	
	function Luhn($number, $iterations = 3)	{
		while ($iterations-- >= 1)
		{
			$stack = 0;
			$number = str_split(strrev($number), 1);
			foreach ($number as $key => $value)
			{
					if ($key % 2 == 0)
					{
							$value = array_sum(str_split($value * 2, 1));
					}

					$stack += $value;
			}

			$stack %= 10;

			if ($stack != 0)
			{
					$stack -= 10;
			}

			$number = implode('', array_reverse($number)) . abs($stack);
		}

		return $number;
	}
}