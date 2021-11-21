@extends('layouts.app')

@section('title') Account @endsection

@section('content')
    <div class="container">
        <h1>Личный кабинет</h1>
        <p>Привет {{ \Illuminate\Support\Facades\Auth::user()->name }}</p>
        <table class="table">
            <tr>
                @if($tasks->count() === 0){
                <p>Задач нет</p>
                }
                @else {
                    @foreach($tasks as $el)
                        <td>{{ $el->name }}</td>
                        <td>
                            <form action="{{ route('account.update',$el->id) }}" method="POST">
                                <select class="form-select my-3" aria-label="Default select example" name="status" onchange="this.form.submit()">
                                    <option value="{{ $el->status }}" selected>{{ $el->status }}</option>
                                    <option value="dev">In develop</option>
                                    <option value="test">In test</option>
                                </select>
                            </form>
                        </td>
                        <td>
                            <form action="{{ route('account.destroy',$el->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    @endforeach
                    }
                @endif
            </tr>
        </table>

        <div class="card-body">
            <form method="POST" action="{{ route('create-task') }}">
                @csrf
                <input type="hidden" name="id_admin" value="{{ \Illuminate\Support\Facades\Auth::user()->id}}">

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
                        <input id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description">

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
