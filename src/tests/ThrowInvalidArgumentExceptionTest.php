<?php

/**
 * ThrowInvalidArgumentExceptionTest
 *
 * @package PhpThrow
 * @license MIT https://github.com/SandroMiguel/php-throw/blob/master/LICENSE
 * @author Sandro Miguel Marques <sandromiguel@sandromiguel.com>
 * @link https://github.com/SandroMiguel/php-throw
 * @version 1.0.0 (2024-03-28)
 */

declare(strict_types=1);

namespace PhpThrow\Tests;

use PHPUnit\Framework\TestCase;

/**
 * Test the ThrowInvalidArgumentException class.
 */
class ThrowInvalidArgumentExceptionTest extends TestCase
{
    /**
     * Test if the create method creates a new instance of the exception with
     *  the given message.
     */
    public function testCreateMethod(): void
    {
        $message = 'Test message';
        $exception = \PhpThrow\ThrowInvalidArgumentException::create($message);

        $this->assertInstanceOf(
            \PhpThrow\ThrowInvalidArgumentException::class,
            $exception
        );
        $this->assertEquals($message, $exception->getMessage());
    }

    /**
     * Test if the exception is thrown when the value is greater than or equal
     *  to 0 with default message.
     */
    public function testIfNegativeWithDefaultMessage(): void
    {
        $this->expectException(\PhpThrow\ThrowInvalidArgumentException::class);
        $this->expectExceptionMessage(
            'The value must be greater than or equal to 0.'
        );

        \PhpThrow\ThrowInvalidArgumentException::ifNegative(-1);
    }

    /**
     * Test if the exception is thrown when the value is 0 with default message.
     */
    public function testIfNegativeWithZeroValue(): void
    {
        $this->expectException(\PhpThrow\ThrowInvalidArgumentException::class);
        $this->expectExceptionMessage(
            'The value must be greater than or equal to 0.'
        );

        \PhpThrow\ThrowInvalidArgumentException::ifNegative(0);
    }

    /**
     * Test if the exception is thrown when the value is greater than or equal
     *  to 0 with custom message.
     */
    public function testIfNegativeWithCustomMessage(): void
    {
        $this->expectException(\PhpThrow\ThrowInvalidArgumentException::class);
        $this->expectExceptionMessage('My custom error message.');

        \PhpThrow\ThrowInvalidArgumentException::ifNegative(
            -1,
            'My custom error message.'
        );
    }

    /**
     * Test if no exception is thrown when the value is positive.
     */
    public function testIfPositiveValueDoesNotThrowException(): void
    {
        \PhpThrow\ThrowInvalidArgumentException::ifNegative(1);

        $this->assertTrue(true);
    }

    /**
     * Test if an exception is thrown when the value is negative, without a
     *  custom message.
     */
    public function testIfNegativeWithValueWithoutCustomMessage(): void
    {
        $value = -5;

        $this->expectException(\PhpThrow\ThrowInvalidArgumentException::class);
        $this->expectExceptionMessage(
            \sprintf('The value %d must be greater than or equal to 0.', $value)
        );

        \PhpThrow\ThrowInvalidArgumentException::ifNegativeWithValue($value);
    }

    /**
     * Test if an exception is thrown when the value is negative, with a
     *  custom message without '%d' placeholder.
     */
    public function testIfNegativeWithValueWithCustomMsgNoPlaceholder(): void
    {
        $value = -5;
        $message = 'Custom error message';

        $this->expectException(\PhpThrow\ThrowInvalidArgumentException::class);
        $this->expectExceptionMessage(
            \sprintf('%s. Provided %d', $message, $value)
        );

        \PhpThrow\ThrowInvalidArgumentException::ifNegativeWithValue(
            $value,
            $message
        );
    }

    /**
     * Test if an exception is thrown when the value is negative, with a
     *  custom message containing '%d' placeholder.
     */
    public function testIfNegativeWithValueWithCustomMsgWithPlaceholder(): void
    {
        $value = -5;
        $message = 'The value %d is negative.';

        $this->expectException(\PhpThrow\ThrowInvalidArgumentException::class);
        $this->expectExceptionMessage(
            \sprintf($message, $value)
        );

        \PhpThrow\ThrowInvalidArgumentException::ifNegativeWithValue(
            $value,
            $message
        );
    }

    /**
     * Test if no exception is thrown when the value is positive.
     */
    public function testIfNegativeWithValueNotThrowException(): void
    {
        $value = 5;

        \PhpThrow\ThrowInvalidArgumentException::ifNegativeWithValue($value);

        $this->expectNotToPerformAssertions();
    }
}
