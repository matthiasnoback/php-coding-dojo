<?php

namespace CalculatorProject\Tests;

use CalculatorProject\Multiplication;

class MultiplicationTest extends \PHPUnit_Framework_TestCase
{
    public function testFindMult()
    {
        $mult = new Multiplication();
        $result = $mult->run(4, 2);

        $this->assertEquals(8, $result);
    }
}
