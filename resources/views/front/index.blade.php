@extends('layouts/app')

@push('css')

@endpush

@section('title', 'Home')
@section('content')
<!-- Begin Page Content -->
<!--================Home Banner Area =================-->
@if (!empty($banners))
<section class="home_banner_area">
	<div class="box-1620 banner_inner">
		<div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
			<ol class="carousel-indicators">
				@php
				$no=0
				@endphp
				@foreach ($banners as $banner)
				<li data-target="#carouselExampleFade" data-slide-to="{{ $no }}" {{ $no==0 ? 'class="active"' : '' }}></li>
				@php
				$no++
				@endphp
				@endforeach
			</ol>
			<div class="carousel-inner">
				@php
				$no=1
				@endphp
				@foreach ($banners as $banner)
				<div class="carousel-item blockout {{ $no==1 ? 'active' : '' }}">
					<div class="gradient">
						<img src="{{ asset('storage/'.$banner->image) }}" class="d-block w-100" alt="{{ $banner->title }}">
						<div class="carousel-caption d-none d-md-block banner_content m-auto">
							<h3>{{ $banner->title }}</h3>
							<p>{!! Str::limit($banner->description, 200) !!}</p>
							<a class="main_btn" href="{{ $banner->link }}">Selengkapnya</a>
						</div>
					</div>
				</div>
				@php
				$no++
				@endphp
				@endforeach
			</div>
			<a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
				<span class="carousel-control-prev-icon" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
			</a>
			<a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
				<span class="carousel-control-next-icon" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
			</a>
		</div>
	</div>
</section>
@endif
<!--================End Home Banner Area =================-->

<!--================Finance Area =================-->
@if (!empty($grades))
<section class="finance_area">
	<div class="container">
		<div class="finance_inner row">
			@foreach ($grades as $grade)
			<div class="col-lg-3 col-sm-6 mr-auto ml-auto">
				<div class="finance_item">
					<div class="media">
						<div class="d-flex">
							<i class="{{ $grade->icon }}"></i>
						</div>
						<div class="media-body">
							<h5>{{ $grade->title }}</h5>
						</div>
					</div>
				</div>
			</div>
			@endforeach
		</div>
	</div>
</section>
@endif
<!--================End Finance Area =================-->

<!--================Courses Area =================-->
<section class="Greeting_area p_120">
	<div class="container">
		<div class="main_title">
			<h2>Wellcome!</h2>
		</div>
		<div class="row courses_inner">
			<div class="whole-wrap">
				<div class="container">
					<div class="row">
						<div class="col-md-3 mt-sm-20 mt-auto mb-auto text-center">
							<img src="{{ asset('storage/images/kepalasmk.jpg') }}" alt="" style="height : 250px" class="img-fluid">
						</div>
						<div class="col-md-9 mt-sm-20 left-align-p">
							<blockquote class="generic-blockquote">
								@if(!empty($profile->greeting))
								{!! $profile->greeting !!}
								@else
								<p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Fugit error voluptatibus quo est ab rerum rem vel. Sequi, minus vel aliquam, accusamus neque sapiente, corrupti numquam quidem cupiditate mollitia doloribus?</p>
								@endif
							</blockquote>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!--================End Courses Area =================-->

<!--================Latest Blog Area =================-->
@if (!empty($news))
<section class="latest_blog_area p_120">
	<div class="container">
		<div class="main_title">
			<h2>Latest Posts From Blog</h2>
		</div>
		<div class="row latest_blog_inner">
			@foreach ($news as $berita)
			<div class="col-lg-3 col-md-6">
				<div class="l_blog_item">
					<img class="img-fluid" src="{{ asset('storage/'.$berita->image) }}" alt="">
					<a class="date" href="#">{{ $berita->created_at->diffForHumans() }} | by {{ $berita->writer }}</a>
					<a href="single-blog.html">
						<h4>{{ $berita->title }}</h4>
					</a>
					<p>{!! Str::limit($berita->description, 100) !!}</p>
				</div>
			</div>
			@endforeach
		</div>
	</div>
</section>
@endif
<!--================End Latest Blog Area =================-->

<!--================Testimonials Area =================-->
<section class="testimonials_area p_120">
	<div class="container">
		<div class="testi_slider owl-carousel">
			@foreach($testimonials as $testimonial)
			<div class="item">
				<div class="testi_item">
					<div class="rounded-img">
						<img src="{{ asset('storage/'.$testimonial->image) }}" height="100px" class="img-rounded" alt="">
					</div>
					<h4>{{ $testimonial->name }}</h4>
					{!! $testimonial->testimoni !!}
				</div>
			</div>
			@endforeach
		</div>
	</div>
</section>
<!--================End Testimonials Area =================-->

<!-- /.container-fluid -->
@endsection
@push('js')

@endpush