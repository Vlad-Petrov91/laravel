@extends('layouts.app')

@section('menu')
    @include('admin.admin_menu')
@endsection

@section('title')
    @parent Категории
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h3>Правка категорий</h3>
                        <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                            <a class="btn btn-lg btn-success me-md-2" href="{{route('admin.create_category')}}"
                               type="button">Добавить категорию</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="list-group">
                            @foreach ($categories as $item)
                                <div class="list-group-item">
                                    <h4>{{$item->name}}</h4>
                                    <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                        <form method="post" action="{{ route('admin.destroy_category',$item->id) }}">
                                            @csrf
                                            @method('DELETE')
                                            <input type="submit" value="Удалить" class="btn btn-outline-danger">
                                        </form>
                                        <a type="button" href="{{ route('admin.edit_category',$item->id) }}"
                                           class="btn btn-outline-warning">Редактировать</a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
