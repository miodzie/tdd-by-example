package money

type franc struct {
	money
}

func Franc(amount int) franc {
	return franc{money{amount: amount, parentType: franc{}}}
}

func (f franc) Times(multiplier int) Money {
	return franc{money{amount: f.amount * multiplier}}
}
