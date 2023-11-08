<?php

namespace App\Http\Controllers\Admin\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Type;
use Illuminate\Http\Request;

class TypesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($type_id)
    {
        $type = Type::select('id', 'color', 'label')
            ->where('id', $type_id)
            ->first();

        if (!$type)
            abort(404, 'Type not found');

        $projects = Project::select('id', 'type_id', 'name', 'slug', 'cover_img', 'description')
            ->where('type_id', $type_id)
            ->with('type:id,color,label', 'technologies:id,color,label')
            ->orderByDesc('id')
            ->paginate(12);

        foreach ($projects as $project) {
            $project->description = $project->getDescriptionIndeX(200);
            $project->cover_img = $project->getAbsUriImage();
        }
        
        return response()->json([
            'type' => $type,
            'projects'=> $projects,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}