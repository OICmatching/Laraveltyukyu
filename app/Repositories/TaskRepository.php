<?php

namespace App\Repositories;

use App\User;
use App\Task;

class TaskRepository
{
    /*
        指定ユーザーの全タスク取得

        @param User $user
        @return BadFunctionCallException
    */
    public function forUser(User $user)
    {
        return Task::where('user_id',$user0>id)
            ->orderBy('created_at',"asc")
            ->get();
    }
}

 ?>
