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
                    <h1 class="mb-0 fs-3">Категории</h1>
                </div>
                <div class="col-12">
                    <a href="{{ route('admin.categories.create') }}" class="btn btn-primary">Добавить категорию</a>
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
                            <th scope="col">Количество постов</th>
                            <th scope="col">Действия</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $cat )
                        <tr class="align-middle">
                            <td>{{ $cat->id }}</td>
                            <td>{{ $cat->title }}</td>
                            <td>{{ $cat->posts_count ?? 0 }}</td>
                            <td class="d-flex gap-4 items-center">
                                <a href="{{ route('admin.categories.show', $cat->id) }}">
                                    <i class="bi bi-eye-fill"></i> </a>
                                <a href="{{ route('admin.categories.edit', $cat->id) }}">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="{{ route('admin.categories.delete', $cat->id) }}" method="delete">
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