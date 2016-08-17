@extends('layouts.app')

@section('content')

    <!-- BootStrapの定形コード -->
    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    新しいタスク
                </div>
                <!-- ここまで追加 -->
                <div class="panel-body">
                    <!-- バリデーションエラーの表示 -->
                    @include('common.errors')

                    <!-- 新タスクフォーム -->
                    <form action="{{ url('task') }}" method="POST" class="form-horizontal">
                        {{ csrf_field() }}

                        <!-- タスク名 -->
                        <div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">Task</label>

                            <div class="col-sm-6">
                                <input type="text" name="name" id="task-name" class="form-control">
                            </div>
                        </div>

                        <!-- タスク追加ボタン -->
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">
                                <button type="submit" class="btn btn-default">
                                    <i class="fa fa-plus"></i> Add Task
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- TODO:現在のタスク -->
            @if (count($tasks) > 0)
                <div class="panel panel-default">
                    <div class="panel-heading">
                        現在のタスク
                    </div>
                    <div class="panel-body">
                        <table class="table table-striped task-table">

                            <!-- テーブルヘッダー -->
                            <thead>
                                <th>Task</th>
                                <th>&nbsp;</th>
                            </thead>

                            <!-- テーブルボデイー -->
                            <tbody>
                                @foreach ($tasks as $task)
                                    <tr>
                                        <!-- タスク名 -->
                                        <td class="table-text">
                                            <div>{{ $task->name }}</div>
                                        </td>

                                        <!-- TODO:削除ボタン -->
                                        <td>
                                            <form action="{{ url('task/' . $task->id) }}" method="POST">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                                <!-- ボタンの内容を追加 -->
                                                <button type="submit" id="delete-task-{{ $task->id }}" class="btn btn-danger">
                                                    <i class="fa fa-btn fa-trash"></i>タスク削除
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
