
<div class="card-header">
    <h3 class="card-title">Meus Quadros</h3>
    <div class="card-tools">
      <div class="input-group input-group-sm">
        <a class="btn bg-gradient-purple" href="{{ route('trello.edit', auth()->user()->id) }}"><i class="fab fa-trello" aria-hidden="true"></i> Meu Token</a>
      </div>
    </div>
  </div>
  <div class="card-body">
    <div class="row d-flex align-items-stretch">
        @foreach($trelloData as $item )
        <div class="col-xs-12 col-xs-6 col-md-3 align-items-stretch">
            {{--
            <div class="card bg-light">
                <div class="card-header text-muted  bg-purple border-bottom-0">
                    <h2 class="lead"><b>{{ $item->name }}</b></h2>
                </div>
                <div class="card-body pt-0">
                    <div class="row">
                        <div class="col-12">
                            <h2></h2>
                            <p class="text-muted text-sm description"><b>Descrição:</b> {{ \App\Util::limitCharacters($item->desc) }} </p>
                            <ul class="ml-4 mb-3 fa-ul text-muted">
                                <li class="small"><span class="fa-li"><i class="fas fa-history"></i></span> Última modificação: {{ $item->dateLastActivity }}</li>
                                <li class="small"><span class="fa-li"><i class="fas fa-lock"></i></span>Tipo de permissão: {{ $item->prefs->permissionLevel }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="text-right">
                        <a href="{{ $item->url }}" class="btn btn-sm bg-gradient-info" target="_blank">
                            <i class="fab fa-trello"></i> Ver no Trello
                        </a>
                    </div>
                </div>
            </div> --}}
            <blockquote class="trello-board-compact">
                <a href="{{ $item->url }}">Trello Board</a>
            </blockquote>
        </div>

        @endforeach

    </div>
</div>


@push('other_js')

<script src="https://p.trellocdn.com/embed.min.js"></script>

@endpush

