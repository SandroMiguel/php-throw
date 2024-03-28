<?php

/**
 * ThrowInvalidArgumentException
 *
 * @package PhpThrow
 * @license MIT https://github.com/SandroMiguel/php-throw/blob/master/LICENSE
 * @author Sandro Miguel Marques <sandromiguel@sandromiguel.com>
 * @link https://github.com/SandroMiguel/php-throw
 * @version 1.0.0 (2024-03-28)
 */

declare(strict_types=1);

namespace PhpThrow;

/**
 * Throw InvalidArgumentException instances.
 */
class ThrowInvalidArgumentException extends \InvalidArgumentException
{

    use BaseExceptionTrait;

    /**
     * Throws an exception if the numeric value is less than 0.
     *
     * @param float|int $value The numeric value to check.
     * @param string|null $message The error message to use if the value is less
     *  than 0. If not provided, a default message will be used.
     *
     * @throws ThrowInvalidArgumentException If the value is less than 0.
     */
    public static function ifNegative(
        float|int $value,
        ?string $message = null,
    ): void {
        if ($value < 0) {
            $message ??= 'The value must be greater than or equal to 0.';

            throw new self($message);
        }
    }
}
