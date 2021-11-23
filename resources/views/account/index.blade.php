@extends('layouts.app')

@section('title') Account @endsection

@section('content')
    <div class="container">
        <h1>Личный кабинет</h1>
        <p>Привет {{ \Illuminate\Support\Facades\Auth::user()->name }}</p>

        <table class="table">
             <thead>
             <form action="{{ route('filter') }}" method="get">
                 @csrf
                 <tr>
                     <th scope="col">Name</th>
                     <th scope="col"><select class="form-select form-select-sm"
                                             aria-label=".form-select-sm example"
                                             name="task"
                                             onchange="this.form.submit()">
                                        <option selected>Task</option>
                                        @foreach($alltasks as $el)
                                            <option>{{$el->name}}</option>
                                        @endforeach
                                    </select>
                     </th>
                     <th scope="col">Status</th>
                     <th scope="col"></th>
                 </tr>
             </form>
             </thead>

                @if($tasks->count() === 0)
                    <p>Задач нет</p>
                @else

                @foreach($tasks as $el)
                    <tr>
                    <th scope="row">{{ $el->user->name }}</th>
                    <td>{{ $el->name }}</td>
                    <td>
                        <form action="{{ route('update-task',$el->id) }}" method="POST">
                            @csrf
                            <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="status" onchange="this.form.submit()">
                                <option value="{{ $el->status }}" selected>{{ $el->status }}</option>
                                <option value="dev">dev</option>
                                <option value="test">test</option>
                            </select>
                        </form>
                    </td>
                    @if(Auth::user() && Auth::user()->is_admin)
                        <td>
                            <form action="{{ route('destroy-task',$el->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    @endif
                    </tr>
                @endforeach

                @endif

        </table>
        <div class="row-cols-1">
            <form method="POST" action="{{ route('create-task') }}">
                @csrf
                <input type="hidden" name="id_user" value="{{ Auth::user()->id}}">

                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Задача') }}</label>

                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}"  autofocus>

                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Описание') }}</label>

                    <div class="col-md-6">
                        <textarea id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') }}"></textarea>

                        @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row mb-0">
                    <div class="col-md-8 offset-md-4">
                        <select class="form-select my-3" aria-label="Default select example" name="status">
                            <option value="" selected>Select status</option>
                            <option value="dev">In develop</option>
                            <option value="test">In test</option>
                        </select>
                        @error('status')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group row mb-0">
                    <div class="col-md-8 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Создать') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>

    </div>
@endsection
