@extends('admin.layouts.main')

@section('content')
<main class="app-main">
    <!--begin::App Content Header-->
    <div class="app-content-header">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
                <div class="col-sm-6">
                    <h1 class="mb-3 fs-3">Редактирование поста</h1>
                </div>
                <div class="col-12">
                    <form action="{{ route('admin.posts.update', $tag->id) }}" method="post">
                        @csrf
                        <label for="">Название</label>
                        <input type="text" class="form-control col-4 w-25 mb-3" name="title" placeholder="Название поста" value="{{ $tag->title }}">
                        @error('title')
                            <div class="text-danger">Это поле обязательно к заполнению</div>
                        @enderror
                        <button type="submit" class="btn btn-primary">Обновить</button>
                    </form>
                </div>
            </div>
            <!--end::Row-->
        </div>
        <!--end::Container-->
    </div>
</main>

@endsection