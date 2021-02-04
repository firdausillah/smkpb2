@extends('layouts/app')

@push('css')

@endpush

@section('title')
Blog {{ Str::limit($news->title, 20) }}
@endsection

@section('content')
<!-- Begin Page Content -->
<!--================Home Banner Area =================-->
<section class="banner_area">
    <div class="banner_inner d-flex align-items-center">
        <div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background=""></div>
        <div class="container">
            <div class="banner_content text-center">
                <h2>{{ $news->title }}</h2>
                <div class="page_link">
                    <a href="{{ route('home') }}">Home</a>
                    <a href="{{ route('blog') }}">Blog</a>
                    <a href="{{ $news->slug }}">{{ $news->title }}</a>
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
                            <img class="img-fluid" src="{{ asset('storage/'.$news->image) }}" alt="">
                        </div>
                    </div>
                    <div class="col-lg-3  col-md-3">
                        <div class="blog_info text-right">
                            <div class="post_tag">
                                @php
                                $tags = explode(",", $news->tags);
                                @endphp
                                @foreach ($tags as $tag)
                                <a href="#">{{ $tag }}, </a>
                                @endforeach
                            </div>
                            <ul class="blog_meta list">
                                <li><a href="#">{{ $news->writer }}<i class="lnr lnr-user"></i></a></li>
                                <li><a href="#">{{ $news->created_at->format('d F, Y') }}<i class="lnr lnr-calendar-full"></i></a></li>
                                <li><a href="#">{{ $news->view }} Views<i class="lnr lnr-eye"></i></a></li>
                                <!-- <li><a href="#">06 Comments<i class="lnr lnr-bubble"></i></a></li> -->
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-9 blog_details">
                        <h2>{{ $news->title }}</h2>
                        {!! $news->description !!}
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="blog_right_sidebar">
                    <aside class="single_sidebar_widget search_widget">
                        <form action="{{ route('blog.find') }}" method="post">
                            @csrf
                            <div class="input-group">
                                <input type="text" class="form-control" name="cari" placeholder="Cari Post">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" name="button" type="submit"><i class="lnr lnr-magnifier"></i></button>
                                </span>
                            </div><!-- /input-group -->
                        </form>
                        <div class="br"></div>
                    </aside>
                    <aside class="single_sidebar_widget popular_post_widget">
                        <h3 class="widget_title">Popular Posts</h3>
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

<!-- /.container-fluid -->
@endsection
@push('js')

@endpush