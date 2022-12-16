<?php declare(strict_types=1);

namespace Tests;

use App\Bank;
use App\Money;
use App\Sum;
use PHPUnit\Framework\TestCase;

// TODO/Stories from book: (~<story>~ indicates completed)
// $5 + 10 CHF = $10 if rate is 2:1
// ~$5 + $5 = $10~
// Return Money from $5 + $5
// ~Bank.reduce(Money)~
// ~Reduce Money with conversion~
// ~Reduce(Bank, String)~

class MoneyTest extends TestCase
{
	public function testIdentityRate()
	{
	   $this->assertEquals(1, (new Bank())->rate("USD", "USD"));
	}
	
	public function testReduceMoneyDifferentCurrency()
	{
		$bank = new Bank();
		$bank->addRate("CHF", "USD", 2);
		$result = $bank->reduce(Money::franc(2), "USD");
		$this->assertEquals(Money::dollar(1), $result);
	}
	
	public function testReduceMoney()
	{
		$bank = new Bank();
		$result = $bank->reduce(Money::dollar(1), "USD");
		$this->assertEquals(Money::dollar(1), $result);
	}
	
	public function testReduceSum()
	{
		$sum = new Sum(Money::dollar(3), Money::dollar(4));
		$bank = new Bank();
		$result = $bank->reduce($sum, "USD");
		$this->assertEquals(Money::dollar(7), $result);
	}
	
	public function testPlusReturnsSum()
	{
		// The first argument to addition is called the _augend_. neat.
		$five = Money::dollar(5);
		$result = $five->plus($five);
		$this->assertEquals($five, $result->augend);
		$this->assertEquals($five, $result->addend);
	}
	
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