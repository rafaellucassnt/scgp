
@csrf
<div class="form-row">
    <div class="form-group col-md-6">
        <input type="text" class="form-control" name="name" placeholder="Nome" value="{{ $user->name ?? old('name') }}" required>
    </div>
    <div class="form-group col-md-6">
        <input type="text" name="position" class="form-control" placeholder="Cargo" value="{{ $user->position ?? old('position') }}" required>
    </div>
</div>
<div class="form-row">
    <div class="form-group col-md-6">
        <input type="email" name="email" class="form-control" placeholder="Email" value="{{ $user->email ?? old('email') }}" required>
    </div>
    <div class="form-group col-md-6">
        <input type="password" name="password" class="form-control" placeholder="Senha" value="" required>
    </div>
</div>
