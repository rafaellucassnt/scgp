@extends('adminlte::page')

@section('content_header')

@endsection

@section('content')
<div class="container-fluid">
    @include('includes.alerts')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <ul class="nav nav-pills">
                        <li class="nav-item"><a class="nav-link active" href="#sobre" data-toggle="tab"><i class="far fa-clipboard"></i>  Sobre</a></li>

                        <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab"><i class="fas fa-cog"></i> Configurações</a></li>
                    </ul>
                </div>
                <div class="card-body">
                    <div class="tab-content">
                        <div class="tab-pane active" id="sobre">
                            <div class="row col-md-12">
                                <div class="col-md-6">
                                    <div class="text-center">
                                        <img class="img-profile img-responsive" src="assets/img/avatar.png" alt="{{ Auth::user()->name }}">
                                    </div>
                                    <h3 class="profile-username text-center">{{ Auth::user()->name }}</h3>
                                    <p class="text-muted text-center">{{ Auth::user()->email }}</p>
                                    <p class="text-muted text-center">{{ Auth::user()->position }}</p>
                                </div>
                                <div class="col-md-6">
                                    <div class="text-center">
                                        <div id="chart"> </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane" id="settings">
                            <div class="text-center">
                                <form action="{{ route('users.destroy', auth()->user()->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <a class="btn bg-gradient-info" href="{{ route('users.edit', auth()->user()->id) }}"><i class="fas fa-edit" aria-hidden="true"></i> Editar</a>
                                    <button type="submit" class="btn bg-gradient-pink"><i class="fas fa-trash-alt"></i> Deletar Conta</button>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('other_js')

<script>
    var options = {
        series: [{
        name: ['Habilidade: '],
        data: [3, 4, 2, 1, 3, 2],
      }],
        chart: {
        height: 350,
        type: 'radar',
      },
      title: {
        text: 'Minhas Habilidades',
        align: 'center',
      },
      colors: ['#6f42c1'],
      markers: {
        size: 3,
        hover: {
          size: 5
        }
      },
      xaxis: {
        categories: ['Frontend', 'Backend', 'UI/UX', 'Gestão de Projetos', 'DevOps', 'Testes']
      },
      yaxis: {
            tickAmount: 5,
            min: 0,
            max: 5,
            decimalsInFloat: undefined,
        }
      };

      var chart = new ApexCharts(document.querySelector("#chart"), options);
      chart.render();

</script>

@endpush
