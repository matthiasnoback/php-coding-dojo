<?php

namespace CalculatorProject;

class Substraction implements Operation
{
    public function run($num, $current)
    {
        if (is_null($current)) {
            return $num;
        }

        return $current - $num;
    }
}
