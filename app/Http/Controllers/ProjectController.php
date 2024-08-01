<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProjectStoreRequest;
use App\Http\Requests\ProjectUpdateRequest;
use App\Models\Project;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProjectController extends Controller
{
    public function index(Request $request): View
    {

        $projects = auth()->user()->projects->sortByDesc('created_at');

        return view('project.index', compact('projects'));
    }

    public function create(Request $request): View
    {
        return view('project.create');
    }

    public function store(ProjectStoreRequest $request): RedirectResponse
    {
        // Get the authenticated user's ID
        $ownerId = auth()->id();



        // Create a new project with the given data
        $project = Project::create([
            'owner_id' => $ownerId,
            'title' => $request->input('title'),
            'description' => $request->input('description', ''), // Use input with default value
            'status' => 'active'
        ]);

        // Flash project id to session if needed
        // $request->session()->flash('project.id', $project->id);

        // Redirect to the projects index route
        return redirect()->route('projects.index');
    }

    public function show(Request $request, Project $project): View
    {
        $this->authorize('view', $project);
        $project->load(['sprints' => function ($query) {
            $query->orderBy('created_at', 'desc');
        }]);

        return view('project.show', compact('project'));
    }

    public function edit(Request $request, Project $project): View
    {
        $this->authorize('update', $project);
        return view('project.edit', compact('project'));
    }

    public function update(ProjectUpdateRequest $request, Project $project): RedirectResponse
    {
        $this->authorize('update', $project);
        $project->update($request->validated());



        return redirect()->route('projects.index')->with('success',  $project->title . 'a été mis à jour');
    }

    public function destroy(Request $request, Project $project): RedirectResponse
    {
        $this->authorize('delete', $project);
        $project->delete();

        return redirect()->route('projects.index');
    }
}
