<?php
namespace App\Http\Controllers;

use App\Models\Map;

class MapsController extends Controller
{
    public function showAllMaps()
    {
        $maps = Map::all()->sortBy('name');

        $viewData = array(
            'maps'    => $maps,
            'heading' => 'Maps',
        );

        return view('maps.all-maps')->with($viewData);
    }

    public function addMap()
    {
        # code...
    }

    public function editMap()
    {
        # code...
    }

    public function deleteMap()
    {
        # code...
    }
}
