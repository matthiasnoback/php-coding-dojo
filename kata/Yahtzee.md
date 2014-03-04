![Noback's Office](assets/header.png)

# Yahtzee Kata

A Yahtzee player needs to place a roll of 5 regular dices at a predefined category. The rules of each category will be
applied the particular roll, which results in a score based on that roll. The score is 0 if a category is not applicable
at all to a given roll.

The kata requires you to write the code necessary to calculate the score for each roll of five dice to any of the
categories described below.

## Categories and their rules

### Ones, Twos, Threes, Fours, Fives, Sixes

Add the dice reading one, two, three, four, five or six respectively. 1,2,2,4,5 on Ones gives 1. On Twos it gives 4.

### Three of a kind

There need to be at least three dice with the same number. Add those three dice together: 3,3,3,2,6 gives 9.

### Four of a kind

Same as "Three of a kind", but with four dice.

### Small straight

1,2,3,4,x and 2,3,4,5,x gives 30.

### Large straight

1,2,3,4,5 and 2,3,4,5,6 gives 40.

### Full house

There need to be two dice of the same kind, and three of *another* kind. 2,2,3,3,3 gives 13.

### Chance

No rules. 1,2,3,4,5 gives 15, 6,6,5,5,4 gives 26.

### Yahtzee

All dice need to be of the same kind. Yahtzee then gives 50 points.
