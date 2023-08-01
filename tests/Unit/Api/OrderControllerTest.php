<?php

namespace Tests\Unit\Api;

use App\Models\Client;
use App\Models\Disc;
use App\Models\Order;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class OrderControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_index_returns_all_orders(): void
    {
        $orders = Order::factory()->count(3)->create();

        $response = $this->getJson('/api/order');

        $response
            ->assertOk()
            ->assertJsonCount(3, 'data')
            ->assertJson([
                'success' => true,
                'data' => $orders->toArray(),
            ]);
    }

    public function test_store_creates_a_new_order(): void
    {
        $client = Client::factory()->create();
        $disc = Disc::factory()->create();

        $data = [
            'client_id' => $client->id,
            'disc_id' => $disc->id,
            'quantity' => 2,
        ];

        $response = $this->postJson('/api/order', $data);

        $response
            ->assertOk()
            ->assertJson([
                'success' => true,
                'message' => 'Order created successfully',
            ]);

        $this->assertDatabaseHas('orders', $data);
    }

    public function test_show_returns_a_single_order(): void
    {
        $order = Order::factory()->create();

             $response = $this->getJson("/api/order/{$order->id}");

        $response
            ->assertOk()
            ->assertJson([
                'success' => true,
                'data' => $order->toArray(),
            ]);
    }

    public function test_update_updates_a_single_order(): void
    {
        $order = Order::factory()->create();

        $data = [
            'client_id' => $order->client_id,
            'disc_id' => $order->disc_id,
            'quantity' => 3,
        ];

        $response = $this->putJson("/api/order/{$order->id}", $data);

        $response
            ->assertOk()
            ->assertJson([
                'success' => true,
                'message' => 'Order updated successfully',
            ]);

        $this->assertDatabaseHas('orders', [
            'id' => $order->id,
            'quantity' => 3,
        ]);
    }
}
