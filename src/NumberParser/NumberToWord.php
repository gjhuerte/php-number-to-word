<?php

namespace gjhuerte\NumberParser;

use gjhuerte\Dictionary\Dictionary;

class NumberToWord 
{
	private $initial;
	private $converted;
	private $separator = ' ';
	private $endsOn;
	private static $_instance;

	/**
	 * Sets the values of the number to be converted
	 * 
	 * @param  int $number 
	 * @return object
	 */
	public static function make($number)
	{
		if(self::$_instance == null) {
			self::$_instance = new self;
		}

		self::$_instance->initial = $number;

		return self::$_instance;
	}

	/**
	 * Converts the number to the equivalent words
	 * 
	 * @return object
	 */
	public function convert()
	{
		$numbers = self::$_instance->initial;
		$count = strlen($numbers);

		if(Dictionary::isZero($numbers)) {
			return Dictionary::ZERO;
		} 

		else {
			foreach( str_split($numbers) as $key => $value) {
				$convertedNumber = $annex = '';

				if(Dictionary::isTens($count)) {
					$convertedNumber = Dictionary::byTen($value);
				} 

				else if(! Dictionary::isZero($value)) {
					$convertedNumber = Dictionary::byOne($value);
					$annex = Dictionary::byZero($count - 1);
				}

				if(! Dictionary::isZero($value)) {
					self::$_instance->converted[] = $convertedNumber;
				}

				if($annex != '') {
					self::$_instance->converted[] = $annex;
				}

				$count--;
			}
		}

		return self::$_instance;

	}

	// public function withSeparator($separator)
	// {
	// 	self::$_instance->separator = $separator;

	// 	return self::$_instance;
	// }

	/**
	 * Appends a value to the end of the word
	 * 
	 * @param  string $endsOn 
	 * @return object
	 */
	public function endsOn($endsOn)
	{
		self::$_instance->endsOn = $endsOn;
		return self::$_instance;
	}

	/**
	 * Append the word added before the end of the array
	 * 
	 * @return object
	 */
	public function appendWordBeforeEnd()
	{
		if(isset(self::$_instance->endsOn)) {
			$totalCount = count(self::$_instance->converted);
			array_splice(self::$_instance->converted, $totalCount - 1, 0, self::$_instance->endsOn);
		}

		return self::$_instance;
	}

	/**
	 * Output the value as word
	 * 
	 * @return string
	 */
	public function toString()
	{
		$this->appendWordBeforeEnd();

		return implode(
			self::$_instance->separator, 
			self::$_instance->converted
		);
	}

	/**
	 * Output the result as array
	 * 
	 * @return array
	 */
	public function toArray()
	{
		return self::$_instance->converted;
	}

}