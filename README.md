# php-error-handler-bug

https://bugs.php.net/bug.php?id=63206

When you reset error handler inside current working error handler, it's mask ignored.

## Expected

    set_error_handler error_handler, MASK
    // .. set another handler in error_handler
    // .. reset it
    // .. all next errors should respect MASK

## Actual

    // .. all next errors ignore MASK
