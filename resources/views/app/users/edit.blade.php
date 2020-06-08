@extends('adminlte::page')

@section('content_header')

<h1>Editar Usuário</h1>

@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('users.update', $user->id) }}" method="post" enctype="multipart/form-data" class="form">
                        @method('PUT')
                        @include('app.users.partials.form')
                        <div class="form-group">
                            <button type="submit" class="btn bg-gradient-purple">Enviar</button>
                            @if(auth()->user()->id === $user->id)
                            <a href="{{ route('myprofile') }}"  class="btn bg-gradient-info" >Voltar</a>
                            @else
                            <a href="{{ route('users.index') }}"  class="btn bg-gradient-info" >Voltar</a>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
