<?php

namespace App;
use App\Project;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    //
    protected $primaryKey = 'id';

    protected $fillable = [
        'projects_id',
        'title',
        'description',
        'tag',
        'status',
        'start_date',
        'end_date',
    ];

    public function projectSender()
    {
        return $this->belongsTo(Project::class, 'projects_id');
    }
}
