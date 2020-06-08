@extends('adminlte::page')

@section('content_header')
<h1>Editar Projeto</h1>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('projects.update', $project->id) }}" method="post" enctype="multipart/form-data" class="form">
                        @method('PUT')
                        @include('app.projects.partials.form')
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
