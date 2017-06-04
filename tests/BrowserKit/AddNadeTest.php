<?php

namespace Tests\BrowserKit;

use App\User;
use App\Models\Map;
use Tests\BrowserKitTestCase;
use App\Models\Nade;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class AddNadeTest extends BrowserKitTestCase
{
    /** @test */
    public function userCanAddNade()
    {
        $this->disableExceptionHandling();

        $map = factory(Map::class)->create(['slug' => 'some-slug', 'name' => 'Some Map']);

        $user = factory(User::class)->create();
        $this->actingAs($user)->visit('/nades/add')
            ->type('My Nade Title', 'title')
            ->select('a-site', 'pop_spot')
            ->type('http://imgur.com/csnades', 'imgur_album')
            ->type('https://youtube.com/csnades', 'youtube')
            ->select('some-slug', 'map')
            ->select('smoke', 'type')
            ->type('xbox,cat', 'tags')
            ->check('is_working')
            ->press('Submit Nade')
            ->seePageis('/nades/add');
    }
}
