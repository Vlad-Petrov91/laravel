@extends('layouts.app')

@section('menu')
    @include('menu')
@endsection

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Категории новостей') }}
                        <nav class="navbar navbar-expand-lg navbar-light bg-light">
                            <div class="container-fluid">
                                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                                    <div class="navbar-nav">
                                        @foreach ($categories as $item)
                                            <a class="nav-link"
                                               href="{{route('news.categories.categoryNews', $item['slug'])}}">{{$item['name']}}</a>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </nav>
                    </div>
                    <div class="card-body">

                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

@endsection
