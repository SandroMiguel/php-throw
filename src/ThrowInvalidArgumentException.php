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
     * Throws an exception if the numeric value is negative.
     *
     * @param float|int $value The numeric value to check.
     * @param string|null $message The error message to use if the value is
     *  negative. If not provided, a default message will be used.
     *
     * @throws ThrowInvalidArgumentException If the value is negative.
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

    /**
     * Throws an exception if the numeric value is negative, including the
     *  value in the error message.
     *
     * @param float|int $value The numeric value to check.
     * @param string|null $message The error message to use if the value is
     *  negative. If not provided, a default message will be used.
     *
     * @throws ThrowInvalidArgumentException If the value is negative.
     */
    public static function ifNegativeWithValue(
        float|int $value,
        ?string $message = null,
    ): void {
        if ($message !== null && !\str_contains($message, '%d')) {
            $message = \sprintf('%s. Provided %d', $message, $value);
        }

        $message = \sprintf(
            $message ?? 'The value %d must be greater than or equal to 0.',
            $value
        );

        self::ifNegative($value, $message);
    }
}
