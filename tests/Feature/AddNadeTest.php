<?php

namespace Tests\Feature;

use App\User;
use App\Models\Map;
use Tests\TestCase;
use App\Models\Nade;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AddNadeTest extends TestCase
{
    /** @test */
    public function guestCannotLoadAddNadeForm()
    {
        $response = $this->get('/nades/add');

        $response->assertStatus(302);
        $response->assertRedirect('/login');
    }

    /** @test */
    public function guestCannotAddNade()
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

        $response->assertStatus(302);
        $response->assertRedirect('/login');
        $this->assertEquals(0, Nade::count());
    }

    /** @test */
    public function userCanLoadAddNadeForm()
    {
        $this->disableExceptionHandling();

        $user = factory(User::class)->create();
        $response = $this->actingAs($user)->get('/nades/add');

        $response->assertStatus(200);
    }

    /** @test */
    public function userCanAddNade()
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

        $response->assertStatus(302);
        $response->assertRedirect('/nades/edit/1');
    }
}
