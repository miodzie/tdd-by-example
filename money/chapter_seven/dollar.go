package chapter_six

type Money interface {
	Amount() int
}

type money struct {
	amount int
}

func (m money) Amount() int {
	return m.amount
}

func (m money) equals(money Money) bool {
	return money.Amount() == m.amount
}

type Dollar struct {
	money
}

func NewDollar(amount int) Dollar {
	return Dollar{money{amount: amount}}
}

// Because Go isn't really OO, we can't follow along the example exactly.
// We have to add specific equals methods to each
func (d Dollar) equals(money Money) bool {
	_, isFranc := money.(Dollar)
	return isFranc && d.amount == money.Amount()
}

func (d Dollar) times(multiplier int) Dollar {
	return Dollar{money{amount: d.amount * multiplier}}
}

type Franc struct {
	money
}

func NewFranc(amount int) Franc {
	return Franc{money{amount: amount}}
}

// Because Go isn't really OO, we can't follow along the example exactly.
// We have to add specific equals methods to each
func (f Franc) equals(money Money) bool {
	_, isFranc := money.(Franc)
	return isFranc && f.amount == money.Amount()
}

func (f Franc) times(multiplier int) Franc {
	return Franc{money{amount: f.amount * multiplier}}
}
