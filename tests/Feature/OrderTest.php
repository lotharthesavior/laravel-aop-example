<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Order;

class OrderTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function testOrderView()
    {
        $total = 2300;

        $order = factory(Order::class)->create([
            'total' => $total,
        ]);

        $response = $this->get('/api/orders/' . $order->id);
        
        $response->assertStatus(200);
        $response->assertJson([
            'data' => [
                'total' => $total,
            ],
        ]);
    }

    /** @test */
    public function testOrderViewForTaxState()
    {
        $originalTotal = 2300;
        $expectedTotal = 2530;

        $order = factory(Order::class)->create([
            'total' => $originalTotal,
        ]);

        $taxPercentage = 0.1;
        config(['province-taxes.ON' => $taxPercentage]);

        $response = $this->get('/api/orders/' . $order->id . '?province=ON');
        
        $response->assertStatus(200);
        $response->assertJson([
            'data' => [
                'total' => $expectedTotal,
            ],
        ]);
    }    
}
