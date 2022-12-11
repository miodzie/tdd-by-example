package money

import (
	"github.com/stretchr/testify/assert"
	"testing"
)

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

func TestFrancMultiplication(t *testing.T) {
	five := Franc(5)
	assert.True(t, Franc(10).Equals(five.Times(2)))
	assert.True(t, Franc(15).Equals(five.Times(3)))
}

func TestMultiplication(t *testing.T) {
	// this would look like, money.Dollar(5), which is comparable to the book.
	five := Dollar(5)
	assert.True(t, Dollar(10).Equals(five.Times(2)))
	assert.True(t, Dollar(15).Equals(five.Times(3)))
}

func TestEquality(t *testing.T) {
	assert.True(t, Dollar(5).Equals(Dollar(5)))
	assert.False(t, Dollar(5).Equals(Dollar(6)))
	assert.True(t, Franc(5).Equals(Franc(5)))
	assert.False(t, Franc(5).Equals(Franc(6)))
	assert.False(t, Franc(5).Equals(Dollar(5)))
	assert.False(t, Dollar(5).Equals(Franc(5)))
}
