<div class="card-body table-responsive">
    <div class="card card-purple">
      <div class="card-header">
        <h3 class="card-title">
          <i class="fas fa-code-branch"></i>
          Funcionalidades em (Branchs)
        </h3>
      </div>
      <div class="card-body">
        <div class="row">
          @foreach ($gitHubBranch as $branch)
          <div class="col-md-4">
            <p><a href="https://github.com/{{ $project->token_repository_github }}/tree/{{ $branch->name }}" target="_blank"><i class="fas fa-code-branch"></i> {{ $branch->name }}</a></p>
          </div>
          @endforeach
        </div>
      </div>
    </div>

    <div class="card card-purple">
      <div class="card-header">
        <h3 class="card-title">
          <svg
            class="octicon octicon-git-commit"
            viewBox="0 0 16 18"
            version="1.1"
            width="16"
            height="18"
            aria-hidden="true"
            fill="#fff"
          >
            <path
              fill-rule="evenodd"
              d="M10.86 7c-.45-1.72-2-3-3.86-3-1.86 0-3.41 1.28-3.86 3H0v2h3.14c.45 1.72 2 3 3.86 3 1.86 0 3.41-1.28 3.86-3H14V7h-3.14zM7 10.2c-1.22 0-2.2-.98-2.2-2.2 0-1.22.98-2.2 2.2-2.2 1.22 0 2.2.98 2.2 2.2 0 1.22-.98 2.2-2.2 2.2z"
            ></path>
          </svg>

          Atualizações no Repositório (Commits)
        </h3>
      </div>
      <div class="card-body">
        <table id="tabela" class="table table-borderless">
          <thead>
            <tr>
              <th>Mensagem</th>
              <th>Autor</th>
              <th>Data</th>
              <th>Mudanças</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($gitHubRepository as $item )
            <tr>
              <td><a href="{{ $item->html_url }}" target="_blank">{{ \App\Util::maxMsgCommit($item->commit->message) }}</a></td>
              <td>{{ $item->commit->author->name }}</td>
              <td>{{ $item->commit->committer->date }}</td>
              <td>
                <a href="{{ $item->html_url }}" target="_blank"><button type="submit" class="btn bg-gradient-secondary">
                    {{ \App\Util::shaGitHub($item->sha) }}
                  </button></a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>




