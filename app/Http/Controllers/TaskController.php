<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Task;
use App\Repositories\TaskRepository;

class TaskController extends Controller
{
    /*
    タスクリポジトリーインスタンス

    @var TaskRepository
    */
    protected $tasks;

    //新しいコントローラーインスタンスの生成
    //@param TaskRepository $tasks
    //@return void
    public function __construct(TaskRepository $tasks)
    {
        $this->middleware('auth');

        $this->tasks = $tasks;
    }

    // ユーザーの全タスクをリスト表示
    // @param REquest $request
    // @return Reponse

    public function index(Request $request){
        //サンプルになかったので
        //$tasks = Task::where('user_id', $request->user()->id)->get();

        return view('tasks.index',[
            'tasks' => $this->tasks->forUser($request->user()),
        ]);
    }

    /*
    新タスク作成
    @param Request $request
    @return Response
    */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
        ]);
        //タスクの作成
        $request->user()->tasks()->create([
            'name' => $request->name,
        ]);

        return redirect('/tasks');
    }

    // 指定タスクの削除
    //
    // @param Request $request
    // @param Task $task
    // @return Response

    public function destroy(Request $request,Task $task)
    {
        $this->authorize('destroy',$task);
        
        $task->delete();

        return redirect('/tasks');
    }
}
