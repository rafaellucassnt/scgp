<div class="row align-items-stretch">
    @foreach ( $users as $item)
    <div class="col-12 col-sm-6 col-md-4 align-items-stretch">
      <div class="card bg-light">
        <div class="card-header text-muted border-bottom-0">
          {{ $item->position }}
        </div>
        <div class="card-body pt-0">
          <div class="row">
            <div class="col-7">
              <h2 class="lead"><b>{{ $item->name }}</b></h2>
              <ul class="ml-4 mb-0 fa-ul text-muted">
                <li class="small"><span class="fa-li"><i class="fas fa-at"></i></span> Email: {{ $item->email }}</li>
              </ul>
            </div>
            <div class="col-5 text-center pt-0">
                <img class="img-circle img-fluid" src="../../../../../../assets/img/avatar.png" alt="{{ $item->name }}">
            </div>
          </div>
        </div>
        <div class="card-footer">
          <div class="text-right">
            <a href="{{ route('users.show', $item->id) }}" target="_blank"><button type="submit" class="btn bg-gradient-info btn-sm"><i class="fas fa-user"></i>Ver Perfil</button></a>
          </div>
        </div>
      </div>
    </div>
    @endforeach
  </div>
