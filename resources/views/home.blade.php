@extends('layouts.app')

@section('title')
    @parent Главная
@endsection

@section('menu')
    @include('menu')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Главная страница</div>
                    <div class="card-body">
                        <h4>Добро пожаловать на сайт новостей</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
