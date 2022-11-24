@extends('layouts.app')

@section('menu')
    @include('menu')
@endsection

@section('title')
    @parent Категории
@endsection


@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Категории новостей
                        <div class="card-body">
                        <div class="list-group">
                            @foreach ($categories as $item)
                                <a class="list-group-item list-group-item-action"
                                   href="{{route('news.categories.categoryNews', $item->slug)}}">{{$item->name}}</a>
                            @endforeach
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
