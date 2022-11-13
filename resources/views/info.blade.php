@extends('layouts.app')

@section('menu')
    @include('menu')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Информация') }}</div>

                    <div class="card-body">
                        <h4>Информационный ресурс</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
