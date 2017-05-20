<?php
namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Models\Nade;
use App\Models\Map;
use Illuminate\Http\Request;
use Auth;

class NadesController extends Controller
{
    public function addNade()
    {
        //
    }

    public function saveNade(Request $request, Nade $nade)
    {
        $route = $nade->exists ? 'get.nades.edit' : 'get.nades.add';

        $map  = Map::findBySlug($request->get('map'));
        $user = Auth::user();

        $nadeData = $request->only([
            'type', 'pop_spot', 'title', 'imgur_album', 'youtube', 'tags',
            'is_working',
        ]);

        $nade->maybeForUser($user)
            ->forMap($map)
            ->fill($nadeData)
            ->maybeChangeApproved($user, $request->get('is_approved'));

        if (!$nade->save()) {
            return $route->withFlashDanger('There were some problems with your nade.')
                         ->withErrors($nade->getValidator())
                         ->withInput();
        }

        return redirect()->route($route, $nade->id)->withFlashSuccess('Your nade has been saved.');
    }

    public function showNadesInMap(Map $map)
    {
        return view('nades.ungrouped')->with([
            'heading'   => "$map->name Nades",
            'map'       => $map,
            'nades'     => $map->nades()->approved()->preferredOrder()->get(),
        ]);
    }

    public function showMapAtPopSpot(Map $map, $pop)
    {
        return $map . " | " . $pop;
    }

    public function showNadeForm(Nade $nade)
    {
        return view('nades.nade-form', [
            'heading'   => 'Add A Nade',
            'mapList'   => Map::all()->sortBy('name')->pluck('name', 'slug'),
            'nade'      => $nade,
            'nadeTypes' => Nade::getTypes(),
            'popSpots'  => Nade::getPopSpots(),
            'route'     => $nade->exists ? ['post.nades.edit', $nade->id] : ['post.nades.add'],
        ]);
    }

    public function showUnapprovedNades()
    {
        $nades    = Nade::where('approved_by', null)->get();
        $viewData = [
            'heading' => 'Unapproved Nades',
            'nades'   => $nades,
        ];

        return view('nades.ungrouped')->with($viewData);
    }
}
