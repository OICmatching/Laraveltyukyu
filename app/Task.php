<?php

namespace App;

use App/User;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    /*
    複数代入する属性
    @var array
    */
    protected $fillable = ['name'];

    // タスク所有ユーザーの取得
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // $user ~ App\User::find(1);
    //
    // foreach ($user->task as $task) {
    //     echo $task->name;
    // }

}
