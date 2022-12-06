package chapter_one

import (
	"github.com/stretchr/testify/assert"
	"testing"
)

func TestMultiplication(t *testing.T) {
	five := NewDollar(5)
	five.times(2)
	assert.Equal(t, 10, five.amount)
}
