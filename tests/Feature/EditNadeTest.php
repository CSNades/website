<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Nade;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class EditNadeTest extends TestCase
{
    /** @test */
    public function guestCannotLoadEditNadeForm()
    {
        $nade = factory(Nade::class)->create();
        $response = $this->get('/nades/' . $nade->id . '/edit');

        $response->assertStatus(302);
        $response->assertRedirect('/login');
    }

    /** @test */
    public function guestCannotEditNade()
    {
        $nade = factory(Nade::class)->create([
            'title' => 'A nade',
            'imgur_album' => 'http://imgur.com/csnades',
        ]);

        $response = $this->post('/nades', [
            'title' => 'Edited Nade',
            'pop_spot' => 'a-site',
            'imgur_album' => 'http://imgur.com/csnades-edited',
            'youtube' => 'https://youtube.com',
            'map' => 'slug',
            'type' => 'smoke',
            'tags' => 'xbox',
            'is_working' => true,
        ]);

        $response->assertStatus(302);
        $response->assertRedirect('/login');

        $freshNade = $nade->fresh();
        $this->assertEquals('A nade', $freshNade->title);
        $this->assertEquals('http://imgur.com/csnades', $freshNade->imgur_album);
    }
}
