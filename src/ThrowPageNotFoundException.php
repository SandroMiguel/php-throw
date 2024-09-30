<?php

/**
 * ThrowPageNotFoundException
 *
 * @package PhpThrow
 * @license MIT https://github.com/SandroMiguel/php-throw/blob/master/LICENSE
 * @author Sandro Miguel Marques <sandromiguel@sandromiguel.com>
 * @version 1.0.0 (2024-09-30)
 */

declare(strict_types=1);

namespace PhpThrow;

/**
 * Exception thrown when a page is not found.
 */
class ThrowPageNotFoundException extends \RuntimeException
{

    use BaseExceptionTrait;

    /**
     * Throws an exception for a specific page not found.
     *
     * @param string $page The page that was not found.
     * @param int $code The error code.
     * @param string|null $message The error message to use if the page
     *  is not found. If not provided, a default message will be used.
     *
     * @throws ThrowPageNotFoundException If the page is not found.
     */
    public static function forPage(string $page, int $code = 404, ?string $message = null): void
    {
        $message ??= \sprintf('The page "%s" was not found.', $page);
        self::create($message, $code);
    }
}
