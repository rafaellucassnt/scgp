<div class="card card-purple">
    <div class="card-header">
      <h3 class="card-title">
          <i class="fas fa-exclamation"></i>
        Lista de Atividades (Issues - GitHub)
      </h3>
    </div>
    <div class="card-body">
      @foreach ( $gitHubIssue as $issue )
      <div class="card-footer card-comments">
        <div class="card-comment">
          <a class="link-issue" href="{{ $issue->html_url }}" target="_blank">
            {{ $issue->title }}
          </a>
          @foreach ( $issue->labels as $label )
          <span class="badge" style="background-color: #{{ $label->color }}; color: #fff">
            {{ $label->name }}
          </span>
          @endforeach
          <div class="comment-text">
            <span class="text-muted float-right">{{ $issue->updated_at}}</span>
          </div>
          <div class="comment-text">
            <span class="issues">
              Responsável:
              <p>
                {{ $issue->assignee->login }}
                <img class="avatar img-s" src="{{ $issue->assignee->avatar_url }}" alt="User Image"/>
              </p>
              <p>
                {{ $issue->number }} opened {{ $issue->created_at }} by {{ $issue->user->login }}
              </p>
            </span>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
