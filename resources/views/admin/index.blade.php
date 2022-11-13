@extends('layouts.app')

@section('menu')
    @include('admin.admin_menu')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('ADMIN') }}</div>
                    <div class="card-body">
                        <h4>{{ __('Добро пожаловать уважаемый Администратор') }}</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

