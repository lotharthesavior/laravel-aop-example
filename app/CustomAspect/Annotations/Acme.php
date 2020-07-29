<?php
declare(strict_types=1);

namespace App\CustomAspect\Annotations;

use Doctrine\Common\Annotations\Annotation;

/**
 * @Annotation
 */
class Acme extends Annotation
{
    /** @var string */
    public $beforeClass;

    /** @var string */
    public $beforeMethod;

    /** @var string  */
    public $name = 'Acme';
}
