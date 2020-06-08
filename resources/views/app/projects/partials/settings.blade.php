<form action="{{ route('projects.destroy', $project->id) }}" method="post">
    @csrf
    @method('DELETE')
    <a class="btn bg-gradient-info" href="{{ route('projects.edit', $project->id) }}"><i class="fas fa-edit"></i>Editar</button></a>
    <button type="submit" class="btn bg-gradient-pink"><i class="fas fa-trash-alt"></i> Remover Projeto</button>
</form>
