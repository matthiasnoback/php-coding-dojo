<?php

namespace CalculatorProject;

class Addition implements Operation
{
    public function run($num, $current)
    {
        return $current + $num;
    }
}
