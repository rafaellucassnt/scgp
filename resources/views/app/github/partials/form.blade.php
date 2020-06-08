
@csrf
<a class="btn bg-gradient-info" href="{{ $url }}" target="_blank">Gerar permissão do GitHub</a>
<p></p>
<div class="form-group">
    <label>Usuário Github
    <input type="text" name="token_github" class="form-control" placeholder="Inserir aqui o usário do GitHub " value="{{ $user->token_github ?? old('token_github') }}" required></label>
</div>
