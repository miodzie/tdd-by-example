<?php declare(strict_types=1);

namespace App;

class Money implements Expression
{
	public function __construct(public int $amount, public string $currency)
	{
	}
	
	public static function dollar(int $amount): Money
	{
		return new Money($amount, 'USD');
	}
	
	public static function franc(int $amount): Money
	{
		return new Money($amount, 'CHF');
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
	
	public function plus(Money $added): Expression
	{
		return new Sum($this, $added);
	}
	
	
	public function reduce(Bank $bank, string $to): Money
	{
		$rate = $bank->rate($this->currency, $to);
		return new Money($this->amount / $rate, $to);
	}
	
	// This was for Chapter 13, casting Expressions to Money. Because PHP doesn't have class casting.
	// Leaving it for help in a possible follow along for others.
	public static function cast($source): self
	{
		$destination = new self(1, "potato");
		$sourceReflection = new \ReflectionObject($source);
		$sourceProperties = $sourceReflection->getProperties();
		foreach ($sourceProperties as $sourceProperty) {
			$name = $sourceProperty->getName();
			$destination->{$name} = $source->$name;
			
		}
		
		return $destination;
	}
}