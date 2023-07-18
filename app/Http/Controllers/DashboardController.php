<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function index()
    {
        $projects = Project::all()->map(function ($project) {
            return [
                'id' => $project->id,
                'title' => $project->title,
                'description' => $project->description,
                'image' => asset('storage/' . $project->image),
            ];
        });

        return Inertia::render('Dashboard', [
            'projects' => $projects,
        ]);
    }
}
