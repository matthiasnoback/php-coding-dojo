# Minesweeper Kata

The Minesweeper Kata requires you to create a file loader which loads a text file containing a representation of a mine
field, like this one:

    6x4
    ..x..x
    .x...x
    ...x.x
    ......

After loading such a file, the raw data should be converted to a *map* like this:

    12x12x
    1x214x
    112x3x
    001121

Each ``.`` has been replaced with a number which stands for the number of mines *adjacent* to that field.

## Extra requirements

- Make the file loader and map memory-friendly
- Add a random mine field generator