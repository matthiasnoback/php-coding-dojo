<?php

namespace CalculatorProject\Tests;

use CalculatorProject\Substraction;

class SubstractionTest extends \PHPUnit_Framework_TestCase
{
    public function testFindSubtract()
    {
        $mult = new Substraction();
        $result = $mult->run(2, 5);

        $this->assertEquals(3, $result);
    }
}
