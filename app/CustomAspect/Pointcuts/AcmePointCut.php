<?php

declare(strict_types=1);

namespace App\CustomAspect\Pointcuts;

use Illuminate\Contracts\Container\Container;
use Ray\Aop\Pointcut;
use Ytake\LaravelAspect\PointCut\CommonPointCut;
use Ytake\LaravelAspect\PointCut\PointCutable;

use App\CustomAspect\Annotations\Acme;
use App\CustomAspect\Interceptors\AcmeInterceptor;

/**
 * Class AcmePointCut
 */
class AcmePointCut extends CommonPointCut implements PointCutable
{
    /** @var string */
    protected $annotation = Acme::class;

    /**
     * @param Container $app
     *
     * @return Pointcut
     */
    public function configure(Container $app): Pointcut
    {
        $interceptor = new AcmeInterceptor;
        $this->setInterceptor($interceptor);

        return $this->withAnnotatedAnyInterceptor();
    }
}
