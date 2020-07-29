<?php
declare(strict_types=1);

namespace App\CustomAspect\Interceptors;

use Ray\Aop\MethodInterceptor;
use Ray\Aop\MethodInvocation;
use Ytake\LaravelAspect\Annotation\AnnotationReaderTrait;
use App\Order;

/**
 * Class AcmeInterceptor
 */
class AcmeInterceptor implements MethodInterceptor
{
    use AnnotationReaderTrait;

    /**
     * @param MethodInvocation $invocation
     *
     * @return object
     * @throws \Exception
     */
    public function invoke(MethodInvocation $invocation)
    {
        /** @var App\CustomAspect\Annotations\Acme $annotation */
        // $annotation = $invocation->getMethod()->getAnnotation($this->annotation) ?? new $this->annotation([]);
        // $object = $invocation->getThis();
        // $argumentsArray = [];
        // foreach ($arguments as $key => $value) {
        //     $argumentsArray[$key] = $value;
        // }

        $arguments = $invocation->getNamedArguments();
        $argumentsArray = $arguments['params'];

        $order = $invocation->proceed();

        $order = $this->processTaxForProvince($order, $argumentsArray);

        return $order;
    }

    /**
     * @param Order $order
     * @param array $argumentsArray
     *
     * @return Order
     */
    private function processTaxForProvince(Order $order, array $argumentsArray) : Order
    {
        if (!isset($argumentsArray['province'])) {
            return $order;
        }

        $provinceTax = config('province-taxes.' . $argumentsArray['province']);

        if ($provinceTax === null) {
            return $order;
        }

        $order->total = (int) round(
            $order->total + ($order->total * $provinceTax),
            0,
            PHP_ROUND_HALF_UP
        );

        return $order;
    }
}
