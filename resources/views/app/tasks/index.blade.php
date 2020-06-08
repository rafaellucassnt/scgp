@extends('adminlte::page')

@section('content_header')

<h1>Tarefas</h1>

@endsection

@section('content')

<div class="container-fluid">
    @include('includes.alerts')
    <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Minhas Tarefas</h3>
              <div class="card-tools">
                <div class="input-group input-group-sm">
                    <a href="{{ route('tasks.create') }}"><button type="submit" class="btn bg-gradient-purple"><i class="fas fa-plus"></i> Novo</button></a>
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
