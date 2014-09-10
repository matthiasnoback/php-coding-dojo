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
}
