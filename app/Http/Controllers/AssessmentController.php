<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Assessment;
use App\Project;

class AssessmentController extends Controller
{
    protected $request;
    private $repository;

    public function __construct(Request $request, Assessment $assessment)
    {
        $this->middleware('auth');
        $this->request = $request;
        $this->repository = $assessment;
    }

    public function index()
    {
        $assessments = Assessment::get();
        return view('app.assessments.index', compact('assessments'));
    }

    public function create()
    {
        $projects = Project::get();
        return view ('app.assessments.create', ['projects' => $projects]);
    }

    public function store(Request $request)
    {
        $assessment = new Assessment();
        $assessment = $assessment->create([
            'projects_id' => $request['projects_id'],
            'title' => $request['title'],
            'description' => $request['description'],
            'resolution' => $request['resolution'],
            'type' => $request['type']
     ]);

        \Session::flash('success','Relatório cadastrado com sucesso!');

        return redirect()->route('assessments.index');
    }

    public function show($id)
    {
        if (!$assessment = $this->repository->find($id))
        return redirect()->back();
        return view('app.assessments.show', ['assessment' => $assessment]);
    }

    public function edit($id)
    {
        $projects = Project::get();
        $assessment = Assessment::findOrFail($id);
        return view('app.assessments.edit', ['assessment' => $assessment, 'projects' => $projects]);

    }

    public function update(Request $request, $id)
    {
        $assessment = Assessment::findOrFail($id);
        $assessment->update([
            'projects_id' => $request['projects_id'],
            'title' => $request['title'],
            'description' => $request['description'],
            'resolution' => $request['resolution'],
            'type' => $request['type']
        ]);

        \Session::flash('success','Relatório atualizado com sucesso!');
        return redirect()->route('assessments.index');
    }

    public function destroy($id)
    {
        $assessment = Assessment::findOrFail($id);
        $assessment->delete();

        \Session::flash('success','Relatório deletado com sucesso!');

        return redirect()->route('assessments.index');
    }
}
