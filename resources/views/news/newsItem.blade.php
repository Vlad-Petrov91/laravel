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
                        @if ($news)
                            @if (!$news['is_private'])
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">{{$news['title']}}</h5>
                                        <p class="card-text">{{$news['text'] }}</p>
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





