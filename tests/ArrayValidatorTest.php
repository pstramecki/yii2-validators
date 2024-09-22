<?php

namespace pstramecki\validators\tests;

use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;
use pstramecki\validators\ArrayValidator;
use ReflectionClass;

final class ArrayValidatorTest extends TestCase
{
    public function testIsFinal()
    {
        $reflector = new ReflectionClass(ArrayValidator::class);
        $this->assertTrue($reflector->isFinal());
    }


    #[DataProvider('validValues')]
    public function testValidateIsValid($value): void
    {

        $validator = new ArrayValidator();

        $this->assertTrue($validator->validate($value));
    }

    #[DataProvider('invalidValues')]
    public function testValidateIsInvalid($value): void
    {

        $validator = new ArrayValidator();

        $this->assertFalse($validator->validate($value));
    }

    public static function validValues(): array
    {
        return [
            [[]],
            [array()],
            [[1, 2, 3, 4]],
            [[1, 'a', '2', 3, []]],
            [['1' => 'foo', '2' => 'bar']],
            [['foo' => 1, 'bar' => 2]],
            [[new \stdClass(), new \stdClass()]],
        ];
    }

    public static function invalidValues(): array
    {
        return [
            ['a'],
            ['foo'],
            [new \stdClass()],
            [1],
        ];
    }
}