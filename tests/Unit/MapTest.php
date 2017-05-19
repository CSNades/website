<?php

namespace Tests\Unit;

use App\Models\Map;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class MapTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function findMapFromSlug()
    {
        $map = factory(Map::class)->create(['slug' => 'a-slug']);
        $foundMap = Map::findBySlug('a-slug');

        $this->assertEquals('a-slug', $foundMap->slug);
    }

    /** @test */
    public function cannotFindMapFromSlug()
    {
        try {
            Map::findBySlug('a-slug');
        } catch (ModelNotFoundException $e) {
            return;
        }

        $this->fail('The map was not found with this slug, but an exception was not thrown.');
    }
}
