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
                    <div class="card-header">@if($category->id)Изменение @else Добавление @endifкатегории</div>

                    <div class="card-body">
                        <form method="POST" action="@if(!$category->id){{ route('admin.create_category') }}@else{{ route('admin.update_category', $category) }}@endif ">
                            @csrf
                            <div class="row mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-end">Название категории</label>
                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name"
                                           value="{{$category->name ?? old('name')}}" autofocus>
                                </div>
                            </div>
                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        @if($category->id)Изменить @else Добавить @endif
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
