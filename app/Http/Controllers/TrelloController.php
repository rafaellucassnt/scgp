<?php

namespace App\Http\Controllers;
use App\User;
use GuzzleHttp\Client;

use Illuminate\Http\Request;

class TrelloController extends Controller
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
        if(Auth()->user()->token_trello === null)
        {
            return view('app.trello.index');
        }
        else
        {
            $key = env('TRELLO_KEY');
            $token = Auth()->user()->token_trello;
            $client = new Client();
            $url = 'https://api.trello.com/1/members/me/boards?key=' . $key . '&token=' . $token;
            $response = $client->get($url);

            if ($response->getStatusCode() == 200) {
                $json = $response->getBody();
                $trelloData = json_decode($json);
            }

            foreach ($trelloData as $item)
            {
                $idBoard = $item->id;
                $urlBoard = 'https://api.trello.com/1/boards/' . $idBoard . '?fields=name,prefs,url&structure=all&organization=true&organization_fields=displayName?key=' . $key . '&token=' . $token;
            }

            //dd($urlBoard);
            $urlBoard = 'https://api.trello.com/1/boards/' . $idBoard . '?fields=name,prefs,url&structure=all&organization=true&organization_fields=displayName?key=' . $key . '&token=' . $token;

            return view('app.trello.index', ['urlBoard' => $urlBoard, 'trelloData' => $trelloData ]);
        }
    }

    public function edit($id)
    {
        $key = env('TRELLO_KEY');
        $url = 'https://trello.com/1/authorize?expiration=never&name=Software%20Colaborativo%20de%20Gerenciamento%20de%20Projeto&scope=read&response_type=token&key='. $key;
        $user = User::findOrFail($id);
        return view('app.trello.edit',['user' => $user, 'url' => $url]);
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->update([
            'token_trello' => $request['token_trello'],
        ]);

        \Session::flash('success','Viculado com sucesso!');

        return redirect()->route('trello.index');
    }

}
