package money

import "reflect"

type Money interface {
	Amount() int
	Times(multiplier int) Money
	Equals(Money) bool
}

type money struct {
	amount     int
	parentType Money
}

func (m money) Amount() int {
	return m.amount
}

func (m money) Equals(money Money) bool {
	return reflect.TypeOf(m.parentType).Name() == reflect.TypeOf(money).Name() &&
		money.Amount() == m.amount
}

func Dollar(amount int) Money {
	return dollar{money{amount: amount, parentType: dollar{}}}
}
