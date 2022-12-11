<?php declare(strict_types=1);

namespace Tests;

use App\Franc;
use App\Money;
use PHPUnit\Framework\TestCase;

// TODO/Stories from book: (~<story>~ indicates completed)
// $5 + 10 CHF = $10 if rate is 2:1
// ~$5 * 2 = $10~
// ~Make "amount" private~ // It was already private per Go, but whatever.
// ~Dollar side effects?~
// Money rounding?
// ~Equals()~
// hashCode()
// Equal null
// Equal object
// ~5 CHF * 2 = 10 CHF~
// Dollar/franc Duplication
// ~Common Equals~
// Common times
// ~Compare Francs with Dollars~
// Currency?
// Delete TestFrancMultiplication?
class MoneyTest extends TestCase
{
	public function testCurrency()
	{
		$this->assertEquals("USD", Money::dollar(1)->currency());
		$this->assertEquals("CHF", Money::franc(1)->currency());
	}
	
	public function testMultiplication()
	{
		$five = Money::dollar(5);
		$this->assertTrue(Money::dollar(10)->equals($five->times(2)));
		$this->assertTrue(Money::dollar(15)->equals($five->times(3)));
	}
	
	public function testFrancMultiplication()
	{
		$five = Money::franc(5);
		$this->assertTrue(Money::franc(10)->equals($five->times(2)));
		$this->assertTrue(Money::franc(15)->equals($five->times(3)));
	}
	
	public function testEquality()
	{
		$this->assertTrue(Money::dollar(5)->equals(Money::dollar(5)));
		$this->assertFalse(Money::dollar(5)->equals(Money::dollar(6)));
		
		$this->assertTrue(Money::franc(5)->equals(Money::franc(5)));
		$this->assertFalse(Money::franc(5)->equals(Money::franc(6)));
		$this->assertFalse(Money::franc(5)->equals(Money::dollar(5)));
		$this->assertFalse(Money::dollar(5)->equals(Money::franc(5)));
	}
	
	
}