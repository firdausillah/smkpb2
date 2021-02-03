@extends('layouts/app')

@push('css')
    
@endpush

@section('title', 'Jurusan')

@section('content')
  <!-- Begin Page Content -->
          <!--================Home Banner Area =================-->
        <section class="banner_area">
            <div class="banner_inner d-flex align-items-center">
            	<div class="overlay bg-parallax" style="background-image: url({{ asset('/storage/front-img/notify-bg.jpg') }})" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background=""></div>
				<div class="container">
					<div class="banner_content text-center">
						<h2>Jurusan</h2>
						<div class="page_link">
							<a href="{{ route('home') }}">Home</a>
							<a href="{{ route('jurusan') }}">Jurusan</a>
						</div>
					</div>
				</div>
            </div>
        </section>
        <!--================End Home Banner Area =================-->
        
        <!--================Blog Categorie Area =================-->
        <section class="blog_categorie_area mb-5 mt-5">
            <div class="container">
                <div class="row">
                    @foreach ($grades as $grade)
                    <div class="col-lg-4">
                        <div class="categories_post">
                            <img src="{{ asset('storage/'.$grade->image) }}" alt="post">
                            <div class="categories_details">
                                <div class="categories_text">
                                    <a href="{{ route('jurusan.detail', $grade) }}"><h5>{{ $grade->title }}</h5></a>
                                    <div class="border_line"></div>
                                </div>
                            </div>
                        </div>
                    </div>  
                    @endforeach
                </div>
            </div>
        </section>
        <!--================Blog Categorie Area =================-->

        <!--================Impress Area =================-->
        <section class="impress_area p_120" style="background-image: url({{ asset('/storage/front-img/buzz-lightyear.jpg') }})">
            <div class="container">
                <div class="impress_inner text-center" >
                    <h2>"To Infinity And Beyond"</h2>
                    <p><i>Buzz Lightyear</i></p>
                </div>
            </div>
        </section>
        <!--================End Impress Area =================-->
        
  <!-- /.container-fluid -->
@endsection
@push('js')
    
@endpush