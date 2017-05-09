<?php
namespace App\Http\Controllers;

use App\Models\Map;
use App\Models\Nade;

class MapsController extends Controller
{
    public function showAllMaps()
    {
        $maps = Map::all()->sortBy('name');
        $nade = new Nade();
        $viewData = array(
            'maps'    => $maps,
            'heading' => 'Maps',
            'nadeTypes' => $nade->getNadeTypes(),
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
