<?php declare(strict_types=1);

namespace App;

class Dollar extends Money
{
	
	public function __construct(protected int $amount)
	{
		$this->currency = "USD";
	}
	
	public function times(int $multiplier): Money
	{
		return new self($this->amount * $multiplier);
	}
	
}