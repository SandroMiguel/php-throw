<?php

/**
 * ThrowPageNotFoundExceptionTest
 *
 * @package PhpThrow\Tests
 * @license MIT https://github.com/SandroMiguel/php-throw/blob/master/LICENSE
 * @author Sandro Miguel Marques <sandromiguel@sandromiguel.com>
 * @version 1.0.0 (2024-09-30)
 */

declare(strict_types=1);

namespace PhpThrow\Tests;

use PHPUnit\Framework\TestCase;

/**
 * Test the ThrowPageNotFoundException class.
 */
class ThrowPageNotFoundExceptionTest extends TestCase
{
    /**
     * Test if the exception is thrown with a default message and 404 code.
     */
    public function testForPageWithDefaultMessageAndCode(): void
    {
        $page = 'example-page';

        $this->expectException(\PhpThrow\ThrowPageNotFoundException::class);
        $this->expectExceptionMessage(\sprintf('The page "%s" was not found.', $page));
        $this->expectExceptionCode(404);

        \PhpThrow\ThrowPageNotFoundException::forPage($page);
    }

    /**
     * Test if the exception is thrown with a custom message and 404 code.
     */
    public function testForPageWithCustomMessage(): void
    {
        $page = 'custom-page';
        $message = 'Custom error message.';

        $this->expectException(\PhpThrow\ThrowPageNotFoundException::class);
        $this->expectExceptionMessage($message);
        $this->expectExceptionCode(404);

        \PhpThrow\ThrowPageNotFoundException::forPage($page, 404, $message);
    }

    /**
     * Test if the exception is thrown with a custom code.
     */
    public function testForPageWithCustomCode(): void
    {
        $page = 'example-page';
        $customCode = 500;

        $this->expectException(\PhpThrow\ThrowPageNotFoundException::class);
        $this->expectExceptionMessage(\sprintf('The page "%s" was not found.', $page));
        $this->expectExceptionCode($customCode);

        \PhpThrow\ThrowPageNotFoundException::forPage($page, $customCode);
    }
}
