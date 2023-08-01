<?php
namespace Tests\Unit\Api;

use App\Models\Client;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ClientControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_index_returns_all_clients(): void
    {
        $clients = Client::factory()->count(3)->create();

        $response = $this->getJson('/api/client');

        $response
            ->assertOk()
            ->assertJsonCount(3, 'data')
            ->assertJson([
                'success' => true,
                 'data' => $clients->toArray()
            ]);
    }

    public function test_store_creates_new_client(): void
    {
        $data = [
            'name' => 'Test Client',
            'email' => 'test@example.com',
            'phone' => '1234567890',
            'doc'   => 12345678999,
        ];

        $response = $this->postJson('/api/client', $data);

        $response
            ->assertCreated()
            ->assertJson([
                'success' => true,
                'data' => $data,
                'message' => 'Client created successfully'
            ]);

        $this->assertDatabaseHas('clients', $data);
    }

    public function test_show_returns_single_client(): void
    {
        $client = Client::factory()->create();

        $response = $this->getJson("/api/client/{$client->id}");

        $response
            ->assertOk()
            ->assertJson([
                'success' => true,
                'data' => $client->toArray()
            ]);
    }

    public function test_update_updates_existing_client(): void
    {
        $client = Client::factory()->create();

        $data = [
            'name' => 'Updated Client',
            'email' => 'updated@example.com',
            'phone' => '0987654321',
            'doc'   => 12345678919,
        ];

        $response = $this->putJson("/api/client/{$client->id}", $data);

        $response
            ->assertOk()
            ->assertJson([
                'success' => true,
                'data' => $data,
            ]);

        $this->assertDatabaseHas('clients', $data);
    }

    public function test_destroy_deletes_existing_client(): void
    {
        $client = Client::factory()->create();

        $response = $this->deleteJson("/api/client/{$client->id}");

        $response->assertNoContent();

        $this->assertDatabaseMissing('clients', ['id' => $client->id]);
    }
}
?>
