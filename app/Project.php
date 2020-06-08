<?php

namespace App;
use Carbon\Carbon;
use App\User;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $primaryKey = 'id';

    protected $fillable = [
        'title',
        'type',
        'user_id',
        'description',
        'status',
        'github',
        'trello',
        'token_board_trello',
        'token_repository_github',
        'assessment_id',
        'start_date',
        'end_date',
    ];

    public function userSender()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public static function getDateAttribute($value)
    {
        if($value == null){
            return "Indefinido";
        }
        else{
            return Carbon::parse($value)->format('d/m/Y');
        }
    }

    public static function getType($value)
    {
        $values = ['Interno', 'Externo'];
        return $values[$value];
    }

    public static function getStatus($value)
    {
        $values = ['No Prazo', 'Sem Término Estimado', 'Risco', 'Atrasado', 'Parado', 'Finalizado'];
        return $values[$value];
    }

}
