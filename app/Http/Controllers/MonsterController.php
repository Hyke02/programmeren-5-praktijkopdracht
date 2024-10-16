<?php

namespace App\Http\Controllers;

use App\Models\Monster;
use App\Models\Species;
use Illuminate\Http\Request;

class MonsterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $species = Species::all();

        $monsters = Monster::query();

        if ($request->filled('species_id')) {
            $monsters->where('species_id', $request->species_id);
        }

        $monsters = $monsters->with('species')->get();

        return view('monster.index', compact('monsters', 'species'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('monster.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $monster = new Monster();

        $monster->name = $request->input('name');
        $monster->description = $request->input('description');
        $monster->thumbnail = $request->input('thumbnail');

        $monster->species_id = 20;
        $monster->user_id = 20;

        $monster->save();

        return redirect()->route('monster.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $monster = Monster::find($id);

        return view('monster.show', compact('monster'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $monster = Monster::find($id);

        return view('monster.edit', compact('monster'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'thumbnail' => 'required|string|max:255',
            'description' => 'required|string'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
