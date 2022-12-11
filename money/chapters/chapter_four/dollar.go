package chapter_four

type Dollar struct {
	amount int
}

func NewDollar(amount int) Dollar {
	return Dollar{amount: amount}
}

func (d Dollar) times(multiplier int) Dollar {
	return Dollar{amount: d.amount * multiplier}
}

func (d Dollar) equals(dollar Dollar) bool {
	return d.amount == dollar.amount
}
