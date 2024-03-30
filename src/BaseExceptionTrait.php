<?php

/**
 * BaseExceptionTrait
 *
 * @package PhpThrow
 * @license MIT https://github.com/SandroMiguel/php-throw/blob/master/LICENSE
 * @author Sandro Miguel Marques <sandromiguel@sandromiguel.com>
 * @link https://github.com/SandroMiguel/php-throw
 * @version 1.0.1 (2024-03-30)
 */

declare(strict_types=1);

namespace PhpThrow;

/**
 * Base abstract class for custom exceptions.
 */
trait BaseExceptionTrait
{
    /**
     * Creates a new instance of the exception with the given message.
     *
     * @param string $message The error message.
     *
     * @throws static The newly created exception instance.
     */
    public static function create(string $message): void
    {
        throw new static($message);
    }
}
