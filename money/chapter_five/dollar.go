package chapter_five

type Dollar struct {
	amount int
}

func NewDollar(amount int) Dollar {
	return Dollar{amount: amount}
}

func (this Dollar) times(multiplier int) Dollar {
	return Dollar{amount: this.amount * multiplier}
}

func (this Dollar) equals(dollar Dollar) bool {
	return this.amount == dollar.amount
}

type Franc struct {
	amount int
}

func NewFranc(amount int) Franc {
	return Franc{amount: amount}
}

func (this Franc) times(multiplier int) Franc {
	return Franc{amount: this.amount * multiplier}
}

func (this Franc) equals(franc Franc) bool {
	return this.amount == franc.amount
}
