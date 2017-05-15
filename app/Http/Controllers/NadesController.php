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

    public function saveNade(Request $request, Nade $nade = null)
    {
        if (!$nade) {
            $nade = new Nade();
            $route = 'get.nades.add';
        } else {
            $route = 'get.nades.edit';
        }

        $map  = Map::where('name', $request->get('map'))->first();
        $user = Auth::user();

        $nade->map()->associate($map);

        if (!$nade->user_id) {
            $nade->user()->associate($user);
        }

        $nade->type        = $request->get('type');
        $nade->pop_spot    = $request->get('pop_spot');
        $nade->title       = $request->get('title');
        $nade->imgur_album = $request->get('imgur_album');
        $nade->youtube     = $request->get('youtube');
        $nade->tags        = $request->get('tags');
        $nade->is_working  = ($request->get('is_working') == 'on' ? true : false);

        if ($user->is_mod) {
            if ($request->get('is_approved')) {
                $nade->approve($user);
            } else {
                $nade->unapprove();
            }
        }

        if (!$nade->save()) {
            return $route->withFlashDanger('There were some problems with your nade.')
                         ->withErrors($nade->getValidator())
                         ->withInput();
        }

        return redirect()->route($route, $nade->id)->withFlashSuccess('Your nade has been saved.');
    }

    public function deleteNade()
    {
        # code...
    }

    public function showNadesInMap(Map $map)
    {
        $nades = $map->nades()->approved()
            ->orderBy('approved_at', 'desc')
            ->orderBy('created_at', 'desc')
            ->orderBy('id', 'desc')
            ->get();

        return view('nades.ungrouped')->with([
            'heading'   => "$map->name Nades",
            'map'       => $map,
            'nades'     => $nades,
        ]);
    }

    public function showMapAtPopSpot(Map $map, $pop)
    {
        return $map . " | " . $pop;
    }

    public function showNadeForm(Nade $nade = null)
    {
        if ($nade) {
            $route = array('post.nades.edit', $nade->id);
            $nade->is_approved = false;

            if ($nade->isApproved()) {
                $nade->is_approved = true;
            }
        } else {
            $nade      = new Nade();
            $nade->map = new Map();
            $route     = ['post.nades.add'];
        }

        $viewData = [
            'heading'   => 'Add A Nade',
            'mapList'   => Map::all()->sortBy('name')->pluck('name', 'id'),
            'nade'      => $nade,
            'nadeTypes' => $nade->getNadeTypes(),
            'popSpots'  => $nade->getPopSpots(),
            'route'     => $route,
        ];

        return view('nades.nade-form')->with($viewData);
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
