<?php

namespace CalculatorProject;

use InvalidArgumentException;

class Calculator
{
    protected $result = 0;

    public function add()
    {
        $this->calculateAll(func_get_args(), '+');
    }

    protected function calculateAll(array $numbers, $symbol)
    {
        foreach ($numbers as $num) {
            $this->calculate($num, $symbol);
        }
    }

    protected function calculate($num, $symbol)
    {
        if (!is_numeric($num)) {
            throw new InvalidArgumentException;
        }

        switch ($symbol) {
            case '+':
                $this->result += $num;
                break;

            case '-':
                $this->result -= $num;
                break;
        }
    }

    public function subtract()
    {
        $this->calculateAll(func_get_args(), '-');
    }

    public function getResult()
    {
        return $this->result;
    }
}
