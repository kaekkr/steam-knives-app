<?php

namespace App\Http\Controllers;

use App\Models\Knife;
use Illuminate\Http\Request;

class KnifeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Knife::query();

        if ($search = $request->query('search')) {
            $query->where('name', 'like', '%' . $search . '%');
        }

        $knives = $query->get();

        return view('knives.index', compact('knives', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('knives.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'image_url' => 'nullable|url',
        ]);

        Knife::create($validated);

        return redirect()->route('knives.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Knife $knife)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Knife $knife)
    {
        return view('knives.edit', compact('knife'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Knife $knife)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'image_url' => 'nullable|url',
        ]);

        $knife->update($validated);
        return redirect()->route('knives.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Knife $knife)
    {
        $knife->delete();
        return redirect()->route('knives.index');
    }
}
