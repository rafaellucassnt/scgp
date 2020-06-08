@extends('adminlte::page')

@section('content_header')

<h1>Usuários</h1>

@endsection

@section('content')

<div class="container-fluid">
    @include('includes.alerts')
    <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Lista de Usuários</h3>
              <div class="card-tools">
                <div class="input-group input-group-sm">
                    <a href="{{ route('users.create') }}"><button type="submit" class="btn bg-gradient-purple"><i class="fas fa-user-plus"></i> Novo</button></a>
                </div>
              </div>
            </div>
            <div class="card-body table-responsive">
              <table id="tabela" class="table table-bordered">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Cargo</th>
                    <th>Email</th>
                    <th >Ações</th>
                  </tr>
                </thead>
                <tbody>
                @foreach ($users as $user )
                  <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->position }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <table class="table-borderless table-sm">
                            <tr>
                                <td>
                                    <a href="{{ route('users.edit', $user->id) }}"><button type="submit" class="btn bg-gradient-purple btn-sm"><i class="fas fa-user-edit"></i></button></a>
                                </td>
                                <td>
                                    <a href="{{ route('users.show', $user->id) }}"><button type="submit" class="btn bg-gradient-info btn-sm"><i class="far fa-eye"></i></button></a>
                                </td>
                                <td>
                                    <form action="{{ route('users.destroy', $user->id) }}" method="post">
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
