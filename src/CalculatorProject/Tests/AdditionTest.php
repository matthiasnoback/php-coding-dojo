<?php

namespace CalculatorProject\Tests;


use CalculatorProject\Addition;

class AdditionTest extends \PHPUnit_Framework_TestCase
{
    public function testFindSum()
    {
        $addition = new Addition();
        $result = $addition->run(4, 0);

        $this->assertEquals(4, $result);
    }
}
