<?php

namespace CalculatorProject\Tests;

use CalculatorProject\Calculator;

class CalculatorTest extends \PHPUnit_Framework_TestCase
{
    /** @var  Calculator */
    protected $calc;

    public function setUp()
    {
        $this->calc = new Calculator();
    }

    public function testResultDefaultsToZero()
    {
        $this->assertSame(0, $this->calc->getResult());
    }

    public function testAddNumber()
    {
        $this->calc->add(7);
        $this->assertSame(7, $this->calc->getResult());
    }
}
