<?php

namespace App\Repositories;

use App\Order;
use App\CustomAspect\Annotations\Acme;

class OrderRepository
{
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
        return Order::find($id);
    }
}