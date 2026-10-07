@extends('admin.layouts.main')

@section('content')
<main class="app-main">
    <!--begin::App Content Header-->
    <div class="app-content-header d-flex flex-column gap-4 px-5">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
                <div class="col-sm-6">
                    <h1 class="mb-0 fs-3">Посты</h1>
                </div>
                <div class="col-12">
                    <a href="{{ route('admin.posts.create') }}" class="btn btn-primary">Добавить Пост</a>
                </div>
            </div>
            <!--end::Row-->
        </div>

        <div class="card mb-4 row col-6">
            <!-- /.card-header -->
            <div class="card-body p-0 ">
                <table class="table table-sm" role="table">
                    <thead>
                        <tr>
                            <th style="width: 10px" scope="col">ID</th>
                            <th scope="col">Название</th>
                            <th scope="col">Контент</th>
                            <th scope="col">Категория</th>
                            <th scope="col">Действия</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($posts as $post )
                        <tr class="align-middle">
                            <td>{{ $post->id }}</td>
                            <td>{{ $post->title }}</td>
                            <td>{{ $post->content ?? ''}}</td>
                            <td>{{ $category[$post->category_id]['title'] ?? ''}}</td>
                            <td class="d-flex gap-4 items-center">
                                <a href="{{ route('admin.posts.show', $post->id) }}">
                                    <i class="bi bi-eye-fill"></i> </a>
                                <a href="{{ route('admin.posts.edit', $post->id) }}">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="{{ route('admin.posts.delete', $post->id) }}" method="delete">
                                    <button type="submit" class="btn btn-link p-0 m-0">
                                        <i class="bi bi-trash text-danger"></i>
                                    </button>
                                </form>
                            </td>

                        </tr>
                        <tr class="align-middle"></tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!--end::Container-->
    </div>
</main>

@endsection