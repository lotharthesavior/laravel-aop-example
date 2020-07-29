<?php

namespace App\Services;

use Ytake\LaravelAspect\Annotation\Loggable;

class AcmeService
{
    /**
     * @Loggable(driver="stack")
     */
    public function someAction(string $content)
    {
        echo $content;
    }
}