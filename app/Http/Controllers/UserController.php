<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
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
        $users = User::get();
        return view('app.users.index', compact('users'));
    }

    public function create()
    {
        return view ('app.users.create');
    }

    public function store(Request $request)
    {
        $user = new User();
         $user = $user->create([
         'name' => $request['name'],
         'email' => $request['email'],
         'password' => bcrypt($request['password']),
         'position' => $request['position']
     ]);

        \Session::flash('success','Usuário cadastrado com sucesso!');

        return redirect()->route('users.index');
    }

    public function show($id)
    {
        if (!$user = $this->repository->find($id))
        return redirect()->back();
        return view('app.users.show', ['user' => $user]);
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('app.users.edit',['user' => $user]);

    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->update([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => bcrypt($request['password']),
            'position' => $request['position']
        ]);

        \Session::flash('success','Usuário atualizado com sucesso!');

        if(auth()->user()->id === $user->id ){
            return redirect()->route('myprofile');
        }else{
        return redirect()->route('users.index');
        }
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        \Session::flash('success','Usuário deletado com sucesso!');

        return redirect()->route('users.index');
    }

    public function myProfile()
    {
        return view('app.users.profile');
    }

}
