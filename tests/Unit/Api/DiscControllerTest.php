<?php
namespace Tests\Unit\Api;

use App\Models\Disc;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DiscControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_show_returns_a_single_disc(): void
    {
        $disc = Disc::factory()->create();

        $response = $this->getJson("/api/disc/{$disc->id}");

        $response
            ->assertOk()
            ->assertJson([
                'success' => true,
                'data' => $disc->toArray(),
            ]);
    }

    public function test_update_updates_a_single_disc(): void
    {
        $disc = Disc::factory()->create();

        $data = [
            'name' => 'Name Up',
            'artist' => 'New Artist Up',
            'style' => 'Jazz',
            'year_of_release' => 2021
        ];

        $response = $this->putJson("/api/disc/{$disc->id}", $data);

        $response
            ->assertOk()
            ->assertJson([
                'success' => true,
                'data' => $data,
            ]);

        $this->assertDatabaseHas('discs', $data);


    }

    public function test_destroy_deletes_a_single_disc(): void
    {
        $disc = Disc::factory()->create();

        $response = $this->deleteJson("/api/disc/{$disc->id}");

        $response
            ->assertOk()
            ->assertJson([
                'success' => true,
                'message' => 'Disc deleted successfully',
            ]);

        $this->assertDatabaseMissing('discs', [
            'id' => $disc->id,
        ]);
    }
}
?>
