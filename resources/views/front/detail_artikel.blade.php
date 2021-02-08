@extends('layouts/app')

@push('css')

@endpush

@section('title')
Blog {{ Str::limit($article->title, 20) }}
@endsection

@section('content')
<!-- Begin Page Content -->
<!--================Home Banner Area =================-->
<section class="banner_area">
    <div class="banner_inner d-flex align-items-center">
        <div class="overlay bg-parallax" style="background-image: url({{ asset('/storage/front-img/notify-bg.jpg') }})" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background=""></div>
        <div class="container">
            <div class="banner_content text-center">
                <h2>{{ $article->title }}</h2>
                <div class="page_link">
                    <a href="{{ route('home') }}">Home</a>
                    <a href="{{ route('artikel') }}">Blog</a>
                    <a href="{{ $article->slug }}">{{ $article->title }}</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================End Home Banner Area =================-->

<section class="blog_area single-post-area p_120">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 posts-list">
                <div class="single-post row">
                    <div class="col-lg-12">
                        <div class="feature-img">
                            <img class="img-fluid" src="{{ asset('storage/'.$article->image) }}" alt="">
                        </div>
                    </div>
                    <div class="col-lg-3  col-md-3">
                        <div class="blog_info text-right">
                            <div class="post_tag">
                                @php
                                $tags = explode(",", $article->tags);
                                @endphp
                                @foreach ($tags as $tag)
                                <a href="#">{{ $tag }}, </a>
                                @endforeach
                            </div>
                            <ul class="blog_meta list">
                                <li><a href="#">{{ $article->writer }}<i class="lnr lnr-user"></i></a></li>
                                <li><a href="#">{{ $article->created_at->format('d F, Y') }}<i class="lnr lnr-calendar-full"></i></a></li>
                                <li><a href="#">{{ $article->view }} Views<i class="lnr lnr-eye"></i></a></li>
                                <!-- <li><a href="#">06 Comments<i class="lnr lnr-bubble"></i></a></li> -->
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-9 blog_details">
                        <h2>{{ $article->title }}</h2>
                        {!! $article->description !!}
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="blog_right_sidebar">
                    <aside class="single_sidebar_widget search_widget">
                        <form action="{{ route('artikel.find') }}" method="post">
                            @csrf
                            <div class="input-group">
                                <input type="text" class="form-control" name="cari" placeholder="Cari Artikel">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" name="button" type="submit"><i class="lnr lnr-magnifier"></i></button>
                                </span>
                            </div><!-- /input-group -->
                        </form>
                        <div class="br"></div>
                    </aside>
                    <aside class="single_sidebar_widget popular_post_widget">
                        <h3 class="widget_title">Artikel Populer</h3>
                        @foreach ($populararticle as $popular)
                        <div class="media post_item">
                            <img src="{{ asset('storage/'.$popular->image) }}" height="70px" alt="post">
                            <div class="media-body">
                                <a href="{{ route('artikel.detail', $popular) }}">
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

<!-- /.container-fluid -->
@endsection
@push('js')

@endpush