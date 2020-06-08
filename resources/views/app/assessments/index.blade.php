@extends('adminlte::page')

@section('content_header')

<h1>Relatórios</h1>

@endsection

@section('content')

<div class="container-fluid">
    @include('includes.alerts')
    <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Lições aprendidas</h3>
              <div class="card-tools">
                <div class="input-group input-group-sm">
                    <a href="{{ route('assessments.create') }}"><button type="submit" class="btn bg-gradient-purple"><i class="fas fa-plus"></i> Novo</button></a>
                </div>
              </div>
            </div>
            <div class="card-body table-responsive">
              <table id="tabela" class="table table-bordered">
                <thead>
                  <tr>
                    <th>Projeto</th>
                    <th>Título</th>
                    <th>Descrição</th>
                    <th>Resultado</th>
                    <th>Ponto</th>
                    <th>Ações</th>
                  </tr>
                </thead>
                <tbody>
                @foreach ($assessments as $assessment )
                  <tr>
                    <td><a href="{{ route('projects.show', $assessment->projects_id) }}">{{ $assessment->projectSender->title}}</a></td>
                    <td>{{ $assessment->title }}</td>
                    <td>{{ \App\Util::limitCharacters($assessment->description) }}</td>
                    <td>{{ \App\Util::limitCharacters($assessment->resolution) }}</td>
                    <td>{{ \App\Util::getPoint($assessment->type) }}</td>
                    <td>
                        <table class="table-borderless table-sm">
                            <tr>
                                <td>
                                    <a href="{{ route('assessments.edit', $assessment->id) }}"><button type="submit" class="btn bg-gradient-purple btn-sm"><i class="fas fa-edit"></i></button></a>
                                </td>
                                <td>
                                    <a href="{{ route('assessments.show', $assessment->id) }}"><button type="submit" class="btn bg-gradient-info btn-sm"><i class="far fa-eye"></i></button></a>
                                </td>
                                <td>
                                    <form action="{{ route('assessments.destroy', $assessment->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn bg-gradient-pink btn-sm"><i class="fas fa-trash-alt"></i> </button>
                                        </form>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
  </div>
@endsection

@push('other_js')

<script>
    $(document).ready(function () {
		var table = $('#tabela').DataTable({
			iDisplayLength: 10,
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
