@extends('layouts.app')

@section('title')Задача @endsection

@section('content')
    <div class="container">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Task</th>
                <th scope="col">Status</th>
                <th scope="col"></th>
            </tr>
            </thead>

            @if($task === null)
                <p>Задача не найдена</p>
            @else
                <tr>
                    <th scope="row">{{ $task->user->name }}</th>
                    <td>{{ $task->name }}</td>
                    <td>
                        <form action="{{ route('update-task',$task->id) }}" method="POST">
                            @csrf
                            <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="status" onchange="this.form.submit()">
                                <option value="{{ $task->status }}" selected>{{ $task->status }}</option>
                                <option value="dev">dev</option>
                                <option value="test">test</option>
                            </select>
                        </form>
                    </td>
                    @if(Auth::user() && Auth::user()->is_admin)
                        <td>
                            <form action="{{ route('destroy-task',$task->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    @endif
                </tr>
        @endif

    </table>
    </div>
@endsection
