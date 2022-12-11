<?php declare(strict_types=1);

namespace Tests;

use App\Franc;
use App\Money;
use PHPUnit\Framework\TestCase;

// TODO/Stories from book: (~<story>~ indicates completed)
// $5 + 10 CHF = $10 if rate is 2:1
// ~$5 * 2 = $10~
// ~Make "amount" private~ // It was already private per Go, but whatever.
// ~dollar side effects?~
// Money rounding?
// ~Equals()~
// hashCode()
// Equal null
// Equal object
// ~5 CHF * 2 = 10 CHF~
// dollar/franc Duplication
// ~Common Equals~
// Common times
// ~Compare Francs with Dollars~
// Currency?
// Delete TestFrancMultiplication?
class MoneyTest extends TestCase
{
	public function testMultiplication()
	{
		$five = Money::dollar(5);
		$this->assertTrue(Money::dollar(10)->equals($five->times(2)));
		$this->assertTrue(Money::dollar(15)->equals($five->times(3)));
	}
	
	public function testFrancMultiplication()
	{
		$five = new Franc(5);
		$this->assertTrue((new Franc(10))->equals($five->times(2)));
		$this->assertTrue((new Franc(15))->equals($five->times(3)));
	}
	
	public function testEquality()
	{
		$this->assertTrue(Money::dollar(5)->equals(Money::dollar(5)));
		$this->assertFalse(Money::dollar(5)->equals(Money::dollar(6)));
		
		$this->assertTrue((new Franc(5))->equals(new Franc(5)));
		$this->assertFalse((new Franc(5))->equals(new Franc(6)));
		$this->assertFalse((new Franc(5))->equals(Money::dollar(5)));
		$this->assertFalse((Money::dollar(5))->equals(new Franc(5)));
	}
}