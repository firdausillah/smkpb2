@extends('layouts/app')

@push('css')

@endpush

@section('title', 'Galery')

@section('content')
<!-- Begin Page Content -->
<!--================Home Banner Area =================-->
<section class="banner_area">
    <div class="banner_inner d-flex align-items-center">
        <div class="overlay bg-parallax" style="background-image: url({{ asset('/storage/front-img/notify-bg.jpg') }})" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background=""></div>
        <div class="container">
            <div class="banner_content text-center">
                <h2>Galery</h2>
                <div class="page_link">
                    <a href="{{ route('home') }}">Home</a>
                    <a href="#">Galery</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================End Home Banner Area =================-->

@if (!empty($submit))
<section class="blog_area p_120">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <h2>{{ $submit }}</h2>
            </div>
        </div>
    </div>
</section>
@endif

<!--================Blog Area =================-->
<section class="blog_area p_120">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="blog_left_sidebar">
                    <iframe src="https://drive.google.com/embeddedfolderview?id=1eTRiwaG7MIoqyaG3Qny8SbmYY2nw4Q6v#grid" width="100%" height="500" frameborder="0"></iframe>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="blog_right_sidebar">
                    <aside class="single_sidebar_widget search_widget">
                        <form action="{{ route('blog.find') }}" method="post">
                            @csrf
                            <div class="input-group">
                                <input type="text" class="form-control" name="cari" placeholder="Cari post">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" name="button" type="submit"><i class="lnr lnr-magnifier"></i></button>
                                </span>
                            </div><!-- /input-group -->
                        </form>
                        <div class="br"></div>
                    </aside>
                    <aside class="single_sidebar_widget popular_post_widget">
                        <h3 class="widget_title">Berita Populer</h3>
                        @foreach ($popularpost as $popular)
                        <div class="media post_item">
                            <img src="{{ asset('storage/'.$popular->image) }}" height="70px" alt="post">
                            <div class="media-body">
                                <a href="{{ route('blog.detail', $popular) }}">
                                    <h3>{{ $popular->title }}</h3>
                                </a>
                                <p>{{ $popular->created_at->diffForHumans() }}</p>
                            </div>
                        </div>
                        @endforeach
                        <div class="br"></div>
                    </aside>
                </div>
            </div>
        </div>
    </div>
</section>

<!--================Blog Area =================-->

<!-- /.container-fluid -->
@endsection
@push('js')

@endpush