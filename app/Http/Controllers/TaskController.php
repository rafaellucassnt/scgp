<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use App\Project;

class TaskController extends Controller
{
    protected $request;
    private $repository;

    public function __construct(Request $request, Task $task)
    {
        $this->middleware('auth');
        $this->request = $request;
        $this->repository = $task;
    }

    public function index()
    {
        $tasks = Task::get();
        return view('app.tasks.index', compact('tasks'));
    }

    public function create()
    {
        return view ('app.tasks.create');
    }

    public function store(Request $request)
    {
        $task = new Task();
        $task = $task->create([
            'projects_id' => $request['projects_id'],
            'title' => $request['title'],
            'description' => $request['description'],
            'tag' => $request['tag'],
            'status' => $request['status'],
            'start_date' => $request['start_date'],
            'end_date' => $request['end_date'],
     ]);

        \Session::flash('success','Relatório cadastrado com sucesso!');

        return redirect()->route('tasks.index');
    }

    public function show($id)
    {
        if (!$task = $this->repository->find($id))
        return redirect()->back();
        return view('app.tasks.show', ['task' => $task]);
    }

    public function edit($id)
    {
        $task = Task::findOrFail($id);
        return view('app.tasks.edit',['task' => $task]);
    }

    public function update(Request $request, $id)
    {
        $task = Task::findOrFail($id);
        $task->update([
            'projects_id' => $request['projects_id'],
            'title' => $request['title'],
            'description' => $request['description'],
            'tag' => $request['tag'],
            'status' => $request['status'],
            'start_date' => $request['start_date'],
            'end_date' => $request['end_date'],
        ]);

        \Session::flash('success','Relatório atualizado com sucesso!');
        return redirect()->route('tasks.index');
    }

    public function destroy($id)
    {
        $task = Task::findOrFail($id);
        $task->delete();

        \Session::flash('success','Relatório deletado com sucesso!');

        return redirect()->route('tasks.index');
    }
}
