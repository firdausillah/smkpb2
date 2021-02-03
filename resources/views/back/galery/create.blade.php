@extends('layouts.backend')

@push('css')
    <!-- Custom styles for this page -->
<script type="text/javascript" src="{{ asset('admin/ckeditor/ckeditor.js') }}"></script>
<link rel="stylesheet" href="{{ asset('admin/dropzone/dist/min/dropzone.min.css') }}">
<link rel="stylesheet" href="{{ asset('admin/dropzone/dist/min/basic.min.css') }}">
@endpush

@section('title', 'Galery')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        @include('alert')
        <div class="col-sm-12">
            <div class="card shadow mb-4">
                <div class="card-header py-2">
                    <h6 class="m-0 font-weight-bold text-primary">Tambah Data</h6>
                </div>
                <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <form action="{{ route('galery.create') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    @include('back.galery.partials.form-control')
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
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script> --}}
    <script src="{{ asset('admin/dropzone/dist/min/dropzone.min.js') }}"></script>
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> --}}
    <script type="text/javascript">
            $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
    <script type="text/javascript">
        function buatslug() {
            var title = $('#title').val();
            $('#slug').val(slugify(title));
        }
        
        function slugify(text) {
            return text.toString().toLowerCase().replace(/\s+/g, '-') // Ganti spasi dengan -
                .replace(/[^\w\-]+/g, '') // Hapus semua karakter non-word
                .replace(/\-\-+/g, '-') // Ganti multiple - atau single -
                .replace(/^-+/, '') 
                .replace(/-+$/, '');
        }	
    </script>
    <script type="text/javascript">
        Dropzone.autoDiscover = false;
        
        var foto_upload= new Dropzone(".dropzone",{
            url: "{{ route('galery.create') }}",
            maxFilesize: 2,
            method:"post",
            acceptedFiles:"image/*",
            paramName:"userfile",
            dictInvalidFileType:"Type file ini tidak dizinkan",
            addRemoveLinks:true,
            headers:{'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')},
        });


        //Event ketika Memulai mengupload
        foto_upload.on("sending",function(a,b,c){
            a.token=Math.random();
            c.append("token_foto",a.token); //Menmpersiapkan token untuk masing masing foto
            c.append("title", $('#title').val());
            c.append("description", $('#description').val());
            c.append("grades", $('#grades').val());
            c.append("slug", $('#slug').val());
        });
    </script>
@endpush