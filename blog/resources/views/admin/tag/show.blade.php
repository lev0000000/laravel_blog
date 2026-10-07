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
                    <h1 class="mb-0 fs-3">{{ $tag->title }}</h1>
                </div>
            </div>
            <!--end::Row-->
        </div>

        <div class="card mb-4 row col-6">
            <!-- /.card-header -->
            <div class="card-body p-0 ">
                <table class="table table-sm" role="table">
                    <tbody>
                        <tr>
                            <td>ID</td>
                            <td>Название</td>
                            <td>Количество постов</td>
                        </tr>
                        <tr>
                            <td>{{ $tag->id }}</td>
                            <td>{{ $tag->title }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!--end::Container-->
    </div>
</main>

@endsection