<?php

namespace App\Http\Controllers;
use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Models\Treck;
use Illuminate\Support\Facades\Redirect;


class TreckController extends Controller
{
    public function trecks()
    {
        dd('heya');
        return Inertia::render('dashboard', [
          'trecks' => Treck::all(),
        ]);
    }

    public function newtreck(Request $request)
    {
        Treck::create($request->validate([
            'title' => ['required', 'max:50'],
            'description' => ['required', 'max:500'],
        ]));
        dd($request);


        
        return to_route('dashboard')
        ->with('message', 'Category Created Successfully');

    }
}
