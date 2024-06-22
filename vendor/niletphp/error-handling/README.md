##Custom error handling

Registers custom error handler, which throws \Error when PHP emits E_WARNING or E_ERROR.

### Requirements
`PHP >= 7.0`

### Install

Composer

```javascript
{
    "require": {
        "niletphp/error-handling": ">=1.0"
    }
}
```

### Examples

```php
use Nilet\Components\ErrorHandling\ErrorHandler;

$eh = new ErrorHandler();

// Registering the custom error handler
$eh->handleErrors();

// Restore the previous event handler
$eh->restoreErrorHandler();
```
