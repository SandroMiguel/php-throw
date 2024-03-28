# PhpThrow

PhpThrow (Beta) is a PHP package for throwing custom exceptions with ease.

## Features

-   Provides custom exception classes with additional functionality.
-   Easy to use and integrate into existing projects.

## Installation

You can install PhpThrow via Composer:

```bash
composer require sandromiguel/php-throw
```

## Usage

### Comparing Native and PhpThrow exceptions

The following code shows how to use the native `InvalidArgumentException` class and the `ThrowInvalidArgumentException` class to throw an exception if the provided value is less than zero:

#### Native `InvalidArgumentException`:

```php
try {
    $value = -5;

    if ($value < 0) {
        throw new InvalidArgumentException('The value must be greater than or equal to 0.');
    }

    // ...
} catch (InvalidArgumentException $e) {
    echo $e->getMessage();
}
```

#### `ThrowInvalidArgumentException`:

```php
try {
    $value = -5;

    ThrowInvalidArgumentException::ifNegative($value);

    // ...
} catch (ThrowInvalidArgumentException $e) {
    echo $e->getMessage();
}
```

### ThrowInvalidArgumentException

`ThrowInvalidArgumentException` extends the built-in `InvalidArgumentException` and provides helper methods for throwing exceptions related to invalid arguments.

#### create()

`create($message)`: Creates a new instance of the exception with the given message.

```php
$email = 'not-a-valid-email-address';

try {
    // Validate the email address
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        throw ThrowInvalidArgumentException::create('Invalid email address');
    }

    // ...
} catch (ThrowInvalidArgumentException $e) {
    echo $e->getMessage(); // Output: Invalid email address
}
```

#### ifNegative()

`ifNegative($value, $message = null)`: Throws an exception if the numeric value is less than 0.

```php
try {
    ThrowInvalidArgumentException::ifNegative(-1);
} catch (\PhpThrow\ThrowInvalidArgumentException $e) {
    echo $e->getMessage(); // Output: The value must be greater than or equal to 0.
}
```

#### ifNegativeWithValue()

`ifNegativeWithValue($value, $message = null)`: Throws an exception if the numeric value is negative, including the value in the error message.

```php
try {
    ThrowInvalidArgumentException::ifNegativeWithValue(-1);
} catch (\PhpThrow\ThrowInvalidArgumentException $e) {
    echo $e->getMessage(); // Output: The value -1 must be greater than or equal to 0.
}
```

You can also use a custom message without the placeholder:

```php
ThrowInvalidArgumentException::ifNegativeWithValue(-1, 'Value must be positive'); // Output: Value must be positive. Provided -1
```

## Contributing

Want to contribute? All contributions are welcome. Read the [contributing guide](CONTRIBUTING.md).

## Questions

If you have questions tweet me at [@sandro_m_m](https://twitter.com/sandro_m_m) or [open an issue](../../issues/new).

## Changelog

See [CHANGELOG.md](CHANGELOG.md)

## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details

## TODO

-   Implement additional exception classes and methods for common validations

**~ sharing is caring ~**
