<?php

namespace Tests\Feature;

use Tests\TestCase;
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
        $map = factory(\App\Models\Map::class)->create(['slug' => 'slug']);
        $user = factory(\App\User::class)->create();
        $nade = factory(Nade::class)->states('approved')->make([
            'title' => 'Our Nade Title',
            'imgur_album' => 'http://imgur.com/csnades',
            'type' => 'frag',
            'tags' => 'xbox',
        ]);

        $nade->user()->associate($user);
        $map->nades()->save($nade);

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
        $map = factory(\App\Models\Map::class)->create(['slug' => 'dust2']);
        $user = factory(\App\User::class)->create();
        $nade = factory(Nade::class)->states('unapproved')->make([
            'title' => 'Our Nade Title',
            'imgur_album' => 'http://imgur.com/csnades',
            'type' => 'frag',
            'tags' => 'xbox',
        ]);

        $nade->user()->associate($user);
        $map->nades()->save($nade);

        $response = $this->get('/maps/dust2');

        $response->assertStatus(200);
        $response->assertDontSee('Our Nade Title');
        $response->assertDontSee('https://youtube.com/csnades');
        $response->assertDontSee('High Explosive Grenade');
        $response->assertDontSee('xbox');
    }

    /** @test */
    public function userCanSeeApprovedYoutubeNadesInAMap()
    {
        $map = factory(\App\Models\Map::class)->create(['slug' => 'dust2']);
        $user = factory(\App\User::class)->create();
        $nade = factory(Nade::class)->states('approved')->make([
            'title' => 'Our Nade Title',
            'youtube' => 'https://youtube.com/csnades',
            'type' => 'frag',
            'tags' => 'xbox',
        ]);

        $nade->user()->associate($user);
        $map->nades()->save($nade);

        $response = $this->get('/maps/dust2');

        $response->assertStatus(200);
        $response->assertSee('Our Nade Title');
        $response->assertSee('https://youtube.com/csnades');
        $response->assertSee('High Explosive Grenade');
        $response->assertSee('xbox');
    }

    /** @test */
    public function userCannotSeeUnapprovedYoutubeNadesInAMap()
    {
        $map = factory(\App\Models\Map::class)->create(['slug' => 'dust2']);
        $user = factory(\App\User::class)->create();
        $nade = factory(Nade::class)->states('unapproved')->make([
            'title' => 'Our Nade Title',
            'youtube' => 'https://youtube.com/csnades',
            'type' => 'frag',
            'tags' => 'xbox',
        ]);

        $nade->user()->associate($user);
        $map->nades()->save($nade);

        $response = $this->get('/maps/dust2');

        $response->assertStatus(200);
        $response->assertDontSee('Our Nade Title');
        $response->assertDontSee('https://youtube.com/csnades');
        $response->assertDontSee('High Explosive Grenade');
        $response->assertDontSee('xbox');
    }
}
