<?php declare(strict_types=1);

namespace Tests;

use App\Bank;
use App\Franc;
use App\Money;
use PHPUnit\Framework\TestCase;

// TODO/Stories from book: (~<story>~ indicates completed)
// $5 + 10 CHF = $10 if rate is 2:1
// $5 + $5 = $10

class MoneyTest extends TestCase
{
	public function testSimpleAddition()
	{
		$five = Money::dollar(5);
		$sum = $five->plus($five);
		$bank = new Bank();
		$reduced = $bank->reduce($sum, "USD");
		$this->assertEquals(Money::dollar(10), $reduced);
	}
	
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
	
	public function testEquality()
	{
		$this->assertTrue(Money::dollar(5)->equals(Money::dollar(5)));
		$this->assertFalse(Money::dollar(5)->equals(Money::dollar(6)));
		$this->assertFalse(Money::franc(5)->equals(Money::dollar(5)));
	}
}

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
// ~Dollar/Franc Duplication~
// ~Common Equals~
// ~Common times~
// ~Compare Francs with Dollars~
// ~Currency?~
// ~Delete TestFrancMultiplication?~