@extends('adminlte::page')

@section('content_header')

<h1>Editar Relatório</h1>

@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('assessments.update', $assessment->id) }}" method="post" enctype="multipart/form-data" class="form">
                        @method('PUT')
                        @include('app.assessments.partials.form')
                        <div class="form-group">
                            <button type="submit" class="btn bg-gradient-purple">Enviar</button>
                            <a href="{{ route('assessments.index') }}"  class="btn bg-gradient-info" >Voltar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
