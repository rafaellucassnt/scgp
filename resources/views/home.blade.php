@extends('adminlte::page')

@section('content_header')

<h1>Dashboard geral dos Projetos</h1>

@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
      <div class="col-lg-6">
        <div class="card">
          <div class="card-header border-0">
            <div class="d-flex justify-content-between">
              <h3 class="card-title">Projetos</h3>
            </div>
          </div>
          <div class="card-body">
            <div id="chart3"> </div>
          </div>
        </div>

        <div class="card">
            <div class="card-header border-0">
              <h3 class="card-title">Andamento dos Projetos</h3>
              <div class="card-tools">
              </div>
            </div>
            <div class="card-body">
                <div id="chart2"> </div>
            </div>
          </div>
      </div>

      <div class="col-lg-6">
        <div class="card">
          <div class="card-header border-0">
            <div class="d-flex justify-content-between">
              <h3 class="card-title">Atividades</h3>
            </div>
          </div>
          <div class="card-body">
            <div id="chart4"> </div>
          </div>
        </div>

        <div class="card">
          <div class="card-header border-0">
            <h3 class="card-title">Pontos</h3>
            <div class="card-tools">
            </div>
          </div>
          <div class="card-body">
            <div id="chart1"> </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@push('other_js')
<script>
    var options = {
        chart: {
            height: 330,
          type: 'bar'
        },
        series: [{
          name: 'total de pontos',
          data: [50,40,45,80,69,60,70,91,125,90,80,100]
        }],
        xaxis: {
          categories: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez']
        }
      }

      var chart = new ApexCharts(document.querySelector("#chart1"), options);

      chart.render();
</script>

<script>
    var options = {
        series: [44, 55, 67, 83],
        chart: {
        width: 400,
        type: 'radialBar',
      },
      plotOptions: {
        radialBar: {
          dataLabels: {
            name: {
              fontSize: '22px',
            },
            value: {
              fontSize: '16px',
            },
            total: {
              show: true,
              label: 'Total de Pontos',
              formatter: function (w) {
                // By default this function returns the average of all series. The below is just an example to show the use of custom formatter function
                return 249
              }
            }
          }
        }
      },
      labels: ['Projeto Thanos', 'Projeto Marketing', 'Projeto Banco', 'Projeto Startup'],
      };

      var chart = new ApexCharts(document.querySelector("#chart2"), options);
      chart.render();
</script>

<script>
    var options = {
        series: [44, 55, 13, 8, 22],
        chart: {
        width: 500,
        type: 'pie',
      },
      labels: ['No prazo', 'Sem Término Estimando', 'Risco', 'Atrasado', 'Parado'],
      responsive: [{
        breakpoint: 480,
        options: {
          chart: {
            width: 200
          },
          legend: {
            position: 'bottom'
          }
        }
      }]
      };

      var chart = new ApexCharts(document.querySelector("#chart3"), options);
      chart.render();
</script>

<script>

    var options = {
        series: [44, 55, 13],
        chart: {
        width: 445,
        type: 'donut',
      },
      labels: ['Encerrado', 'Em Andamento', 'Pendete'],
      responsive: [{
        breakpoint: 480,
        options: {
          chart: {
            width: 200
          },
          legend: {
            position: 'bottom'
          }
        }
      }]
      };
      var chart = new ApexCharts(document.querySelector("#chart4"), options);
      chart.render();

</script>
@endpush
