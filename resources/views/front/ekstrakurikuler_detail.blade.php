@extends('layouts/app')

@push('css')

@endpush

@section('title')
Kegiatan Siswa {{ $extracurricular->title }}
@endsection

@section('content')
<!-- Begin Page Content -->
<!--================Home Banner Area =================-->
<section class="banner_area">
	<div class="banner_inner d-flex align-items-center">
		<div class="overlay bg-parallax" style="background-image: url({{ asset('/storage/front-img/notify-bg.jpg') }})" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background=""></div>
		<div class="container">
			<div class="banner_content text-center">
				<h2>{{ $extracurricular->title }}</h2>
				<div class="page_link">
					<a href="{{ route('home') }}">Home</a>
					<a href="{{ route('ekstrakurikuler') }}">Kegiatan Siswa</a>
					<a href="#">{{ $extracurricular->title }}</a>
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
					<img class="img-fluid" src="{{ asset('storage/'.$extracurricular->image) }}" alt="">
				</div>
				<ul class="nav nav-tabs" id="myTab" role="tablist">
					<li class="nav-item active">
						<a class="nav-link" id="deskripsi-tab" data-toggle="tab" href="#deskripsi" role="tab" aria-controls="deskripsi" aria-selected="true">Selayang Pandang</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" id="materi-tab" data-toggle="tab" href="#materi" role="tab" aria-controls="materi" aria-selected="false">Jenis Kegiatan</a>
					</li>
				</ul>
				<div class="tab-content" id="myTabContent">
					<div class="tab-pane fade show active" id="deskripsi" role="tabpanel" aria-labelledby="deskripsi-tab">
						<div class="objctive_text">
							{!! $extracurricular->description !!}
						</div>
					</div>
					<div class="tab-pane fade" id="materi" role="tabpanel" aria-labelledby="materi-tab">
						<div class="objctive_text">
							{!! $extracurricular->type !!}
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