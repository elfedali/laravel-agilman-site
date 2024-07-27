<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{


    // page home
    public function index()
    {
        return view('home');
    }

    // page show project details
    public function show($project)
    {
        return view('project', compact('project'));
    }

    // page task details
    public function task($task)
    {
        return view('task', compact('task'));
    }
}
