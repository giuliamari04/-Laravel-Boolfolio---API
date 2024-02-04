<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Technology;

class technologyController extends Controller
{
    public function index()
    {
        $technologies = Technology::all();
        return response()->json(
            [
                'success' => true,
                'results' => $technologies
            ]
        );
    }
    public function show($slug)
    {
        $technology = Technology::where('slug', $slug)->first();
        return response()->json(
            [
                'success' => true,
                'results' => $technology
            ]
        );
    }

}
