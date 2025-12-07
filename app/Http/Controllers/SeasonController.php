<?php

namespace App\Http\Controllers;

use App\Models\Season;
use Illuminate\Http\Request;

class SeasonController extends Controller
{
    public function index()
    {
        $seasons = Season::all();
        return view('seasons.index', ['seasons' => $seasons]);
    }

    public function store()
    {
        //turn off the last active season
        Season::findOrFail(request('active_season'))
            ->update([
                'active' => false
            ]);
        // set active season
        Season::findOrFail(request('season'))
            ->update([
                'active' => true
            ]);
        return redirect('/seasons');
    }
}
