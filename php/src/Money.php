<?php declare(strict_types=1);

namespace App;

abstract class Money
{
	protected string $currency;
	
	abstract public function times(int $multiplier): Money;
	
	public static function dollar(int $amount): Money
	{
		return new Dollar($amount);
	}
	
	public static function franc(int $amount): Money
	{
		return new Franc($amount, "CHF");
	}
	
	
	public function equals(Money $money): bool
	{
		return $money->amount == $this->amount &&
			get_class($this) == get_class($money);
	}
	
	public function currency(): string
	{
		return $this->currency;
	}
}