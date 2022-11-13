@extends('layouts.app')

@section('menu')
    @include('menu')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Все новости') }}</div>
                    <div class="card-body">
                        @forelse ($news as $item)
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $item['title'] }}</h5>
                                    <a href="{{ route('news.newsItem', $item['id']) }}" class="btn btn-secondary">Читать
                                        далее...</a>
                                </div>
                            </div>
                        @empty
                            Нет новостей
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection





