@extends('adminlte::page')

@section('content_header')
<h1>Cadastrar Usuário</h1>
@endsection


@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('users.store') }}" method="post" enctype="multipart/form-data" class="form">
                        @include('app.users.partials.form')
                        <div class="form-group">
                            <button type="submit" class="btn bg-gradient-indigo">Enviar</button>
                            <a href="{{ route('users.index') }}"  class="btn bg-gradient-info" >Voltar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
