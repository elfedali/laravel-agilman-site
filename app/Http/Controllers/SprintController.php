<?php

namespace App\Http\Controllers;

use App\Http\Requests\SprintStoreRequest;
use App\Http\Requests\SprintUpdateRequest;
use App\Models\Sprint;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SprintController extends Controller
{
    public function index(Request $request): View
    {
        // with tasks
        $sprints = Sprint::with('tasks')->get();


        return view('sprint.index', compact('sprints'));
    }

    public function create(Request $request): View
    {
        return view('sprint.create');
    }

    public function store(SprintStoreRequest $request): RedirectResponse
    {
        $sprint = Sprint::create($request->validated());



        return redirect()->route('projects.show', $sprint->project->slug)
            ->with('success', 'Le sprint a été créé avec succès.');
    }

    public function show(Request $request, Sprint $sprint): View
    {
        return view('sprint.show', compact('sprint'));
    }

    public function edit(Request $request, Sprint $sprint): View
    {
        return view('sprint.edit', compact('sprint'));
    }

    public function update(SprintUpdateRequest $request, Sprint $sprint): RedirectResponse
    {
        $sprint->update($request->validated());

        $request->session()->flash('sprint.id', $sprint->id);

        return redirect()->route('sprints.index');
    }

    public function destroy(Request $request, Sprint $sprint): RedirectResponse
    {
        $sprint->delete();

        return redirect()->route('sprints.index');
    }
}
