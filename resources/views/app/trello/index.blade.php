@extends('adminlte::page')

@section('content_header')

<h1>Trello</h1>
<style>
    .description{
        min-height: 65px;
        text-align: justify;
    }
</style>
@endsection

@section('content')

<div class="container-fluid">
    @include('includes.alerts')
    <div class="row">
        <div class="col-12">
          <div class="card">
            @if(Auth::user()->token_trello === NULL || Auth::user()->token_trello == " "  )
            <div class="card-header">
                <h3 class="card-title">Vicular conta</h3>
                <div class="card-tools">
                  <div class="input-group input-group-sm">
                    <a class="btn bg-gradient-purple" href="{{ route('trello.edit', auth()->user()->id) }}"><i class="fab fa-trello" aria-hidden="true"></i> Vincular Conta do Trello</a>
                  </div>
                </div>
              </div>
              <div class="card-body">
                  Não possui contas vinculadas
              </div>
          </div>
          @else
          @include('app.trello.partials.board')
          @endif
        </div>
      </div>
  </div>

@endsection

@push('other_js')

@endpush
