@extends('layouts.app')

@section('title')
    @parent Изменить профиль
@endsection

@section('menu')
    @include('admin.admin_menu')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                            Изменение профиля
                    </div>

                    <div class="card-body">
                        <form method="POST"
                              action="{{ route('updateProfile') }}">
                            @csrf
                            <div class="row mb-3">
                                @if ($errors->has('name'))
                                <div class="alert alert-danger" role="alert">
                                    @foreach ($errors->get('name') as $error)
                                        {{$error}}
                                    @endforeach
                                </div>
                            @endif
                                <label for="name" class="col-md-4 col-form-label text-md-end">Имя</label>
                                <div class="col-md-6">
                                   
                                    <input id="name" type="text" class="form-control" name="name"
                                          value="{{old('name') ?? $user->name}}"  autofocus>
                                </div>
                            </div>
                            <div class="row mb-3">
                                @if ($errors->has('email'))
                                <div class="alert alert-danger" role="alert">
                                    @foreach ($errors->get('email') as $error)
                                        {{$error}}
                                    @endforeach
                                </div>
                            @endif
                                <label for="email" class="col-md-4 col-form-label text-md-end">Email
                                    </label>
                                <div class="col-md-6">

                                    <input id="email" type="email" value="{{old('email') ?? $user->email}}" class="form-control" name="email">
                                 
                                </div>
                            </div>
                            <div class="row mb-3">
                                @if ($errors->has('password'))
                                <div class="alert alert-danger" role="alert">
                                    @foreach ($errors->get('password') as $error)
                                        {{$error}}
                                    @endforeach
                                </div>
                            @endif
                                <label for="password" class="col-md-4 col-form-label text-md-end">Старый пароль</label>
                                <div class="col-md-6">

                                    <input id="password" type="password" class="form-control" name="password"
                                              rows="9">
                                </div>
                            </div>
                                <div class="row mb-3">
                                    @if ($errors->has('new_password'))
                                    <div class="alert alert-danger" role="alert">
                                        @foreach ($errors->get('new_password') as $error)
                                            {{$error}}
                                        @endforeach
                                    </div>
                                @endif
                                    <label for="new_password" class="col-md-4 col-form-label text-md-end">Новый пароль</label>
                                    <div class="col-md-6">

                                        <input id="new_password" type="password" class="form-control" name="new_password"
                                                  rows="9">
                                    </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
Изменить
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
