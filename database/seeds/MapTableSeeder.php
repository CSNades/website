<?php

use Illuminate\Database\Seeder;
use App\Models\Map;

class MapTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('maps')->delete();

        $maps = [
            'Dust 2'      => 'http://i.imgur.com/LZLDJK5.png',
            'Train'       => 'http://i.imgur.com/4AjEXBC.jpg',
            'Nuke'        => 'http://i.imgur.com/dcQbnwp.png',
            'Inferno'     => 'http://i.imgur.com/mPkTP5y.png',
            'Cache'       => 'http://i.imgur.com/Im0kNDY.png',
            'Mirage'      => 'http://i.imgur.com/0VrFWc1.png',
            'Cobblestone' => 'http://i.imgur.com/jGOhgDq.png',
            'Overpass'    => 'http://i.imgur.com/nZBVBLR.png'
        ];

        foreach ($maps as $key => $value) {
            $slug = str_slug($key);

            if ('dust-2' === $slug) {
                $slug = 'dust2';
            }

            Map::create([
                'name'  => $key,
                'slug'  => $slug,
                'image' => $value,
            ]);
        }
    }
}
