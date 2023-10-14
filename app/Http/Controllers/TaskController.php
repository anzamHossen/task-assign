<?php

namespace App\Http\Controllers;

use App\Models\TaskManagement;
use Illuminate\Http\Request;

class TaskController extends Controller
{

    public function taskDetails()
    {
        $task = TaskManagement::simplePaginate(7);
        return view('show-task-details', compact('task'));
    }

    public function index()
    {
        return view('create-task');
    }

    public function save(Request $request)
    {
        // check method
        if ($request->isMethod('POST')) {
            //  check validation
            $request->validate([
                'task_name' => 'required',
                'task_priority' => 'required',
                'task_timestamp' => 'required',
            ]);

            //create task
            $task = TaskManagement::create([
                'task_name' => $request->task_name,
                'task_priority' => $request->task_priority,
                'task_timestamp' => $request->task_timestamp,
                'status' => $request->status,

            ]);
            $task->save();
            return redirect()->route('show_task_deteails')->with('message', 'Task added successfully');
        }
    }


    public function editTask(Request $request, $id)
    {
        // check method
        if ($request->isMethod('POST')) {
            // validation
            $request->validate([
                'task_name' => 'required',
                'task_priority' => 'required',
                'task_timestamp' => 'required',
            ]);

            $result = TaskManagement::find($id);
            $result->update([
                'task_name' => $request->task_name,
                'task_priority' => $request->task_priority,
                'task_timestamp' => $request->task_timestamp,
                'status' => $request->status,
            ]);
            $result->save();
            //return
            return redirect()->route('show_task_deteails')->with('message', 'Task Updated Successfully.');
        } else {
            $taskUpdate = TaskManagement::find($id);
            return view('edit-task', [
                'taskUpdate' => $taskUpdate,
            ]);
        }
    }

    public function destroy($id)
    {
        TaskManagement::find($id)->delete();
        return redirect()->back()->with('message', 'Video Deleted Successfully.');
    }


    public function taskPage()
    {
        $getTask = TaskManagement::where('status', 1)
            ->orderBy('task_priority', 'DESC')
            ->get();
        return view('show-task-page', compact('getTask'));
    }
}
