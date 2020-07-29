<?php

namespace App\Repositories;

use Ray\Aop\WeavedInterface;
use Ray\Aop\ReflectiveMethodInvocation as Invocation;
use App\Order;
use App\CustomAspect\Annotations\Acme;
class OrderRepository_3605462301 extends \App\Repositories\OrderRepository implements WeavedInterface
{
    public $bind;
    public $bindings = [];
    public $methodAnnotations = 'a:1:{s:8:"getOrder";a:1:{i:0;O:33:"App\\CustomAspect\\Annotations\\Acme":4:{s:11:"beforeClass";N;s:12:"beforeMethod";N;s:4:"name";s:4:"Acme";s:5:"value";N;}}}';
    public $classAnnotations = 'a:0:{}';
    private $isAspect = true;
    /**
     * @Acme
     *
     * @param array $params
     * @param int $id
     *
     * @return Order
     */
    public function getOrder(array $params, int $id) : Order
    {
        if (!$this->isAspect) {
            $this->isAspect = true;
            return call_user_func_array([$this, 'parent::' . __FUNCTION__], func_get_args());
        }
        $this->isAspect = false;
        $result = (new Invocation($this, __FUNCTION__, func_get_args(), $this->bindings[__FUNCTION__]))->proceed();
        $this->isAspect = true;
        return $result;
    }
}
