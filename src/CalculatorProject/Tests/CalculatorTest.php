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

    public function testResultDefaultsToNull()
    {
        $this->assertNull($this->calc->getResult());
    }

    public function testAddNumbers()
    {
        //Given
        $mock = \Mockery::mock('CalculatorProject\Addition');
        $mock->shouldReceive('run')
            ->once()
            ->with(7, 0)
            ->andReturn(7);
        $this->calc->setOperands(7);
        $this->calc->setOperation($mock);
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
        $mock = \Mockery::mock('CalculatorProject\Addition');
        $this->calc->setOperands('four');
        $this->calc->setOperation($mock);
        $this->calc->calculate();
    }

    public function testAcceptsMultipleArgs()
    {
        //Given
        $mock = \Mockery::mock('CalculatorProject\Addition');
        $mock->shouldReceive('run')
            ->once()
            ->andReturn(9);
        $this->calc->setOperands(2, 3, 4);
        $this->calc->setOperation($mock);
        //When
        $this->calc->calculate();
        //Then
        $this->assertEquals(9, $this->calc->getResult());
        $this->assertNotEquals('This is a string', $this->getResult());
    }
}
