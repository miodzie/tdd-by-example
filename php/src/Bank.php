<?php declare(strict_types=1);

namespace App;


class Bank
{
	private array $rates = [];
	
	public function reduce(Expression $source, string $to): Money
	{
		return $source->reduce($this, $to);
	}
	
	public function rate(string $currency, string $to): int
	{
		if ($currency === $to) {
			return 1;
		}
		return $this->rates[(string)new Pair($currency, $to)];
	}
	
	public function addRate(string $from, string $to, int $rate): void
	{
		$this->rates[(string)new Pair($from, $to)] = $rate;
	}
}

class Pair
{
	public function __toString()
	{
		return sprintf("%d-%d", $this->from, $this->to);
	}
	
	public function __construct(public string $from, public string $to)
	{
		
	}
}
