@extends('admin.layouts.main')

@section('content')
<main class="app-main">
    <!--begin::App Content Header-->
    <div class="app-content-header d-flex flex-column gap-4">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
                <div class="col-sm-6">
                    <h1 class="mb-0 fs-3">Dashboard</h1>
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
                            <td>
                                <a href="{{ route('admin.categories.show', $cat->id) }}">
                                    <i class="fa fa-eye bi-eye text-primary" aria-hidden="true"></i>
                                </a>
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