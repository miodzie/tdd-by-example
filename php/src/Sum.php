<?php

namespace App;

class Sum implements Expression
{
	public function __construct(public Expression $augend, public Expression $addend)
	{
	
	}
	
	public function reduce(Bank $bank, string $to): Money
	{
		$amount = $this->augend->reduce($bank, $to)->amount
			+ $this->addend->reduce($bank, $to)->amount;
		return new Money($amount, $to);
	}
	
	public function plus(Expression $addend): Expression
	{
		return new Sum($this, $addend);
	}
	
	public function times(int $multiplier): Expression
	{
		return new Sum($this->augend->times($multiplier), $this->addend->times($multiplier));
	}
	
	// This was for Chapter 13, casting Expressions to Sums. Because PHP doesn't have class casting.
	// Leaving it for help in a possible follow along for others.
	public static function cast($source): self
	{
		$destination = new self(Money::dollar(1), Money::dollar(1));
		$sourceReflection = new \ReflectionObject($source);
		$sourceProperties = $sourceReflection->getProperties();
		foreach ($sourceProperties as $sourceProperty) {
			$name = $sourceProperty->getName();
			$destination->{$name} = $source->$name;
		}
		
		return $destination;
	}
}