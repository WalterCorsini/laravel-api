<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Project::with(['type','technologies'])->withCount(['technologies']);

        if($request->type_id){
            $query->where('type_id', $request->type_id);
        }
        if ($request->has('technology_id')) {
            $query->filterByTechnologyId($request->technology_id);
        }
        $query = $query->paginate(12);
        $data =[
            'result' => 'success',
            'response' => $query,
        ];
        return response()->json($data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $slug)
    {
        $project = Project::with(['type','technologies'])->where('slug', $slug)->first();
        if (!$project) {
            return response()->json([
                'result'=> 'false'
            ],404);
        }

        $data = [
            'result'=> $project,
            'success'=> 'success',
        ];
        return response()->json($data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
