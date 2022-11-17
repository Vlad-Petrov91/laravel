@extends('layouts.app')

@section('title')
    @parent Добавить новость
@endsection

@section('menu')
    @include('admin.admin_menu')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Добавление новости</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.create') }}">
                            @csrf
                            <div class="row mb-3">
                                <label for="title" class="col-md-4 col-form-label text-md-end">Заголовок новости</label>
                                <div class="col-md-6">
                                    <input id="title" type="text" class="form-control" name="title"
                                           value="{{old('title')}}" autofocus>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="newsCategory" class="col-md-4 col-form-label text-md-end">Категория
                                    новостей</label>
                                <div class="col-md-6">
                                    <select id="newsCategory" type="text" class="form-control" name="category_id">
                                        @forelse($categories as $item)
                                            <option {{ old('category_id') == $item['id'] ? 'selected':'' }}
                                                    value="{{$item['id']}}">{{$item['name']}}</option>
                                        @empty
                                            <option value="0" selected>Нет категории</option>
                                        @endforelse
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <label for="newsText" class="col-md-4 col-form-label text-md-end">Текст</label>
                                <div class="col-md-6">
                                    <textarea id="newsText" class="form-control" name="text"
                                              rows="9">{{old('text')}}</textarea>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input {{ old('is_private') ? 'checked':'' }} class="form-check-input"
                                               type="checkbox" name="is_private" value="1" id="news_private">
                                        <label for="news_private" class="form-check-label">Приватная новость</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Добавить новость
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
