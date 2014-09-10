<?php

namespace CalculatorProject;

class Calculator
{
    protected $result = 0;

    public function add($number)
    {
        $this->result = $this->result + $number;
    }

    public function getResult()
    {
        return $this->result;
    }
}