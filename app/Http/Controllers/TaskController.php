<?php

namespace App\Http\Controllers;

use App\Models\Tasks;
use Illuminate\Http\Request;

class TaskController extends Controller
{
       public function index()
    {
        $tasks = auth()->user()->statuses()->with('tasks')->get();

        return view('tasks.index', compact('tasks'));
    }

public function store(Request $request)
{
    $this->validate($request, [
        'title' => ['required', 'string', 'max:56'],
        'description' => ['required', 'string'],
        'status_id' => ['required', 'exists:statuses,id']
    ]);

    return $request->user()
        ->tasks()
        ->create($request->only('title', 'description', 'status_id'));
}
}
