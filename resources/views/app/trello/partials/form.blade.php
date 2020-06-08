
@csrf

<a class="btn bg-gradient-info" href="{{ $url }}" target="_blank">Gerar token de permissão no Trello</a>
<div class="form-group">
    <label>Token do Trello </label>
    <input type="text" name="token_trello" class="form-control" placeholder="Inserir token de permissão gerado no Trello " value="{{ $user->token_trello ?? old('token_trello') }}" required>
</div>
