package money

type dollar struct {
	money
}

func (d dollar) Times(multiplier int) Money {
	return dollar{money{amount: d.amount * multiplier}}
}
