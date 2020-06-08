@foreach ($assessments as $assessment )
@if($assessment->type == 0)
<div class="card card-purple">
    <div class="card-header">
        <h3 class="card-title"><i class="far fa-thumbs-up"></i> {{ $assessment->title }} - Impacto {{ \App\Util::getPoint($assessment->type) }} </h3>
    </div>
@else
<div class="card card-pink">
    <div class="card-header">
        <h3 class="card-title"><i class="far fa-thumbs-down"></i> {{ $assessment->title }} - Impacto {{ \App\Util::getPoint($assessment->type) }} </h3>
    </div>
@endif
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <h5 class="body-title"> Problema</h5>
                <p class="paragrafo">{{ $assessment->description }}</p>
                <hr>
                <h5 class="body-title"> Solução</h5>
                <p class="paragrafo">{{ $assessment->resolution }}</p>
            </div>
        </div>
    </div>
</div>
@endforeach
