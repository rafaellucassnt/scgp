
<div class="card-header">
    <h3 class="card-title">Meu Repositório GitHub</h3>
    <div class="card-tools">
      <div class="input-group input-group-sm">
        <a class="btn bg-gradient-purple" href="{{ route('github.edit', auth()->user()->id) }}"><i class="fab fa-github" aria-hidden="true"></i> Meu Token</a>
      </div>
    </div>
  </div>
  <div class="card-body table-responsive">
    <table id="tabela" class="table table-borderless">
      <thead>
        <tr>
          <th>Nome</th>
          <th>Descrição</th>
          <th>Owner</th>
          <th>Linguagem</th>
          <th>Branch</th>
          <th>Repositório</th>
        </tr>
      </thead>
      <tbody>
      @foreach ($gitHubData as $item )
        <tr>
          <td><a href="{{ $item->html_url }}" target="_blank">{{ $item->name }}</a></td>
          <td>{{ $item->description }}</td>
          <td>{{ $item->owner->login }}</td>
          <td>{{ $item->language }}</td>
          <td>{{ $item->default_branch }}</td>
          <td><a href="{{ $item->html_url }}" target="_blank"><button type="submit" class="btn bg-gradient-info btn-sm"><i class="fas fa-external-link-alt"></i> Ver Repositório</button></a></td>
        </tr>
      @endforeach
      </tbody>
    </table>
  </div>
</div>


@push('other_js')

@endpush

