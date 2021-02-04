@extends('layouts/app')

@push('css')
<link rel="stylesheet" href="{{ asset('css/imagehover.min.css') }}">
@endpush

@section('title', 'Guru dan Staff')

@section('content')
<!-- Begin Page Content -->
<!--================Home Banner Area =================-->
<section class="banner_area">
    <div class="banner_inner d-flex align-items-center">
        <div class="overlay bg-parallax" style="background-image: url({{ asset('/storage/front-img/notify-bg.jpg') }})" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background=""></div>
        <div class="container">
            <div class="banner_content text-center">
                <h2>Guru dan Staf SMK Puspa Bangsa 2</h2>
                <div class="page_link">
                    <a href="{{ route('home') }}">Home</a>
                    <a href="{{ route('teach') }}">Guru dan Staff SMK Puspa Bangsa 2</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================End Home Banner Area =================-->

<!--================Teach Area =================-->
<section class="teach p_120 mb-5">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 text-center">
                @for($i=0;$i<5;$i++) @foreach($teach as $guru) <figure class="imghvr-flip-vert" style="background-color:#09664c">
                    <img src="{{ asset('storage/'.$guru->image) }}" height="200px">
                    <figcaption style="background-color:#03a678">
                        <h3>{{ $guru->name }}</h3>
                        <p>{{ $guru->NIPY }}</p>
                    </figcaption>
                    </figure>
                    @endforeach
                    @endfor
            </div>
        </div>
    </div>
</section>

<!--================Teach Area =================-->

<!-- /.container-fluid -->
@endsection
@push('js')

@endpush