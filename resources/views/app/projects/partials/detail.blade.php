<div class="row">
    <div class="col-md-4 col-sm-6 col-12">
        <div class="info-box">
            <span class="info-box-icon bg-purple"><i class="far fa-flag"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Status do Projeto</span>
                <span class="info-box-number">{{ \App\Project::getStatus($project->status) }}</span>
            </div>
        </div>
    </div>

    <div class="col-md-4 col-sm-6 col-12">
        <div class="info-box">
            <span class="info-box-icon bg-info"><i class="far fa-calendar"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Data início</span>
                <span class="info-box-number">{{ \App\Project::getDateAttribute($project->start_date) }}</span>
            </div>
        </div>
    </div>

    <div class="col-md-4 col-sm-6 col-12">
        <div class="info-box">
            <span class="info-box-icon bg-pink"><i class="far fa-calendar-check"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Data fim</span>
                <span class="info-box-number">{{ \App\Project::getDateAttribute($project->end_date) }}</span>
            </div>
        </div>
    </div>
</div>

<div class="card card-purple">
    <div class="card-header">
        <h3 class="card-title">
            <i class="far fa-file-alt"></i>
            Descrição
        </h3>
    </div>
    <div class="card-body">
        <p class="description">{{ $project->description }}</p>
    </div>
</div>

