<?php

namespace App\Http\Controllers;
use App\User;
use GuzzleHttp\Client;

use Illuminate\Http\Request;

class GitHubController extends Controller
{
    protected $request;
    private $repository;

    public function __construct(Request $request, User $user)
    {
        $this->middleware('auth');
        $this->request = $request;
        $this->repository = $user;
    }

    public function index()
    {

        if(Auth()->user()->token_github === null)
        {
            return view('app.github.index');
        }
        else
        {
            $key = env('TRELLO_KEY');
            $token = Auth()->user()->token_github;
            $client = new Client();
            $url = 'https://api.github.com/users/'. $token .'/repos';
            $response = $client->get($url);

            if ($response->getStatusCode() == 200) {
                $json = $response->getBody();
                $gitHubData = json_decode($json);
            }
            else{
                return view('app.github.index');
            }

            return view('app.github.index', ['gitHubData' => $gitHubData, 'url' => $url ]);
        }
    }

    public function edit($id)
    {
        $key = env('CLIENT_ID');
        $url = 'https://github.com/login/oauth/authorize?client_id=' . $key . '&redirect_uri=http://localhost:8000/github&scope=user%20public_repo';
        $user = User::findOrFail($id);
        return view('app.github.edit',['user' => $user, 'url' => $url]);
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->update([
            'token_github' => $request['token_github'],
        ]);

        \Session::flash('success','Viculado com sucesso!');

        return redirect()->route('github.index');
    }

}
