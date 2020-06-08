@extends('adminlte::page')

@section('content_header')

<h1>GitHub</h1>
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
                @if(Auth::user()->token_trello != null)
                    @include('app.github.partials.reposit')
                @else
                <div class="card-header">
                    <h3 class="card-title">Vicular conta</h3>
                    <div class="card-tools">
                        <div class="input-group input-group-sm">
                            <a class="btn bg-gradient-purple" href="{{ route('github.edit', auth()->user()->id) }}"><i class="fab fa-github" aria-hidden="true"></i> Vincular GitHub</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    Não possui contas vinculadas
                </div>
                @endif
            </div>
        </div>
    </div>
</div>

@endsection

@push('other_js')

<script>
    $(document).ready(function () {
		var table = $('#tabela').DataTable({
			iDisplayLength: 50,
			language: {
				url: "//cdn.datatables.net/plug-ins/1.10.16/i18n/Portuguese-Brasil.json",
				select: {
					rows: {
						_: '%d itens selecionados',
						0: 'Nenhum item selecionado',
						1: '1 item selecionado'
					}
				}
			}
		});
    });
</script>
@endpush
