@extends('layouts.backend')

@push('css')

@endpush

@section('title', 'Blog')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        @include('alert')

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Article</h1>
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
                                            <td>{{ $article->title }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Tumbnail</th>
                                            <td><a href="{{ asset('storage/'.$article->image) }}"><img src="{{ asset('storage/'.$article->image) }}"  height="100px" alt="{{ $article->title }}"></a></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Deskripsi</th>
                                            <td>{!! $article->description !!}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Kelas</th>
                                            <td>{{ $article->grades ? $article->grades->title:'Umum'}}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Tags</th>
                                            <td>{{ $article->tags }}</td>
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