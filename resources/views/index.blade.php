@extends('layouts.main')

@section('title')
    @parent Главная
@endsection

@section('menu')
    @include('menu')
@endsection

@section('content')
    <h2>Hello</h2>
    <p>This is my site</p>
@endsection
