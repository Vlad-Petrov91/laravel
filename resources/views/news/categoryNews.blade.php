@extends('layouts.app')

@section('title')
    @parent Категория {{$category}}
@endsection

@section('menu')
    @include('menu')
@endsection

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Новости категории {{$category}}
                    </div>
                    <div class="card-body">
                        @forelse ($news as $item)
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $item['title'] }}</h5>
                                    @if($item['is_private'])
                                        <a href="{{ route('authorization') }}" class="btn btn-secondary">Зарегистрируйтесь
                                            для просмотра
                                        </a>
                                    @else
                                        <a href="{{ route('news.newsItem',[$item['slug'], $item['id']]) }}"
                                           class="btn btn-secondary">Читать
                                            далее...</a>
                                    @endif
                                </div>
                            </div>
                        @empty
                            <h5 class="card-title"> Нет новостей</h5>
                        @endforelse

                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection
