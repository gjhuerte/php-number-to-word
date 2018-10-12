<?php

namespace gjhuerte\Dictionary;

class Dictionary 
{

	const QUINTILLION = 'quintillion';
	const QUADRILLION = 'quadrillion';
	const TRILLION = 'trillion';
	const BILLION = 'billion';
	const MILLION = 'million';
	const THOUSAND  = 'thousand';
	const HUNDRED = 'hundred';

	const NINETY = 'ninety';
	const EIGHTY = 'eighty';
	const SEVENTY = 'seventy';
	const SIXTY = 'sixty';
	const FIFTY = 'fifty';
	const FOURTY = 'fourty';
	const THIRTY = 'thirty';
	const TWENTY = 'twenty';
	const TEN = 'ten';

	const NINE = 'nine';
	const EIGHT = 'eight';
	const SEVEN = 'seven';
	const SIX = 'six';
	const FIVE = 'five';
	const FOUR = 'four';
	const THREE = 'three';
	const TWO = 'two';
	const ONE = 'one';

	const ZERO = 'zero';

	private static $byZero = [
		2 => self::HUNDRED,
		3 => self::THOUSAND,
		6 => self::MILLION,
		9 => self::BILLION,
		12 => self::TRILLION,
		15 => self::QUADRILLION,
		18 => self::QUINTILLION,
	];

	private static $byOne = [
		1 => self::ONE,
		2 => self::TWO,
		3 => self::THREE,
		4 => self::FOUR,
		5 => self::FIVE,
		6 => self::SIX,
		7 => self::SEVEN,
		8 => self::EIGHT,
		9 => self::NINE,
	];

	private static $byTen = [
		1 => self::TEN,
		2 => self::TWENTY,
		3 => self::THIRTY,
		4 => self::FOURTY,
		5 => self::FIFTY,
		6 => self::SIXTY,
		7 => self::SEVENTY,
		8 => self::EIGHTY,
		9 => self::NINETY,
	];

	/**
	 * Returns the word equivalent for the index 
	 * 
	 * @param  int $index 
	 * @return string        
	 */
	public static function byZero(int $index = null)
	{
		if(isset(self::$byZero[ $index + 1 ]) &&  $index > 3) {
			return self::HUNDRED;
		}

		else if($index == null || ! isset(self::$byZero[ $index ])) {
			return;
		} 

		return self::$byZero[ $index ];
	}

	/**
	 * Returns the word equivalent for the index 
	 * 
	 * @param  int $index 
	 * @return string        
	 */
	public static function byOne(int $index = null)
	{
		if($index == null || ! isset(self::$byOne[ $index ])) {
			return;
		} 

		return self::$byOne[ $index ];
	}

	/**
	 * Returns the word equivalent for the index 
	 * 
	 * @param  int $index 
	 * @return string        
	 */
	public static function byTen(int $index = null)
	{
		if($index == null || ! isset(self::$byTen[ $index ])) {
			return;
		} 

		return self::$byTen[ $index ];
	}

	/**
	 * Check if the value passed belongs to tens
	 * 
	 * @param  int $index 
	 * @return string        
	 */
	public static function isTens(int $index = null)
	{
		if($index % 3 == 2) {
			return true;
		} 

		return false;
	}

	/**
	 * Checks if the value passed is zero
	 * 
	 * @param  int $index 
	 * @return string        
	 */
	public static function isZero(int $value = null)
	{
		if($value == 0) {
			return true;
		} 

		return false;
	}
}