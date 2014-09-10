<?php

namespace CalculatorProject\Tests;

use CalculatorProject\Calculator;

class CalculatorTest extends \PHPUnit_Framework_TestCase
{

    public function testResultDefaultsToZero()
    {
        $calc = new Calculator();
        $this->assertSame(0, $calc->getResult());
    }

    public function testAddNumber()
    {
        $calc = new Calculator();
        $calc->add(7);
        $this->assertSame(7, $calc->getResult());
    }
}
