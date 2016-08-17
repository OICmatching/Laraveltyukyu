<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    /*
    複数代入する属性
    @var array
    */
    protected $fillable = ['name'];

    //サンプルにあったので追加
    //@var array
    protected $casts = [
        'user_id' => 'int'
    ];

    // タスク所有ユーザーの取得
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    //サンプルになかった　というか書く必要あったか不明
    // $user ~ App\User::find(1);
    //
    // foreach ($user->task as $task) {
    //     echo $task->name;
    // }

}
