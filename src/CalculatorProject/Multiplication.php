<?php

namespace CalculatorProject;


class Multiplication implements Operation
{
    public function run($num, $current)
    {
        if (is_null($current)) {
            return $num;
        }
        return $current * $num;
    }
}
