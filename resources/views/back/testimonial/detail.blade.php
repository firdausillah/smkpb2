@extends('layouts.backend')

@push('css')

@endpush

@section('title', 'Blog')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        @include('alert')

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">News</h1>
                    <!-- DataTales Example -->
                    <div class="col-sm-6">
                        <div class="card shadow mb-4">
                            <div class="card-header py-2">
                                <button type="" class="btn btn-secondary btn-sm m-0 font-weight-bold float-right" onclick="history.back(-1)" name="button">Kembali</button>
                            </div>
                            <div class="card-body">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <th scope="row">Judul</th>
                                            <td>{{ $news->title }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Tumbnail</th>
                                            <td><a href="{{ asset('storage/'.$news->image) }}"><img src="{{ asset('storage/'.$news->image) }}"  height="100px" alt="{{ $news->title }}"></a></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Deskripsi</th>
                                            <td>{!! $news->description !!}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Kelas</th>
                                            <td>{{ $news->grades ? $news->grades->title:'Umum'}}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Tags</th>
                                            <td>{{ $news->tags }}</td>
                                        </tr>
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