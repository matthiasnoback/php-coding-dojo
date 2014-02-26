# Minesweeper Kata

The Minesweeper Kata requires you to create a file loader which loads a text file containing a representation of a mine
field, like this one:

    4 6
    ..*..*
    .*...*
    ...*.*
    ......

After loading such a file, the raw data should be converted to a *map* like this:

    12*12*
    1*214*
    112*3*
    001121

Each ``.`` has been replaced with a number which stands for the number of mines *adjacent* to that field.
