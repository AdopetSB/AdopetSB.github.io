<?php
/**
 * NiletPHP - Simple and lightweight web MVC framework
 * (c) Tsvetelin Tsonev <github.tsonev@yahoo.com>
 * For copyright and license information of this source code, please view the LICENSE file.
 */

namespace Nilet\Components\ErrorHandling;

/**
 * @author Tsvetelin Tsonev <github.tsonev@yahoo.com>
 */
class ErrorHandler {
    
    public function handleErrors() {
        set_error_handler(array($this, "errorHandlerMethod"));
    }
    
    public function errorHandlerMethod($errno, $errstr) {
        if (!(error_reporting() & $errno)) {
            // This error code is not included in error_reporting
            return;
        }
        throw new \Error($errstr, $errno);
    }

    public function restoreErrorHandler() : bool {
        return restore_error_handler();
    }
}
