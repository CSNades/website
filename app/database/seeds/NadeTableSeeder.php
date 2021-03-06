<?php

class NadeTableSeeder extends Seeder {
    public function run()
    {
        Eloquent::unguard();
        DB::table('nades')->delete();

        $nades = $this->getNades();

        foreach ($nades as $key => $value) {
            Nade::create($value);
        }
    }

    public function getNades()
    {
        return array(
            array(
                'map_id'      => 7,
                'user_id'     => 1,
                'type'        => 'smoke',
                'pop_spot'    => 'b-site',
                'title'       => 'B CT Lower',
                'imgur_album' => 'http://imgur.com/a/U6kEn',
                'is_working'  => true,
                'approved_by' => 1,
            ),
            array(
                'map_id'      => 7,
                'user_id'     => 1,
                'type'        => 'smoke',
                'pop_spot'    => 'a-site',
                'title'       => 'CT Smokes',
                'imgur_album' => 'http://imgur.com/a/IM8T9',
                'is_working'  => true,
                'approved_by' => 1,
            ),
            array(
                'map_id'      => 1,
                'user_id'     => 1,
                'type'        => 'smoke',
                'pop_spot'    => 'mid',
                'title'       => 'CT Smoke from Catwalk',
                'imgur_album' => 'https://imgur.com/a/nS4hJ',
                'is_working'  => true,
                'approved_by' => 1,
            ),
            array(
                'map_id'      => 8,
                'user_id'     => 1,
                'type'        => 'smoke',
                'pop_spot'    => 'mid',
                'title'       => 'Window Smoke from T Spawn',
                'imgur_album' => 'https://imgur.com/a/PrBrE',
                'is_working'  => true,
                'approved_by' => 1,
            ),
            array(
                'map_id'      => 8,
                'user_id'     => 1,
                'type'        => 'smoke',
                'pop_spot'    => 'a-site',
                'title'       => 'CT Spawn Smoke',
                'imgur_album' => 'https://imgur.com/a/S47Vb',
                'is_working'  => true,
                'approved_by' => 1,
            ),
            array(
                'map_id'      => 8,
                'user_id'     => 1,
                'type'        => 'smoke',
                'pop_spot'    => 'a-site',
                'title'       => 'Stairs Smoke from T Spawn',
                'imgur_album' => 'https://imgur.com/a/HIJ07',
                'is_working'  => true,
                'approved_by' => 1,
            ),
            array(
                'map_id'      => 8,
                'user_id'     => 1,
                'type'        => 'smoke',
                'pop_spot'    => 'a-site',
                'title'       => 'Jungle Smoke from Action/T Ramp',
                'imgur_album' => 'https://imgur.com/a/f1Wq1',
                'is_working'  => true,
                'approved_by' => 1,
            ),
            array(
                'map_id'      => 8,
                'user_id'     => 1,
                'type'        => 'smoke',
                'pop_spot'    => 'b-site',
                'title'       => 'Apartment Smoke for Shop',
                'imgur_album' => 'https://imgur.com/a/FyZNk',
                'is_working'  => true,
                'approved_by' => 1,
            ),
            array(
                'map_id'      => 8,
                'user_id'     => 1,
                'type'        => 'smoke',
                'pop_spot'    => 'b-site',
                'title'       => 'Apartment Smoke for Shop Doors',
                'imgur_album' => 'https://imgur.com/a/sPSAz',
                'is_working'  => true,
                'approved_by' => 1,
            ),
            array(
                'map_id'      => 8,
                'user_id'     => 1,
                'type'        => 'smoke',
                'pop_spot'    => 'b-site',
                'title'       => 'Apartment smoke for Catwalk/Arches',
                'imgur_album' => 'https://imgur.com/a/mQAWm',
                'is_working'  => true,
                'approved_by' => 1,
            ),
            array(
                'map_id'      => 8,
                'user_id'     => 1,
                'type'        => 'smoke',
                'pop_spot'    => 'b-site',
                'title'       => 'Smoke for B house balcony',
                'imgur_album' => 'https://imgur.com/a/yELwS',
                'is_working'  => true,
                'approved_by' => 1,
            ),
            array(
                'map_id'      => 8,
                'user_id'     => 1,
                'type'        => 'smoke',
                'pop_spot'    => 'b-site',
                'title'       => 'Apartment smoke for van',
                'imgur_album' => 'https://imgur.com/a/ZhmiJ',
                'is_working'  => true,
                'approved_by' => 1,
            ),
            array(
                'map_id'      => 8,
                'user_id'     => 1,
                'type'        => 'smoke',
                'pop_spot'    => 'other',
                'title'       => 'Catwalk Smoke from Top Mid',
                'imgur_album' => 'https://imgur.com/a/vdodV',
                'is_working'  => true,
                'approved_by' => 1,
            ),
            array(
                'map_id'      => 4,
                'user_id'     => 1,
                'type'        => 'smoke',
                'pop_spot'    => 'a-site',
                'title'       => 'Arch Smoke from Second Mid',
                'imgur_album' => 'https://imgur.com/a/JXz7m',
                'is_working'  => true,
                'approved_by' => 1,
            ),
            array(
                'map_id'      => 4,
                'user_id'     => 1,
                'type'        => 'smoke',
                'pop_spot'    => 'a-site',
                'title'       => 'Truck Smoke from Second Mid',
                'imgur_album' => 'https://imgur.com/a/p8f6o',
                'is_working'  => true,
                'approved_by' => 1,
            ),
            array(
                'map_id'      => 4,
                'user_id'     => 1,
                'type'        => 'smoke',
                'pop_spot'    => 'a-site',
                'title'       => 'Short/Boiler smoke from Second Mid',
                'imgur_album' => 'https://imgur.com/a/yblkA',
                'is_working'  => true,
                'approved_by' => 1,
            ),
            array(
                'map_id'      => 4,
                'user_id'     => 1,
                'type'        => 'smoke',
                'pop_spot'    => 'b-site',
                'title'       => 'CT Smoke from Banana 1',
                'imgur_album' => 'https://imgur.com/a/rZhjO',
                'is_working'  => true,
                'approved_by' => 1,
            ),
            array(
                'map_id'      => 4,
                'user_id'     => 1,
                'type'        => 'smoke',
                'pop_spot'    => 'b-site',
                'title'       => 'CT Smoke from Banana 2',
                'imgur_album' => 'https://imgur.com/a/yhtAl',
                'is_working'  => true,
                'approved_by' => 1,
            ),
            array(
                'map_id'      => 4,
                'user_id'     => 1,
                'type'        => 'smoke',
                'pop_spot'    => 'b-site',
                'title'       => 'Spools smoke from Banana',
                'imgur_album' => 'https://imgur.com/a/uPfZc',
                'is_working'  => true,
                'approved_by' => 1,
            ),
            array(
                'map_id'      => 4,
                'user_id'     => 1,
                'type'        => 'smoke',
                'pop_spot'    => 'b-site',
                'title'       => 'New Box/Fountain smoke from Banana',
                'imgur_album' => 'https://imgur.com/a/nQWsc',
                'is_working'  => true,
                'approved_by' => 1,
            ),
            array(
                'map_id'      => 4,
                'user_id'     => 1,
                'type'        => 'smoke',
                'pop_spot'    => 'a-site',
                'title'       => 'Library smoke from Second Mid',
                'imgur_album' => 'https://imgur.com/a/nOxpF',
                'is_working'  => true,
                'approved_by' => 1,
            ),
            array(
                'map_id'      => 2,
                'user_id'     => 1,
                'type'        => 'smoke',
                'pop_spot'    => 'a-site',
                'title'       => 'A3 smoke from big blue',
                'imgur_album' => 'https://imgur.com/a/Zj29K',
                'is_working'  => true,
                'approved_by' => 1,
            ),
            array(
                'map_id'      => 2,
                'user_id'     => 1,
                'type'        => 'smoke',
                'pop_spot'    => 'a-site',
                'title'       => 'A2 smoke from big blue',
                'imgur_album' => 'https://imgur.com/a/0aO9v',
                'is_working'  => true,
                'approved_by' => 1,
            ),
            array(
                'map_id'      => 2,
                'user_id'     => 1,
                'type'        => 'smoke',
                'pop_spot'    => 'a-site',
                'title'       => 'A1 smoke from big blue',
                'imgur_album' => 'https://imgur.com/a/ozyZE',
                'is_working'  => true,
                'approved_by' => 1,
            ),
            array(
                'map_id'      => 2,
                'user_id'     => 1,
                'type'        => 'smoke',
                'pop_spot'    => 'a-site',
                'title'       => 'Ladder Train/Connector smoke',
                'imgur_album' => 'https://imgur.com/a/05oil',
                'is_working'  => true,
                'approved_by' => 1,
            ),
            array(
                'map_id'      => 2,
                'user_id'     => 1,
                'type'        => 'smoke',
                'pop_spot'    => 'a-site',
                'title'       => 'Connector smoke from T spawn',
                'imgur_album' => 'https://imgur.com/a/UcjmJ',
                'is_working'  => true,
                'approved_by' => 1,
            ),
            array(
                'map_id'      => 3,
                'user_id'     => 1,
                'type'        => 'smoke',
                'pop_spot'    => 'other',
                'title'       => 'Heaven smoke from T roof',
                'imgur_album' => 'https://imgur.com/a/FHhjo',
                'is_working'  => true,
                'approved_by' => 1,
            ),
            array(
                'map_id'      => 3,
                'user_id'     => 1,
                'type'        => 'smoke',
                'pop_spot'    => 'other',
                'title'       => 'Garage smoke from Outside',
                'imgur_album' => 'https://imgur.com/a/uPiPB',
                'is_working'  => true,
                'approved_by' => 1,
            ),
            array(
                'map_id'      => 3,
                'user_id'     => 1,
                'type'        => 'smoke',
                'pop_spot'    => 'other',
                'title'       => 'Main smoke from Outside',
                'imgur_album' => 'https://imgur.com/a/dYKYl',
                'is_working'  => true,
                'approved_by' => 1,
            ),
            array(
                'map_id'      => 3,
                'user_id'     => 1,
                'type'        => 'smoke',
                'pop_spot'    => 'other',
                'title'       => 'Ramp smoke from radio',
                'imgur_album' => 'https://imgur.com/a/GXkxF',
                'is_working'  => true,
                'approved_by' => 1,
            ),
            array(
                'map_id'      => 1,
                'user_id'     => 1,
                'type'        => 'smoke',
                'pop_spot'    => 'mid',
                'title'       => 'CT Spawn smoke from catwalk',
                'imgur_album' => 'https://imgur.com/a/nS4hJ',
                'is_working'  => true,
                'approved_by' => 1,
            ),
            array(
                'map_id'      => 1,
                'user_id'     => 1,
                'type'        => 'smoke',
                'pop_spot'    => 'mid',
                'title'       => 'CT Spawn smoke from Mid',
                'imgur_album' => 'https://imgur.com/a/hSu1m',
                'is_working'  => true,
                'approved_by' => 1,
            ),
            array(
                'map_id'      => 1,
                'user_id'     => 1,
                'type'        => 'smoke',
                'pop_spot'    => 'b-site',
                'title'       => 'Door smoke from Upper Tunnels',
                'imgur_album' => 'https://imgur.com/a/nKYJK',
                'is_working'  => true,
                'approved_by' => 1,
            ),
            array(
                'map_id'      => 1,
                'user_id'     => 1,
                'type'        => 'smoke',
                'pop_spot'    => 'mid',
                'title'       => 'Xbox smoke from T spawn',
                'imgur_album' => 'https://imgur.com/a/Xzr9O',
                'is_working'  => true,
                'approved_by' => 1,
            ),
            array(
                'map_id'      => 1,
                'user_id'     => 1,
                'type'        => 'smoke',
                'pop_spot'    => 'a-site',
                'title'       => 'Crossover smoke from Long Doors',
                'imgur_album' => 'https://imgur.com/a/Upf6Y',
                'is_working'  => true,
                'approved_by' => 1,
            ),
            array(
                'map_id'      => 1,
                'user_id'     => 1,
                'type'        => 'smoke',
                'pop_spot'    => 'a-site',
                'title'       => 'CT smoke from Short',
                'imgur_album' => 'https://imgur.com/a/95HDR',
                'is_working'  => true,
                'approved_by' => 1,
            ),
            array(
                'map_id'      => 5,
                'user_id'     => 1,
                'type'        => 'smoke',
                'pop_spot'    => 'a-site',
                'title'       => 'Forklift smoke from Warehouse',
                'imgur_album' => 'https://imgur.com/a/u3Jxf',
                'is_working'  => true,
                'approved_by' => 1,
            ),
            array(
                'map_id'      => 5,
                'user_id'     => 1,
                'type'        => 'smoke',
                'pop_spot'    => 'mid',
                'title'       => 'Mid smokes from T Ramp',
                'imgur_album' => 'https://imgur.com/a/yEFfQ',
                'is_working'  => true,
                'approved_by' => 1,
            ),
            array(
                'map_id'      => 5,
                'user_id'     => 1,
                'type'        => 'smoke',
                'pop_spot'    => 'a-site',
                'title'       => 'Truck/Ramp smoke from A Long',
                'imgur_album' => 'https://imgur.com/a/uzrt2',
                'is_working'  => true,
                'approved_by' => 1,
            ),
            array(
                'map_id'      => 5,
                'user_id'     => 1,
                'type'        => 'smoke',
                'pop_spot'    => 'b-site',
                'title'       => 'Vent room smoke from Long Halls',
                'imgur_album' => 'https://imgur.com/a/b2B5Z',
                'is_working'  => true,
                'approved_by' => 1,
            ),
            array(
                'map_id'      => 5,
                'user_id'     => 1,
                'type'        => 'smoke',
                'pop_spot'    => 'b-site',
                'title'       => 'Generator smoke from Window',
                'imgur_album' => 'https://imgur.com/a/mZlQI',
                'is_working'  => true,
                'approved_by' => 1,
            ),
            array(
                'map_id'      => 5,
                'user_id'     => 1,
                'type'        => 'smoke',
                'pop_spot'    => 'b-site',
                'title'       => 'CT Smoke from Long Halls',
                'imgur_album' => 'https://imgur.com/a/25zgT',
                'is_working'  => true,
                'approved_by' => 1,
            ),
            array(
                'map_id'      => 7,
                'user_id'     => 1,
                'type'        => 'smoke',
                'pop_spot'    => 'b-site',
                'title'       => 'CT lower smoke',
                'imgur_album' => 'http://imgur.com/a/U6kEn',
                'is_working'  => true,
                'approved_by' => 1,
            ),
            array(
                'map_id'      => 5,
                'user_id'     => 1,
                'type'        => 'smoke',
                'pop_spot'    => 'b-site',
                'title'       => 'Generator smoke from Window 2',
                'imgur_album' => 'http://imgur.com/a/kF2Qq',
                'is_working'  => true,
                'approved_by' => 1,
            ),
            array(
                'map_id'      => 5,
                'user_id'     => 1,
                'type'        => 'smoke',
                'pop_spot'    => 'b-site',
                'title'       => 'Heaven smoke from Long Halls',
                'imgur_album' => 'http://imgur.com/a/L8n9v',
                'is_working'  => true,
                'approved_by' => 1,
            ),
            array(
                'map_id'      => 5,
                'user_id'     => 1,
                'type'        => 'smoke',
                'pop_spot'    => 'a-site',
                'title'       => 'Quad Smoke from A Long',
                'imgur_album' => 'http://imgur.com/a/S8cGU',
                'is_working'  => true,
                'approved_by' => 1,
            ),
            array(
                'map_id'      => 5,
                'user_id'     => 1,
                'type'        => 'smoke',
                'pop_spot'    => 'a-site',
                'title'       => 'Catwalk smoke from A Long',
                'imgur_album' => 'http://imgur.com/a/ozUQO',
                'is_working'  => true,
                'approved_by' => 1,
            ),
            array(
                'map_id'      => 9,
                'user_id'     => 1,
                'type'        => 'smoke',
                'pop_spot'    => 'b-site',
                'title'       => 'Main Smoke from Upper T Site',
                'imgur_album' => 'http://imgur.com/a/koWU0',
                'is_working'  => true,
                'approved_by' => 1,
            ),
            array(
                'map_id'      => 9,
                'user_id'     => 1,
                'type'        => 'smoke',
                'pop_spot'    => 'other',
                'title'       => 'Connector smoke from A Long',
                'imgur_album' => 'http://imgur.com/a/hnaFO',
                'is_working'  => true,
                'approved_by' => 1,
            ),
            array(
                'map_id'      => 9,
                'user_id'     => 1,
                'type'        => 'smoke',
                'pop_spot'    => 'a-site',
                'title'       => 'Balcony smoke from Long A',
                'imgur_album' => 'http://imgur.com/a/1Q8Ff',
                'is_working'  => true,
                'approved_by' => 1,
            ),
            array(
                'map_id'      => 4,
                'user_id'     => 1,
                'type'        => 'smoke',
                'pop_spot'    => 'b-site',
                'title'       => 'Boxes Smoke',
                'imgur_album' => 'http://imgur.com/a/pWyz0',
                'is_working'  => true,
                'approved_by' => 1,
            ),
            array(
                'map_id'      => 1,
                'user_id'     => 1,
                'type'        => 'smoke',
                'pop_spot'    => 'a-site',
                'title'       => 'Back of A smoke',
                'imgur_album' => 'http://imgur.com/a/4e5sh',
                'is_working'  => true,
                'approved_by' => 1,
            ),
            array(
                'map_id'      => 1,
                'user_id'     => 1,
                'type'        => 'smoke',
                'pop_spot'    => 'other',
                'title'       => 'A Long Smoke',
                'imgur_album' => 'http://imgur.com/a/rTHe1',
                'is_working'  => true,
                'approved_by' => 1,
            ),
            array(
                'map_id'      => 1,
                'user_id'     => 1,
                'type'        => 'smoke',
                'pop_spot'    => 'a-site',
                'title'       => 'A Short smoke',
                'imgur_album' => 'http://imgur.com/a/8yf11',
                'is_working'  => true,
                'approved_by' => 1,
            ),
            array(
                'map_id'      => 1,
                'user_id'     => 1,
                'type'        => 'smoke',
                'pop_spot'    => 'other',
                'title'       => 'CT base smoke from Short',
                'imgur_album' => 'http://imgur.com/a/eNIuE',
                'is_working'  => true,
                'approved_by' => 1,
            ),
            array(
                'map_id'      => 4,
                'user_id'     => 1,
                'type'        => 'smoke',
                'pop_spot'    => 'a-site',
                'title'       => 'Arch smoke from Top Banana',
                'imgur_album' => 'http://imgur.com/a/L65if',
                'is_working'  => true,
                'approved_by' => 1,
            ),
        );
    }
}
