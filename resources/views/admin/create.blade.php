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
                    <div class="card-header">@if($news->id)
                            Изменение
                        @else
                            Добавление
                        @endifновости
                    </div>

                    <div class="card-body">
                        <form method="POST"
                              action="@if(!$news->id){{ route('admin.news.store') }}@else{{ route('admin.news.update', $news) }}@endif ">
                            @if($news->id)
                                @method('PUT')
                            @endif
                            @csrf
                            <div class="row mb-3">
                                <label for="title" class="col-md-4 col-form-label text-md-end">Заголовок новости</label>
                                <div class="col-md-6">
                                    @if($errors->has('title'))
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            @foreach ($errors->get('title') as $error)
                                            <strong>{{$error}}</strong>
                                            @endforeach
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
                                     @endif
                                    <input id="title" type="text" class="form-control" name="title"
                                           value="{{$news->title ?? old('title')}}" autofocus>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="newsCategory" class="col-md-4 col-form-label text-md-end">Категория
                                    новостей</label>
                                <div class="col-md-6">
                                    @if($errors->has('category_id'))
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            @foreach ($errors->get('category_id') as $error)
                                            <strong>{{$error}}</strong>
                                            @endforeach
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
                                     @endif
                                    <select id="newsCategory" type="text" class="form-control" name="category_id">
                                        @forelse($categories as $item)
                                            <option
                                                {{ $news->category_id == $item->id  || old('category_id') == $item->id ? 'selected':'' }}
                                                value="{{$item->id}}">{{$item->name}}</option>
                                        @empty
                                            <option value="0" selected>Нет категории</option>
                                        @endforelse
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <label for="newsText" class="col-md-4 col-form-label text-md-end">Текст</label>
                                <div class="col-md-6">
                                    @if($errors->has('text'))
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            @foreach ($errors->get('text') as $error)
                                            <strong>{{$error}}</strong>
                                            @endforeach
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
                                     @endif
                                    <textarea id="editor" class="form-control" name="text"
                                              rows="9">{{ empty(old()) ? $news->text : old('text')}}</textarea>
                                </div>
                            </div>
                                <script>
                                    CKEDITOR.replace( 'editor', {filebrowserImageBrowseUrl: '/file-manager/ckeditor'});
                                </script>
                            <div class="row mb-3">
                                <div class="col-md-6 offset-md-4">
                                    @if($errors->has('is_private'))
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            @foreach ($errors->get('is_private') as $error)
                                            <strong>{{$error}}</strong>
                                            @endforeach
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
                                     @endif
                                    <div class="form-check">
                                        <input
                                            {{ $news->is_private ?? old('is_private') ? 'checked':'' }} class="form-check-input"
                                            type="checkbox" name="is_private" value="1" id="news_private">
                                        <label for="news_private" class="form-check-label">Приватная новость</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        @if($news->id)
                                        Изменить
                                        @else
                                        Добавить
                                        @endif
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
