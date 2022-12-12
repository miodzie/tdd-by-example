<?php declare(strict_types=1);

namespace App;

class Money
{
	public function __construct(protected int $amount, protected string $currency)
	{
	}
	
	
	public static function dollar(int $amount): Money
	{
		return new Dollar($amount, "USD");
	}
	
	public static function franc(int $amount): Money
	{
		return new Franc($amount, "CHF");
	}
	
	public function times(int $multiplier): Money
	{
		return new Money($this->amount * $multiplier, $this->currency);
	}
	
	public function equals(Money $money): bool
	{
		return $money->amount == $this->amount &&
			$this->currency() == $money->currency();
	}
	
	public function currency(): string
	{
		return $this->currency;
	}
}