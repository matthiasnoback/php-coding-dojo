<?php

namespace CalculatorProject;

class Calculator
{
    protected $result = 0;

    public function add()
    {
        foreach (func_get_args() as $number) {
            if (!is_numeric($number)) {
                throw new \InvalidArgumentException;
            }
            $this->result = $this->result + $number;
        }
    }

    public function getResult()
    {
        return $this->result;
    }
}
