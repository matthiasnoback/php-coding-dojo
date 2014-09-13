<?php
namespace CalculatorProject;

interface Operation
{
    /**
     * @param  integer $num
     * @param  integer $current
     * @return integer
     */
    public function run($num, $current);
}
