
@csrf
<div class="form-group">
    <input type="hidden" name="user_id" class="form-control" value="{{ Auth()->user()->id ?? old(Auth()->user()->id) }}">
</div>
<div class="form-group">
    <label>Nome do Projeto:</label>
    <input type="text" class="form-control" name="title" placeholder="Nome o Projeto:" value="{{ $project->title ?? old('title') }}">
</div>
<div class="form-group">
    <label>Descrição:</label>
    <input type="text" name="description" class="form-control" placeholder="Descrição:" value="{{ $project->description ?? old('description') }}">
</div>
<div class="form-row">
    <div class="form-group col-md-6">
        <label>Tipo:</label>
        <select name="type" class="form-control" placeholder="Tipo:">
            <option {{($project->type ?? old('type'))=="0"? 'selected':''}} value="0">Interno</option>
            <option {{($project->type ?? old('type'))=="1"? 'selected':''}} value="1">Externo</option>
        </select>
    </div>
    <div class="form-group col-md-6">
        <label>Status:</label>
        <select name="status" class="form-control" placeholder="Status:">
            <option {{($project->status ?? old('status'))=="0"? 'selected':''}} value="0">No prazo</option>
            <option {{($project->status ?? old('status'))=="1"? 'selected':''}} value="1">Sem Término Estimado</option>
            <option {{($project->status ?? old('status'))=="2"? 'selected':''}} value="2">Risco</option>
            <option {{($project->status ?? old('status'))=="3"? 'selected':''}} value="3">Atrasado</option>
            <option {{($project->status ?? old('status'))=="4"? 'selected':''}} value="4">Parado</option>
            <option {{($project->status ?? old('status'))=="5"? 'selected':''}} value="5">Finalizado</option>
        </select>
    </div>
</div>
<div class="form-row">
    <div class="form-group col-md-6">
        <label>Quadro Trello</label>
        @if(Auth::user()->token_trello == null || Auth::user()->token_trello == "" || $trelloData == [] )
        <input type="text" class="form-control" placeholder="Vincular conta do Trello para vizualizar os quadros" disabled>
        @else
        <select name="token_board_trello" class="form-control" >
            @foreach($trelloData as $item )
            <option value="{{ $item->id}}">{{ $item->name }}</option>
            @endforeach
        </select>
        @endif
    </div>
    <div class="form-group col-md-6">
        <label>Repositório GitHub:</label>
        @if(Auth::user()->token_github == null || Auth::user()->token_github == "" || $gitHubData == [] )
        <input type="text" class="form-control" placeholder="Vincular conta do GitHub para vizualizar repositórios" disabled>
        @else
        <select name="token_repository_github" class="form-control" >
            @foreach($gitHubData as $item )
            <option value="{{ $item->full_name }}">{{ $item->full_name }}</option>
            @endforeach
        </select>
        @endif
    </div>
</div>
<div class="form-row">
    <div class="form-group col-md-6">
        <label>Data Inicio:</label>
        <input type="date" name="start_date" class="form-control" placeholder="Data Inicio" value="{{ $project->start_date ?? old('start_date') }}">
    </div>
    <div class="form-group col-md-6">
        <label>Data Fim:</label>
        <input type="date" name="end_date" class="form-control" placeholder="Data Fim:" value="{{ $project->end_date ?? old('end_date') }}">
    </div>
</div>
<div class="form-group">
    <button type="submit" class="btn bg-gradient-purple">Enviar</button>
    <a href="{{ route('projects.index') }}"  class="btn bg-gradient-info" >Meus Projetos</a>
</div>
