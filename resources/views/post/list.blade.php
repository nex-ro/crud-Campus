@extends('layouts.main')
@section('title', 'List Data Post')
@section('button_header')
    <a href='#' class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target='#kt_modal_create_app'
        id="btn-create-post">Create</a>
@endsection
@section('judul_header', 'Data Post')
@section('content')
    <div class="container" style="margin-top: 50px">
        <div class="row">
            <div class="col-md-12">
                <h4 class="text-center">LARAVEL CRUD AJAX </h4>
                <div class="card border-0 shadow-sm rounded-md mt-4">
                    <div class="card-body">
                        <a href="javascript:void(0)" class="btn btn-success mb-2" id="btn-create-post">TAMBAH</a>
                        <table id="kt_datatable_example_5" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Content</th>
                                    <th>Gambar</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="table-posts">
                                @foreach ($posts as $post)
                                    <tr id="index_{{ $post->id }}">
                                        <td>{{ $post->title }}</td>
                                        <td>{{ $post->content }}</td>
                                        <td><img src="{{ url('storage/posts/' . $post->image) }}" width="50"
                                                height="50"></td>
                                        <td class="text-center">
                                            <a href="javascript:void(0)" id="btn-edit-post" data-id="{{ $post->id }}"
                                                class="btn btn-primary btn-sm">EDIT</a>

                                            <a href="javascript:void(0)" id="btn-delete-post" data-id="{{ $post->id }}"
                                                class="btn btn-danger btn-sm">DELETE</a>

                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },

        });
    </script>
    @include('post.modal-create')
    @include('post.update')
    @include('post.delete')

@endsection
@section('css')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@endsection
@section('js')
    <script src="{{ url('demo1/dist/assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
    <script>
        $("#kt_datatable_example_5").DataTable({
            "language": {
                "lengthMenu": "Show _MENU_",
            },
            "dom": "<'row'" +
                "<'col-sm-6 d-flex align-items-center justify-conten-start'l>" +
                "<'col-sm-6 d-flex align-items-center justify-content-end'f>" +
                ">" +

                "<'table-responsive'tr>" +

                "<'row'" +
                "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
                "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
                ">"
        });
    </script>
@endsection
