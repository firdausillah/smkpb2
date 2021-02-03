@extends('layouts.backend')

@push('css')
    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
@endpush

@section('title', 'Jurusan')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        @include('alert')

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Jurusan</h1>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-2">
                            <a href="{{ route('grade.create') }}" class="btn btn-primary btn-sm m-0 font-weight-bold float-right">Tambah Data</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Judul</th>
                                            <th>Icon</th>
                                            <th>Gambar</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($grades as $index => $grade)
                                        <tr>
                                            <td>{{ $grade->title }}</td>
                                            <td><i class="{{ $grade->icon }}"></i></td>
                                            <td><a href="{{ asset('storage/'.$grade->image) }}"><img src="{{ asset('storage/'.$grade->image) }}"  height="100px" alt=""></a></td>
                                            <td>
                                                <a href="{{ route('grade.edit', $grade) }}" class="btn btn-success btn-sm"><i class="fas fa-pencil-alt"></i></a>
                                                <a href="{{ route('grade.delete', $grade) }}" class="btn btn-danger btn-sm" onclick="return confirm_dialog();"><i class="fa fa-eraser"></i></a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

    </div>
    <!-- /.container-fluid -->
@endsection
@push('js')
    <!-- Page level plugins -->
    <script src="{{ asset('admin/vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('admin/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
        <!-- Page level custom scripts -->
    <script src="{{ asset('admin/js/demo/datatables-demo.js') }}"></script>
    <script>
        function confirm_dialog(){
            return confirm('Apakah anda yakin ingin menghapus data ini ?');
        }
    </script>
@endpush