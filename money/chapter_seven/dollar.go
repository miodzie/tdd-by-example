package chapter_seven

type Money interface {
	Amount() int
}

type money struct {
	amount int
}

func (m money) Amount() int {
	return m.amount
}

func (m money) times(multiplier int) Money {
	return money{amount: m.amount * multiplier}
}

func (m money) equals(money Money) bool {
	return m.amount == money.Amount()
}

type Dollar struct {
	money
}

func NewDollar(amount int) Dollar {
	return Dollar{money{amount: amount}}
}

type Franc struct {
	money
}

func NewFranc(amount int) Franc {
	return Franc{money{amount: amount}}
}
