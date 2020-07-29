<?php
declare(strict_types=1);

namespace App\Modules;

use Ytake\LaravelAspect\Modules\AspectModule;

use App\Services\AcmeService;
use App\CustomAspect\Pointcuts\AcmePointCut;
use Ytake\LaravelAspect\PointCut\PointCutable;
use App\Repositories\OrderRepository;

/**
 * Class LoggableModule
 */
class AcmeModule extends AspectModule
{
    /** @var array */
    protected $classes = [
        // example
        // AcmeService::class
        OrderRepository::class
    ];

    /**
     * @return PointCutable
     */
    public function registerPointCut(): PointCutable
    {
        return new AcmePointCut;
    }
}
