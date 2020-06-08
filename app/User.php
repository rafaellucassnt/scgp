<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $primaryKey = 'id';
    /**
     * The attributes that are mass assignable.
     *id, name, email, password, position, remember_token, email_verified_at, created_at, updated_at
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'position', 'token_trello', 'token_github'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function projeto() {
        return $this->hasMany(Project::class);
    }

}
