<?php declare(strict_types=1);

namespace App;

class Franc extends Money
{
	public function __construct(protected int $amount, protected string $currency)
	{
	}
	
	public function times(int $multiplier): Money
	{
		return Money::franc($this->amount * $multiplier);
	}
}
