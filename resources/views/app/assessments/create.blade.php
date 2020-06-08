@extends('adminlte::page')

@section('content_header')
<h1>Cadastrar Relatório</h1>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('assessments.store') }}" method="post" enctype="multipart/form-data" class="form">
                        @include('app.assessments.partials.form')
                        <button type="submit" class="btn bg-gradient-indigo">Enviar</button>
                            <a href="{{ route('assessments.index') }}"  class="btn bg-gradient-info" >Voltar</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
