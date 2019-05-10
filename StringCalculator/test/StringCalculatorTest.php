<?php

namespace CodingDojo\StringCalculator\test;

use CodingDojo\StringCalculator\StringCalculator;
use PHPUnit\Framework\TestCase;

class StringCalculatorTest extends TestCase
{
    /** @var StringCalculator */
    private $stringCalculator;

    protected function setUp(): void
    {
        parent::setUp();

        $this->stringCalculator = new StringCalculator();
    }

    public function testAddEmptyString():void
    {
        $this->assertEquals(0, $this->stringCalculator->add(''));
    }

    public function testAddNumberOne(): void
    {
        $number = rand(0,9999);
        $this->assertEquals($number, $this->stringCalculator->add($number));
    }

    public function testAddNumberOneAndNumberTwo(): void
    {
        $numberOne = rand(0,9999);
        $numberTwo = rand(0,9999);
        $this->assertEquals($numberOne + $numberTwo, $this->stringCalculator->add(
            $numberOne . ',' . $numberTwo
        ));
    }
    public function testAddUnknownAmountOfNumbers(): void
    {
        $this->assertEquals(3, $this->stringCalculator->add('1,1,1'));
        $this->assertEquals(4, $this->stringCalculator->add('2,1,1'));
        $this->assertEquals(5, $this->stringCalculator->add('2,2,1'));
    }

    public function testAddNumberOneAndNumberTwoWithSpaces(): void
    {
        $this->fail('Needs refactoring.');
        $numberOne = rand(0,9999);
        $numberTwo = rand(0,9999);
        $this->assertEquals($numberOne + $numberTwo, $this->stringCalculator->add(
            $numberOne . "\n" . $numberTwo
        ));
    }
}