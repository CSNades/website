<?php

namespace Tests\Feature;

use App\Models\Map;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AuthenticatedUserCanAddNadeTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function guestGetsRedirected()
    {
        $response = $this->get('/nades/add');

        $response->assertRedirect('/login');
    }

    /** @test */
    public function guestCannotSaveNade()
    {
        $map = factory(Map::class)->create(['name' => 'Map']);
        $response = $this->post('/nades/add', [
            'title' => 'A nade',
            'pop_spot' => 'a-site',
            'imgur_album' => 'http://imgur.com/csnades',
            'youtube' => 'https://youtube.com',
            'map' => $map->name,
            'type' => 'smoke',
            'tags' => 'xbox',
            'is_working' => true,
        ]);

        $response->assertRedirect('/login');
        $this->assertDatabaseMissing('nades', [
            'title' => 'A nade',
            'pop_spot' => 'a-site',
            'imgur_album' => 'http://imgur.com/csnades',
            'youtube' => 'https://youtube.com',
            'map_id' => $map->id,
            'type' => 'smoke',
            'tags' => 'xbox',
            'is_working' => 1,
        ]);
    }
}
