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
                    <div class="card-header">
Изменение прав доступа

                    </div>

                    <div class="card-body">
                       <form action="{{ route('admin.changePermissions') }}" method="POST">
                           @csrf
                                @forelse ($users as $user)
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $user->name }}</h5>
                                            @if($user->is_admin)
                                            <a type="button submit" href="{{route('admin.toggleAdmin', $user)}}" class="btn btn-danger">Admin</a>
                                            @else
                                            <a type="button submit" href="{{route('admin.toggleAdmin', $user)}}" class="btn btn-secondary">User</a>
                                            @endif    
                                        </div>
                                        </div>
                                @empty
                                    Нет пользователей
                                @endforelse
                                </form>
                                {{$users->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
