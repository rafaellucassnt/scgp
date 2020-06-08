@csrf

<div class="form-row">
    <div class="form-group col-md-6">
        <label>Título:</label>
        <input type="text" name="title" class="form-control" placeholder="Título" value="{{ $assessment->title ?? old('title') }}" required>
    </div>
    <div class="form-group col-md-4">
        <label>Projeto:</label>
        <select name="projects_id" class="form-control" placeholder="Tipo:">
            @foreach($projects as $item)
            <option {{($assessment->projects_id ?? old('projects_id'))==="$item->id"? 'selected':''}} value="{{$item->id}}">{{$item->title}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group col-md-2">
        <label>Tipo:</label>
        <select name="type" class="form-control" placeholder="Tipo:">
            <option {{($assessment->type ?? old('type'))=="0"? 'selected':''}} value="0">Positivo</option>
            <option {{($assessment->type ?? old('type'))=="1"? 'selected':''}} value="1">Negativo</option>
        </select>
    </div>
</div>

<div class="form-row">
    <div class="form-group col-md-12">
        <label>Problema:</label>
        <input type="text" name="description" class="form-control" placeholder="Problema" value="{{ $assessment->description ?? old('description') }}" required>
    </div>
</div>

<div class="form-row">
    <div class="form-group col-md-12">
        <label>Solução:</label>
        <input type="text" name="resolution" class="form-control" placeholder="Resultado" value="{{ $assessment->resolution ?? old('resolution') }}" required>
    </div>

</div>
