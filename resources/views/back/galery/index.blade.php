@extends('layouts/backend')

@push('css')
    
@endpush

@section('title', 'Galery')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        @include('alert')

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">News</h1>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-2">
                            <a href="{{ route('galery.create') }}" class="btn btn-primary btn-sm m-0 font-weight-bold float-right">Tambah Galery</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Judul</th>
                                            <th>Grade</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($galery as $index => $a)
                                        <tr>
                                            <td>{{ $a->title }}</td>
                                            <td>{{ $a->grades ? $a->grades->title:'Umum' }}</td>
                                            <td>
                                                <a href="{{ route('galery.edit', $a) }}" class="btn btn-success btn-sm"><i class="fas fa-pencil-alt"></i></a>
                                                {{-- <a href="{{ route('news.detail', $a) }}" class="btn btn-warning btn-sm"><i class="fa fa-eye"></i></a> --}}
                                                {{-- <a href="{{ route('news.delete', $a) }}" class="btn btn-danger btn-sm" onclick="return confirm_dialog();"><i class="fa fa-eraser"></i></a> --}}
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
    
@endpush