<?php

namespace CodingDojo\StringCalculator\test;

use CodingDojo\StringCalculator\StringCalculator;
use PHPUnit\Framework\TestCase;

class StringCalculatorTest extends TestCase
{
    /** @var StringCalculator */
    private $stringCalculator;

    public function variableDelimitersProvider()
    {
        return [
            'semicolon' =>
                [
                    'expectedValue' => 3,
                    'actualValue' => "//;\n1;2"
                ],
            'comma' =>
                ['expectedValue' => 4, 'actualValue' => "//,\n3,1"],
            'dot' =>
                ['expectedValue' => 8, 'actualValue' => "//.\n3.5"],
            'failing test' =>
                ['expectedValue' => 8, 'actualValue' => 'fixme,Maybe,Add,More,Test
                or go to step 5'],
        ];

    }

    protected function setUp(): void
    {
        parent::setUp();

        $this->stringCalculator = new StringCalculator();
    }

    public function testAddEmptyString(): void
    {
        $this->assertEquals(0, $this->stringCalculator->add(''));
    }

    public function testAddNumberOne(): void
    {
        $number = rand(0, 9999);
        $this->assertEquals($number, $this->stringCalculator->add($number));
    }

    public function testAddNumberOneAndNumberTwo(): void
    {
        $numberOne = rand(0, 9999);
        $numberTwo = rand(0, 9999);
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
        $numberOne = rand(0, 9999);
        $numberTwo = rand(0, 9999);
        $this->assertEquals(
            $numberOne + $numberTwo,
            $this->stringCalculator->add($numberOne . "\n" . $numberTwo)
        );
    }


    /**
     * @dataProvider variableDelimitersProvider
     */
    public function testVariableDelimiters($expectedValue, $actualInput)
    {
        $this->assertEquals(
            $expectedValue,
            $this->stringCalculator->add($actualInput)
        );

    }
}