<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StoreTechnologyRequest;
use App\Http\Requests\UpdateTechnologyRequest;
use App\Models\Technology;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class TechnologyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $technologies = Technology::all();
        return view('admin.technologies.index', compact('technologies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.technologies.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTechnologyRequest $request)
    {
        $formData = $request->validated();
        //CREATE SLUG
        $slug = Str::of($formData['name'])->slug('-');
        //add slug to formData
        $formData['slug'] = $slug;
        $technology = Technology::create($formData);
        return redirect()->route('admin.technologies.show', $technology->slug);
    }

    /**
     * Display the specified resource.
     */
    public function show(Technology $technology)
    {
        return view('admin.technologies.show',compact('technology'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Technology $technology)
    {
        $currentUserId= Auth::id();
        if($currentUserId !=1) {
            abort(403);
        }
        return view('admin.technologies.edit',compact('technology'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTechnologyRequest $request, Technology $technology)
    {
        $formData = $request->validated();
        $formData['slug'] = $technology->slug;

        if ($technology->name !== $formData['name']) {
            //CREATE SLUG
            $slug = Str::of($formData['name'])->slug('-');
            $formData['slug'] = $slug;
        }
        $technology->update($formData);
        return redirect()->route('admin.technologies.show', $technology->slug);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Technology $technology)
    {
        $currentUserId= Auth::id();
        if($currentUserId !=1) {
            abort(403);
        }
        $technology->delete();
        return to_route('admin.technologies.index')->with('message', "$technology->name eliminato con successo");
    }
}
