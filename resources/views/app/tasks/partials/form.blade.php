@csrf

<div class="form-group">
    <input type="text" class="form-control" name="projects_id" placeholder="id do projeto" value="{{ $task->projects_id ?? old('projects_id') }}">
    <label>Título</label>
    <input type="text" class="form-control" name="title" placeholder="Título:" value="{{ $task->title ?? old('title') }}">
</div>
<div class="form-group">
    <label>Descrição:</label>
    <input type="text" name="description" class="form-control" placeholder="Descrição:" value="{{ $task->description ?? old('description') }}">
</div>
<div class="form-row">
    <div class="form-group col-md-6">
        <label>Status:</label>
        <select name="status" class="form-control" placeholder="Status:">
            <option {{($task->status ?? old('status'))=="0"? 'selected':''}} value="0">A Fazer</option>
            <option {{($task->status ?? old('status'))=="1"? 'selected':''}} value="1">Fazendo</option>
            <option {{($task->status ?? old('status'))=="2"? 'selected':''}} value="2">Feito</option>
        </select>
    </div>
    <div class="form-group col-md-6">
        <label>Tags:</label>
        <select name="tag" class="form-control" placeholder="Tagas:">
            <option {{($task->tag ?? old('tag'))=="0"? 'selected':''}} value="0">Feature</option>
            <option {{($task->tag ?? old('tag'))=="1"? 'selected':''}} value="1">Bug</option>
            <option {{($task->tag ?? old('tag'))=="2"? 'selected':''}} value="2">Documentação</option>
            <option {{($task->tag ?? old('tag'))=="3"? 'selected':''}} value="3">Teste</option>
        </select>
    </div>
</div>
<div class="form-row">
    <div class="form-group col-md-6">
        <label>Data Inicio:</label>
        <input type="date" name="start_date" class="form-control" placeholder="Data Inicio" value="{{ $task->start_date ?? old('start_date') }}">
    </div>
    <div class="form-group col-md-6">
        <label>Data Fim:</label>
        <input type="date" name="end_date" class="form-control" placeholder="Data Fim:" value="{{ $task->end_date ?? old('end_date') }}">
    </div>
</div>

