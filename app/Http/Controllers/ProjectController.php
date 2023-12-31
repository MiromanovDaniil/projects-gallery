<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response 
    {
      return Inertia::render('Projects/Index', [
        'projects' => Project::all()->map(function($project) {
          return [
            'id' => $project->id,
            'title' => $project->title,
            'description'=> $project->description,
            'image' => asset('storage/'. $project->image)
          ];
        })
    ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
      return Inertia::render('Projects/Create', [
        //
    ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $image = $request->file('image')->store('topics', 'public');
        Project::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'image' => $image,
        ]);
        return redirect('/projects');
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        return Inertia::render('Projects/Edit',[
          'project' => $project,
          'image' => asset('storage/'. $project->image)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
       $image = $project->image;
       if ($request->hasFile('image')) {
          Storage::delete('public/'. $project->image);
          $image = $request->file('image')->store('topics', 'public');
       }
       $project->update([
          'title' => $request->input('title'),
          'description' => $request->input('description'),
          'image' => $image,
       ]);
       return redirect('/projects');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
      Storage::delete('public/'. $project->image);
      $project->delete();
          return redirect('/projects');
    }
}
