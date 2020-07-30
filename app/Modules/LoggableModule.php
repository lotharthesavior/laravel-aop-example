<?php
declare(strict_types=1);

namespace App\Modules;

use Ytake\LaravelAspect\Modules\LoggableModule as PackageLoggableModule;
// use \App\Services\AcmeService;

/**
 * Class LoggableModule
 */
class LoggableModule extends PackageLoggableModule
{
    /** @var array */
    protected $classes = [
        // example
        // AcmeService::class
    ];
}
