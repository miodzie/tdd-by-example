package chapter_two

import (
	"github.com/stretchr/testify/assert"
	"testing"
)

// TODO/Stories from book: (~<story>~ indicates completed)
// $5 + 10 CHF = $10 if rate is 2:1
// ~$5 * 2 = $10~
// Make "amount" private
// ~Dollar side effects?~
// Money rounding?

func TestMultiplication(t *testing.T) {
	five := NewDollar(5)
	product := five.times(2)
	assert.Equal(t, 10, product.amount)
	product = five.times(3)
	assert.Equal(t, 15, product.amount)
}
