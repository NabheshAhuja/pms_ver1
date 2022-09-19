<?php

namespace App\Http\Controllers;

use App\Models\Tasks;
use Illuminate\Http\Request;

class TaskController extends Controller
{
        public function index()
    {
        $tasks = Tasks::orderBy('order','ASC')->get();

        return view('task',compact('tasks'));
    }
    public function update(Request $request)
    {
        $tasks = Tasks::all();

        foreach ($tasks as $task) {
            foreach ($request->order as $order) {
                if ($order['id'] == $task->id) {
                    $task->update(['order' => $order['position']]);
                }
            }
        }

        return response('Update Successfully.', 200);
    }
}
