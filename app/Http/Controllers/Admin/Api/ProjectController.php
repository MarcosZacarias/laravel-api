<?php

namespace App\Http\Controllers\Admin\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Type;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::select('id', 'type_id', 'name', 'slug', 'cover_img', 'description')
            ->with('type:id,color,label', 'technologies:id,color,label')
            ->orderByDesc('id')
            ->paginate(12);

        foreach ($projects as $project) {
            $project->description = $project->getDescriptionIndeX(200);
            $project->cover_img = $project->getAbsUriImage();
        }
        
        return response()->json($projects);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {   
        $project = Project::select('id', 'type_id', 'name', 'slug', 'cover_img', 'description')
        ->where('slug', $slug)
        ->with('type:id,color,label', 'technologies:id,color,label')
        ->first();

        $project->cover_img = $project->getAbsUriImage();

        if (!$project)
            abort(404, 'Project not found');

        return response()->json($project);
    }
}