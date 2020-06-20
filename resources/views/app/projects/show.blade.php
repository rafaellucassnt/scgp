@extends('adminlte::page')

@section('content_header')
<h1>{{ $project->title }}</h1>

    <style>
        .nav-pills .nav-link.active, .nav-pills .show > .nav-link {
            color: #fff;
            background-color: #6f42c1;
        }
        .description{
            text-align: justify;
        }
        .avatar{
            display: inline-block;
            overflow: hidden;
            line-height: 1;
            vertical-align: middle;
            border-radius: 3px;
            max-width: 30px;
        }
        .link-issue{
            color: black
        }
        .paragrafo{
            padding-left: 20px;
        }
        .body-title{
            font-size: 1.10em;
        }
    </style>

@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <ul class="nav nav-pills">
                        <li class="nav-item"><a class="nav-link active" href="#sobre" data-toggle="tab"><i class="far fa-clipboard"></i> Sobre</a></li>
                        <li class="nav-item"><a class="nav-link" href="#time" data-toggle="tab"><i class="fas fa-users"></i> Time</a></li>
                        <li class="nav-item"><a class="nav-link" href="#trello" data-toggle="tab"><i class="fab fa-trello"></i> Trello</a></li>
                        <li class="nav-item"><a class="nav-link" href="#github" data-toggle="tab"><i class="fab fa-github"></i> GitHub</a></li>
                        <li class="nav-item"><a class="nav-link" href="#relatorio" data-toggle="tab"><i class="far fa-file-alt"></i> Relatório</a></li>
                        <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab"><i class="fas fa-cog"></i> Configurações</a></li>
                    </ul>
                </div>
                <div class="card-body">
                    <div class="tab-content">
                        <div class="tab-pane active" id="sobre">
                            @include('app.projects.partials.detail')

                            @include('app.projects.partials.issues')
                        </div>

                        <div class="tab-pane" id="time">
                            @include('app.projects.partials.team')
                        </div>

                        <div class="tab-pane" id="trello">
                            @include('app.projects.partials.cards')
                        </div>

                        <div class="tab-pane" id="github">
                            @include('app.projects.partials.reposit')
                        </div>

                        <div class="tab-pane" id="relatorio">
                            @include('app.projects.partials.assessments')
                        </div>

                        <div class="tab-pane" id="settings">
                            @include('app.projects.partials.settings')
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('other_js')



@endpush
