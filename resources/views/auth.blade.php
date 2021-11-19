@extends('layout')

@section('title')Авторизация @endsection

@section('main_content')
    <p>Авторизация</p>
    @if($errors->eny())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form method="post" action="/auth/check">
        @csrf
        <input type="email" name="email" id="email" placeholder="email@exempl.ru" class="form-control"><br>
        <input type="password" name="password" id="password" placeholder="password" class="form-control"><br>
        <button type="submit" class="btn btn-success">Log in</button>
    </form>
@endsection
