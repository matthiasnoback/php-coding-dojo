<?php
namespace DummyProject\Test;

class DummyClassTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function the_tests_can_be_run_and_classes_are_available_via_the_composer_autoloader()
    {
        if (!class_exists('DummyProject\DummyClass')) {
            $result = 'Make sure you use the "phpunit.xml.dist.dist"' .
                ' from this project as the configuration file for your PHPUnit test runner';
            $this->fail($result);
        }
        $this->assertTrue(true);
    }
}
