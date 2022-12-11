package chapter_four

import (
	"github.com/stretchr/testify/assert"
	"testing"
)

// TODO/Stories from book: (~<story>~ indicates completed)
// $5 + 10 CHF = $10 if rate is 2:1
// ~$5 * 2 = $10~
// ~Make "amount" private~ // It was already private per Go, but whatever.
// ~Dollar side effects?~
// Money rounding?
// ~equals()~
// hashCode()
// Equal null
// Equal object

func TestMultiplication(t *testing.T) {
	five := NewDollar(5)
	assert.True(t, NewDollar(10).equals(five.times(2)))
	assert.True(t, NewDollar(15).equals(five.times(3)))
}

func TestEquality(t *testing.T) {
	assert.True(t, NewDollar(5).equals(NewDollar(5)))
	assert.False(t, NewDollar(5).equals(NewDollar(6)))
}
