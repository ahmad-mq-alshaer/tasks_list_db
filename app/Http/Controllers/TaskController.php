<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TaskController extends Controller
{
    public function index()
    {
        //$tasks = DB::table('tasks')->get();
       

        $tasks = Task::all();
        return view('tasks', compact('tasks'));
    }


    public function insert(Request $request)
    {
        //debug
        //dd($request);
        // $task = new Task;
        // $task->name = $request->name;
        // $task->save;

        Task::create([
            'name' => $request->name
        ]);
        // DB::table('tasks')->insert([
        //     'name' => $request->name,
        //     'created_at' => now(),
        //     'updated_at' => now()
        // ]);

        return redirect()->back();
    }

    public function delete($id)
    {
        // DB::table('tasks')->where('id', $id)->delete();

        // $task = Task::where('id', $id)->get();

        //لما بدي احذف فقط بدون ما استخدم اي شروطبعطيه ال id
        $task = Task::find($id);

        $task->delete();

        return redirect()->back();
    }

    public function edit($id)
    {
        $task = DB::table('tasks')->where('id', $id)->update(['active' => true]);;
        return view('task_update', compact('task'));
    }
}
