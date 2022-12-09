package chapter_six

import "reflect"

type Money interface {
	Amount() int
}

type money struct {
	amount     int
	parentType Money
}

func (m money) Amount() int {
	return m.amount
}

func (m money) equals(money Money) bool {
	return reflect.TypeOf(m.parentType).Name() == reflect.TypeOf(money).Name() &&
		money.Amount() == m.amount
}

type Dollar struct {
	money
}

func NewDollar(amount int) Dollar {
	return Dollar{money{amount: amount, parentType: Dollar{}}}
}

func (d Dollar) times(multiplier int) Dollar {
	return Dollar{money{amount: d.amount * multiplier}}
}

type Franc struct {
	money
}

func NewFranc(amount int) Franc {
	return Franc{money{amount: amount, parentType: Franc{}}}
}

func (f Franc) times(multiplier int) Franc {
	return Franc{money{amount: f.amount * multiplier}}
}
