<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\User;
use App\Models\Map;
use App\Models\Nade;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ViewNadesInMapTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function userCanSeeApprovedImgurNadesInMap()
    {
        $nade = factory(Nade::class)->states('approved')->create([
            'map_id' => factory(Map::class)->create(['slug' => 'slug']),
            'title' => 'Our Nade Title',
            'imgur_album' => 'http://imgur.com/csnades',
            'type' => 'frag',
            'tags' => 'xbox',
        ]);

        $response = $this->get('/maps/slug');

        $response->assertStatus(200);
        $response->assertSee('Our Nade Title');
        $response->assertSee('http://imgur.com/csnades');
        $response->assertSee('High Explosive Grenade');
        $response->assertSee('xbox');
    }

    /** @test */
    public function userCannotSeeUnapprovedImgurNadesInMap()
    {
        $nade = factory(Nade::class)->states('unapproved')->create([
            'map_id' => factory(Map::class)->create(['slug' => 'slug']),
            'title' => 'Our Nade Title',
            'imgur_album' => 'http://imgur.com/csnades',
            'type' => 'frag',
            'tags' => 'xbox',
        ]);

        $response = $this->get('/maps/slug');

        $response->assertStatus(200);
        $response->assertDontSee('Our Nade Title');
        $response->assertDontSee('https://youtube.com/csnades');
        $response->assertDontSee('High Explosive Grenade');
        $response->assertDontSee('xbox');
    }

    /** @test */
    public function userCanSeeApprovedYoutubeNadesInAMap()
    {
        $nade = factory(Nade::class)->states('approved')->create([
            'map_id' => factory(Map::class)->create(['slug' => 'slug']),
            'title' => 'Our Nade Title',
            'youtube' => 'https://youtube.com/csnades',
            'type' => 'frag',
            'tags' => 'xbox',
        ]);

        $response = $this->get('/maps/slug');

        $response->assertStatus(200);
        $response->assertSee('Our Nade Title');
        $response->assertSee('https://youtube.com/csnades');
        $response->assertSee('High Explosive Grenade');
        $response->assertSee('xbox');
    }

    /** @test */
    public function userCannotSeeUnapprovedYoutubeNadesInAMap()
    {
        $nade = factory(Nade::class)->states('unapproved')->create([
            'map_id' => factory(Map::class)->create(['slug' => 'slug']),
            'title' => 'Our Nade Title',
            'youtube' => 'https://youtube.com/csnades',
            'type' => 'frag',
            'tags' => 'xbox',
        ]);

        $response = $this->get('/maps/slug');

        $response->assertStatus(200);
        $response->assertDontSee('Our Nade Title');
        $response->assertDontSee('https://youtube.com/csnades');
        $response->assertDontSee('High Explosive Grenade');
        $response->assertDontSee('xbox');
    }
}
