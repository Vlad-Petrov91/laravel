@extends('layouts.app')

@section('menu')
    @include('menu')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Все новости</div>
                    <div class="card-body">
                        @if ($news)
                            @if (!$news->is_private || Auth::check())
                                <div class="card">
                                    <div class="card-body">
                                        <h2 class="card-title">{{$news->title}}</h2>
                                        <div class="card-img"
                                             style="background-image: url("{{asset('public/storage/news_img.jpg')}}")">
                                    </div>
                                    <p class="card-text">{{$news->text }}</p>
                                    @else
                                        <a href="{{ route('authorization') }}" class="btn btn-secondary">Зарегистрируйтесь
                                            для просмотра
                                        </a>
                                    @endif
                                </div>
                    </div>
                    @else
                        <p>Данная новость отсутсвует</p>
                    @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection





