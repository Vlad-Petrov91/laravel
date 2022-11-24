@extends('layouts.app')

@section('menu')
    @include('admin.admin_menu')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h3>Администратор, добро пожаловать в CRUD блок</h3>
                        <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                            <a class="btn btn-lg btn-success me-md-2" href="{{route('admin.create')}}" type="button">Добавить новость</a>
                        </div>
                    </div>
                    <div class="card-body">
                        @forelse ($news as $item)
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $item->title }}</h5>
                                    <div class="btn-group" role="group" aria-label="Default button group">
                                        <form method="post" action="{{ route('admin.destroy',$item) }}">
                                            @csrf
                                            @method('DELETE')
                                            <input type="submit" value="Удалить" class="btn btn-outline-danger">
                                        </form>
                                        <a type="button" href="{{ route('admin.edit',$item) }}"
                                           class="btn btn-outline-warning">Редактировать</a>
                                    </div>
                                </div>
                            </div>
                        @empty
                            Нет новостей
                        @endforelse
                    </div>
                    <div>{{$news->links()}}</div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection

