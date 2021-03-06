@extends('layouts/app')

@push('css')

@endpush

@section('title')
Program Keahlian {{ $grade->title }}
@endsection

@section('content')
<!-- Begin Page Content -->
<!--================Home Banner Area =================-->
<section class="banner_area">
	<div class="banner_inner d-flex align-items-center">
		<div class="overlay bg-parallax" style="background-image: url({{ asset('/storage/front-img/notify-bg.jpg') }})" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background=""></div>
		<div class="container">
			<div class="banner_content text-center">
				<h2>{{ $grade->title }}</h2>
				<div class="page_link">
					<a href="{{ route('home') }}">Home</a>
					<a href="{{ route('jurusan') }}">Program Keahlian</a>
					<a href="#">{{ $grade->title }}</a>
				</div>
			</div>
		</div>
	</div>
</section>
<!--================End Home Banner Area =================-->

<!--================Course Details Area =================-->
<section class="course_details_area p_120">
	<div class="container">
		<div class="row course_details_inner">
			<div class="col-lg-8">
				<div class="c_details_img">
					<img class="img-fluid" src="{{ asset('storage/'.$grade->image) }}" alt="">
				</div>
				<ul class="nav nav-tabs" id="myTab" role="tablist">
					<li class="nav-item">
						<a class="nav-link" id="deskripsi-tab" data-toggle="tab" href="#deskripsi" role="tab" aria-controls="deskripsi" aria-selected="true">Selayang Pandang</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" id="materi-tab" data-toggle="tab" href="#materi" role="tab" aria-controls="materi" aria-selected="false">Materi Dasar</a>
					</li>
					<li class="nav-item">
						<a class="nav-link active" id="comments-tab" data-toggle="tab" href="#comments" role="tab" aria-controls="comments" aria-selected="false">Comments</a>
					</li>
				</ul>
				<div class="tab-content" id="myTabContent">
					<div class="tab-pane fade" id="deskripsi" role="tabpanel" aria-labelledby="deskripsi-tab">
						<div class="objctive_text">
							{!! $grade->description !!}
						</div>
					</div>
					<div class="tab-pane fade" id="materi" role="tabpanel" aria-labelledby="materi-tab">
						<div class="objctive_text">
							{!! $grade->materials !!}
						</div>
					</div>
					<div class="tab-pane fade show active" id="comments" role="tabpanel" aria-labelledby="comments-tab">
						<div class="comments-area">
							<h4>{{ count($testimonials) }} Testimoni</h4>
							@foreach($testimonials as $testimoni)
							<div class="comment-list">
								<div class="single-comment justify-content-between d-flex">
									<div class="user justify-content-between d-flex">
										<div class="thumb">
											<img src="img/blog/c1.jpg" alt="">
										</div>
										<div class="desc">
											<h5><a href="#">{{ $testimoni->name }}</a></h5>
											<p class="date">{{ $testimoni->created_at->diffForHumans() }}</p>
											<p class="comment">
												{!! $testimoni->testimoni !!}
											</p>
										</div>
									</div>
								</div>
							</div>
							@endforeach
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="blog_right_sidebar">
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
							<h3 class="widget_title">Latest Posts</h3>
							@foreach ($news as $berita)
							<div class="media post_item">
								<img src="{{ asset('storage/'.$berita->image) }}" height="70px" alt="post">
								<div class="media-body">
									<a href="{{ route('blog.detail', $berita) }}">
										<h3>{{ $berita->title }}</h3>
									</a>
									<p>{{ $berita->created_at->diffForHumans() }}</p>
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
<!--================End Course Details Area =================-->

<!-- /.container-fluid -->
@endsection
@push('js')

@endpush