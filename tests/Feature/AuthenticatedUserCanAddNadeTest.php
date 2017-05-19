<?php

namespace Tests\Feature;

use App\User;
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
        $map = factory(Map::class)->create(['slug' => 'slug']);
        $response = $this->post('/nades/add', [
            'title' => 'A nade',
            'pop_spot' => 'a-site',
            'imgur_album' => 'http://imgur.com/csnades',
            'youtube' => 'https://youtube.com',
            'map' => 'slug',
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

    /** @test */
    public function authenticatedUserCanLoadForm()
    {
        $user = factory(User::class)->create();
        $response = $this->actingAs($user)->get('/nades/add');

        $response->assertStatus(200);
        $response->assertSee('name="title"');
        $response->assertSee('name="pop_spot"');
        $response->assertSee('name="imgur_album"');
        $response->assertSee('name="youtube"');
        $response->assertSee('name="map"');
        $response->assertSee('name="type"');
        $response->assertSee('name="tags"');
        $response->assertSee('name="is_working"');
    }

    /** @test */
    public function authenticatedUserCanSaveNade()
    {
        $user = factory(User::class)->create();
        $map = factory(Map::class)->create(['slug' => 'slug']);
        $response = $this->actingAs($user)->post('/nades/add', [
            'title' => 'A nade',
            'pop_spot' => 'a-site',
            'imgur_album' => 'http://imgur.com/csnades',
            'youtube' => 'https://youtube.com',
            'map' => 'slug',
            'type' => 'smoke',
            'tags' => 'xbox',
            'is_working' => true,
        ]);

        $this->assertDatabaseHas('nades', [
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
