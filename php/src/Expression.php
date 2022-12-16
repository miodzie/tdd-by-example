<?php

namespace App;

interface Expression
{
	public function reduce(Bank $bank, string $to): Money;
}