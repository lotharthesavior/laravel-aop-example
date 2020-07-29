<?php

namespace App\Services;

use Ray\Aop\WeavedInterface;
use Ray\Aop\ReflectiveMethodInvocation as Invocation;
use Ytake\LaravelAspect\Annotation\Loggable;
class AcmeService_1067090825 extends \App\Services\AcmeService implements WeavedInterface
{
    public $bind;
    public $bindings = [];
    public $methodAnnotations = 'a:1:{s:10:"someAction";a:1:{i:0;O:39:"Ytake\\LaravelAspect\\Annotation\\Loggable":4:{s:5:"value";i:200;s:10:"skipResult";b:0;s:4:"name";s:8:"Loggable";s:6:"driver";s:5:"stack";}}}';
    public $classAnnotations = 'a:0:{}';
    private $isAspect = true;
    /**
     * @Loggable(driver="stack")
     */
    public function someAction(string $content)
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
