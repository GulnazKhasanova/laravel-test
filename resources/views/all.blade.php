@extends('layouts.app')

@section('title') Задачи @endsection

@section('content')
    <div class="container">
        <h1>Все задачи</h1>
        <p>Привет {{ \Illuminate\Support\Facades\Auth::user()->name }}</p>
    </div>
@endsection
