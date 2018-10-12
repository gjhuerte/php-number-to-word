<?php

require_once __DIR__ . '/../vendor/autoload.php';

use gjhuerte\NumberParser\NumberToWord;

echo NumberToWord::make(1234002)
		->convert()
		->endsOn('and')
		->toString() . PHP_EOL;
// echo NumberToWord::make(12343658)->convert() . PHP_EOL;
// echo NumberToWord::make(1234145)->convert() . PHP_EOL;
// echo NumberToWord::make(12343365)->convert() . PHP_EOL;