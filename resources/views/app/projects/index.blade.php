@extends('adminlte::page')

@section('content_header')

<h1>Projetos</h1>

@endsection

@section('content')

<div class="container-fluid">
    @include('includes.alerts')
    <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Meus Projetos</h3>
              <div class="card-tools">
                <div class="input-group input-group-sm">
                    <a href="{{ route('projects.create') }}"><button type="submit" class="btn bg-gradient-purple"><i class="fas fa-plus"></i> Novo</button></a>
                </div>
              </div>
            </div>
            <div class="card-body table-responsive">
              <table id="tabela" class="table table-bordered">
                <thead>
                  <tr>
                    <th>Projeto</th>
                    <th>Lider</th>
                    <th>Descrição</th>
                    <th>Tipo</th>
                    <th>Status</th>
                    <th>Data início</th>
                    <th>Data fim</th>
                    <th>Ação</th>
                  </tr>
                </thead>
                <tbody>
                @foreach ($projects as $project )
                <tr>
                    <td> <a href="{{ route('projects.show', $project->id) }}">{{ $project->title }}</a></td>
                    <td>{{ $project->userSender->name }}</td>
                    <td>{{ \App\Util::limitCharacters( $project->description) }}</td>
                    <td>{{ \App\Project::getType($project->type) }}</td>
                    <td>{{ \App\Project::getStatus($project->status) }}</td>
                    <td>{{ \App\Project::getDateAttribute($project->start_date) }}</td>
                    <td>{{ \App\Project::getDateAttribute($project->end_date) }}</td>
                    <td class="center-btn">
                        @if(Auth::user()->id == $project->user_id)
                        <table class="table-borderless table-sm">
                            <tr>
                                <td>
                                    <a href="{{ route('projects.edit', $project->id) }}"><button type="submit" class="btn bg-gradient-purple btn-sm margin-btn"><i class="fas fa-edit"></i></button></a>
                                </td>
                                <td>
                                    <a href="{{ route('projects.show', $project->id) }}"><button type="submit" class="btn bg-gradient-info btn-sm margin-btn"><i class="far fa-eye"></i></button></a>
                                </td>
                                <td>
                                    <form action="{{ route('projects.destroy', $project->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn bg-gradient-pink btn-sm margin-btn"><i class="fas fa-trash-alt"></i></button>
                                    </form>
                                </td>
                            </tr>
                        </table>
                        @else
                        <table class="table-borderless table-sm">
                            <tr>
                                <td>
                                    <a href="{{ route('projects.show', $project->id) }}"><button type="submit" class="btn bg-gradient-info btn-sm margin-btn"><i class="far fa-eye"></i></button></a>
                                </td>
                            </tr>
                        </table>
                        @endif
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
