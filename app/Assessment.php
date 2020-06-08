<?php

namespace App;
use App\Project;

use Illuminate\Database\Eloquent\Model;

class Assessment extends Model
{
    protected $primaryKey = 'id';

    protected $fillable = [
        'projects_id',
        'title',
        'description',
        'resolution',
        'type',

    ];

    public function projectSender()
    {
        return $this->belongsTo(Project::class, 'projects_id');
    }
}
