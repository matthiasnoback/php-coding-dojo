<?php

namespace CalculatorProject;

use InvalidArgumentException;

class Calculator
{
    protected $result = null;
    protected $operands = [];
    /** @var  Operation */
    protected $operation;

    public function getResult()
    {
        return $this->result;
    }

    public function setOperation(Operation $operation)
    {
        $this->operation = $operation;
    }

    public function setOperands($operands)
    {
        $this->operands = func_get_args();
    }

    public function calculate()
    {
        foreach ($this->operands as $number) {
            if (!is_numeric($number)) {
                throw new InvalidArgumentException();
            }

            $this->result = $this->operation->run($number, $this->result);
        }

        return $this->result;
    }
}
