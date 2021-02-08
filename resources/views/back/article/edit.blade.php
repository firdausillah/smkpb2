@extends('layouts.backend')

@push('css')
    <!-- Custom styles for this page -->
<script type="text/javascript" src="{{ asset('admin/ckeditor/ckeditor.js') }}"></script>
@endpush

@section('title', 'Blog')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        @include('alert')
        <div class="col-sm-8">
            <div class="card shadow mb-4">
                <div class="card-header py-2">
                    <h6 class="m-0 font-weight-bold text-primary">Update Data</h6>
                </div>
                <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <form action="{{ route('article.edit', $article) }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    @method('put')
                                    @include('back.article.partials.form-control')
                                </form>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
@endsection
@push('js')
    <!-- Page level plugins -->

@endpush