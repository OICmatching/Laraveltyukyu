<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}



class User extends Model implements AuthenticatableContract,AuthorizableContract,CanResetPasswordContract{
    use Authenticatable, Authorizable,CanResetPassword;

    //他のEloquentプロパティー

    /*
    特定ユーザーの全タスク取得
    */
    public function tasks()
    {
        return $this->hasMany(Task::class);
    }
}
