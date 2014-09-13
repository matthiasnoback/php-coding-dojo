<?php

namespace CalculatorProject\Tests;

use CalculatorProject\Addition;
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

    public function testResultDefaultsToNull()
    {
        $this->assertNull($this->calc->getResult());
    }

    public function testAddNumber()
    {
        //Given
        $this->calc->setOperands(7);
        $this->calc->setOperation(new Addition());
        //When
        $result = $this->calc->calculate();
        //Then
        $this->assertSame(7, $result);
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testRequiresNumericValues()
    {
        $this->calc->setOperands('four');
        $this->calc->setOperation(new Addition());
        $this->calc->calculate();
    }

    public function testAcceptsMultipleArgs()
    {
        //Given
        $this->calc->setOperands(2, 3, 4);
        $this->calc->setOperation(new Addition());
        //When
        $this->calc->calculate();
        //Then
        $this->assertEquals(9, $this->calc->getResult());
        $this->assertNotEquals('Esto es una cadena', $this->getResult());
    }
}
