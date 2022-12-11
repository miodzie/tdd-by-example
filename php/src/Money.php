<?php

namespace App;

abstract class Money
{
	abstract public function times(int $multiplier): Money;
	
	public static function dollar(int $amount): Money
	{
		return new Dollar($amount);
	}
	
	public function __construct(public int $amount)
	{
	}
	
	public function equals(Money $money): bool
	{
		return $money->amount == $this->amount &&
			get_class($this) == get_class($money);
	}
}