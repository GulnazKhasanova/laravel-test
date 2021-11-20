@extends('layout')

@section('title')Account@endsection

@section('main_content')
    <h1>Личный кабинет</h1>
        <p>Привет {{ \Illuminate\Support\Facades\Auth::user()->name }}</p>
@endsection
