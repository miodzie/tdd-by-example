<?php

namespace App;

interface Expression
{
	public function reduce(string $to): Money;
}