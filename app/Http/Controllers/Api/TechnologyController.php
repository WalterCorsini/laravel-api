<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Technology;
use Illuminate\Http\Request;

class TechnologyController extends Controller
{
    public function index()
    {
        $data = Technology::all('id','name');
        return response()->json([
            'results' => $data,
        ]);
    }
}
