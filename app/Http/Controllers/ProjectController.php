<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\Assessment;
use App\User;
use GuzzleHttp\Client;

class ProjectController extends Controller
{
    protected $request;
    private $repository;

    public function __construct(Request $request, Project $project)
    {
        $this->middleware('auth');
        $this->request = $request;
        $this->repository = $project;
    }

    public function index()
    {
        $projects = Project::get();
        return view('app.projects.index', compact('projects'));
    }

    public function create()
    {
        $trelloData = [];
        $gitHubData = [];

        $client = new Client();
        $key = env('TRELLO_KEY');

        $token_trello = Auth()->user()->token_trello;
        $token_github = Auth()->user()->token_github;

        $api_trello = 'https://api.trello.com/1/members/me/boards?key=' . $key . '&token=' . $token_trello;
        $response_trello = $client->get($api_trello);

        $api_gitHub = 'https://api.github.com/users/'. $token_github .'/repos';
        $response_gitHub = $client->get($api_gitHub);


        if ($response_trello->getStatusCode() == 200) {
            $json = $response_trello->getBody();
            $trelloData = json_decode($json);
        }

        if ($response_gitHub->getStatusCode() == 200) {
            $json = $response_gitHub->getBody();
            $gitHubData = json_decode($json);
        }

        return view ('app.projects.create', ['trelloData' => $trelloData, 'gitHubData' => $gitHubData ] );

    }

    public function store(Request $request)
    {
        $project = new Project();
         $project = $project->create([
         'title'  => $request['title'],
         'type'  => $request['type'],
         'user_id'  => $request['user_id'],
         'description'  => $request['description'],
         'status'  => $request['status'],
         'token_repository_github' => $request['token_repository_github'],
         'token_board_trello' => $request['token_board_trello'],
         'start_date'  => $request['start_date'],
         'end_date'  => $request['end_date'],
     ]);

        \Session::flash('success','Projeto cadastrado com sucesso!');

        return redirect()->route('projects.index');
    }

    public function show($id)
    {
        $users = User::get();
        $projects = Project::findOrFail($id);
        $assessments = Assessment::where('projects_id', $id)->get();
        $client = new Client();
        $cURL_Tokrn = env('CURL_TOKEN');


        $token_board = $projects->token_board_trello;
        $repo_gitHub = $projects->token_repository_github;

        $api_trello = 'https://api.trello.com/1/boards/' . $token_board . '/cards';
        $response_trello = $client->get($api_trello);

        /*$api_gitHub = 'https://api.github.com/repos/'. $repo_gitHub .'/commits';
        $response_gitHub = $client->get($api_gitHub);

        $api_gitHub_brach = 'https://api.github.com/repos/'. $repo_gitHub .'/branches';
        $response_gitHub_brach = $client->get($api_gitHub_brach);

        $api_gitHub_issue = 'https://api.github.com/repos/'. $repo_gitHub .'/issues';
        $response_gitHub_issue = $client->get($api_gitHub_issue);*/

        if (!$project = $this->repository->find($id));

        if ($response_trello->getStatusCode() == 200) {
            $json = $response_trello->getBody();
            $trelloBoard = json_decode($json);
        }

        /*if ($response_gitHub->getStatusCode() == 200) {
            $json = $response_gitHub->getBody();
            $gitHubRepository = json_decode($json);
        }


        if ($response_gitHub_brach->getStatusCode() == 200) {
            $json = $response_gitHub_brach->getBody();
            $gitHubBranch = json_decode($json);
        }

        if ($response_gitHub_issue->getStatusCode() == 200) {
            $json = $response_gitHub_issue->getBody();
            $gitHubIssue = json_decode($json);
        }*/

        return view('app.projects.show')->with(['project' => $project, 'assessments' => $assessments,  'users' => $users, 'trelloBoard' => $trelloBoard, /*'gitHubRepository' => $gitHubRepository, 'gitHubBranch' => $gitHubBranch, 'gitHubIssue' => $gitHubIssue*/]);
    }

    public function edit($id)
    {
        $gitHubData = [];
        $trelloData = [];
        $client = new Client();
        $key = env('TRELLO_KEY');

        $token_trello = Auth()->user()->token_trello;
        $token_github = Auth()->user()->token_github;

        $api_trello = 'https://api.trello.com/1/members/me/boards?key=' . $key . '&token=' . $token_trello;
        $response_trello = $client->get($api_trello);

        $api_gitHub = 'https://api.github.com/users/'. $token_github .'/repos';
        $response_gitHub = $client->get($api_gitHub);

        if ($response_trello->getStatusCode() == 200) {
            $json = $response_trello->getBody();
            $trelloData = json_decode($json);
        }

        if ($response_gitHub->getStatusCode() == 200) {
            $json = $response_gitHub->getBody();
            $gitHubData = json_decode($json);
        }

        $project = Project::findOrFail($id);
        return view('app.projects.edit', ['project' => $project,'trelloData' => $trelloData, 'gitHubData' => $gitHubData ]);
    }

    public function update(Request $request, $id)
    {
        $project = Project::findOrFail($id);
        $project->update([
            'title'  => $request['title'],
            'type'  => $request['type'],
            'user_id'  => $request['user_id'],
            'description'  => $request['description'],
            'status'  => $request['status'],
            'token_repository_github' => $request['token_repository_github'],
            'token_board_trello' => $request['token_board_trello'],
            'start_date'  => $request['start_date'],
            'end_date'  => $request['end_date'],
        ]);

        \Session::flash('success','Projeto atualizado com sucesso!');

        return redirect()->route('projects.index');
    }

    public function destroy($id)
    {
        $project = Project::findOrFail($id);
        $project->delete();

        \Session::flash('success','Projeto deletado com sucesso!');

        return redirect()->route('projects.index');
    }
}
