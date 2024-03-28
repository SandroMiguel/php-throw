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
     * Test if the exception is thrown when the value is negative with default
     *  message.
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
     * Test if the exception is thrown when the value is negative with custom
     *  message.
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
}
