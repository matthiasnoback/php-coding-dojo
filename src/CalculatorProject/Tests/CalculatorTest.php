<?php

namespace CalculatorProject\Tests;

use CalculatorProject\Calculator;
use InvalidArgumentException;

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

    /**
     * @expectedException InvalidArgumentException
     */
    public function testRequiresNumericValues()
    {
        $this->calc->add('four');
    }

    public function testAcceptsMultipleArgs()
    {
        $this->calc->add(2, 4, 3);

        $this->assertEquals(9, $this->calc->getResult());
        $this->assertNotEquals('Esto es una cadena', $this->getResult());
    }
}
