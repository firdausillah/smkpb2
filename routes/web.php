<?php

use App\Http\Controllers\{HomeController, DashboardController, LogoutController, ProfileController, BlogController, JurusanController, ContactController, TeachController, ArtikelController, EkstrakurikulerController, GaleriController};
use App\Http\Controllers\Admin\{NewsController, GradeController, TeachesController, GaleryController, BannerController, TestimonialController, ImageController,ArticleController, ExtracurricularController};
use Illuminate\Support\Facades\{Route, Auth};


Auth::routes();

Route::get('/', HomeController::class)->name('home');

//auth
Route::get('/logout', LogoutController::class)->name('logout');

// front
// blog
Route::get('/blog', BlogController::class)->name('blog');
Route::get('/blog/{news:slug}', [BlogController::class, 'detail'])->name('blog.detail');
Route::post('/blog/find', [BlogController::class, 'find'])->name('blog.find');

//articles front
Route::get('/artikel', ArtikelController::class)->name('artikel');
Route::get('/artikel/{article:slug}', [ArtikelController::class, 'detail'])->name('artikel.detail');
Route::post('/artikel/find', [ArtikelController::class, 'find'])->name('artikel.find');

// Jurusan
Route::get('/program-keahlian', JurusanController::class)->name('jurusan');
Route::get('/program-keahlian/{grade:slug}', [JurusanController::class, 'detail'])->name('jurusan.detail');

// Ekstrakurikuler
Route::get('/ekstrakurikuler', EkstrakurikulerController::class)->name('ekstrakurikuler');
Route::get('/ekstrakurikuler/{extracurricular:slug}', [EkstrakurikulerController::class, 'detail'])->name('ekstrakurikuler.detail');

// Contact
Route::get('/contact', ContactController::class)->name('contact');
Route::post('/contact', [ContactController::class, 'saveTestimoni'])->name('contact.testimoni');

// Guru
Route::get('/teach', TeachController::class)->name('guru');

// Galeri
Route::get('/galeri', GaleriController::class)->name('galeri');

// admin
Route::group(['middleware' => 'auth', 'prefix' => 'admin'], function () {
    Route::get('/dashboard', DashboardController::class)->name('admin_dashboard');

    Route::prefix('news')->group(function () {
        Route::get('/', NewsController::class)->name('news');
        Route::get('/create', [NewsController::class, 'create'])->name('news.create');
        Route::post('/create', [NewsController::class, 'save']);
        Route::get('{news:slug}/edit', [NewsController::class, 'edit'])->name('news.edit');
        Route::put('{news:slug}/edit', [NewsController::class, 'update']);
        Route::get('{news:slug}/detail', [NewsController::class, 'detail'])->name('news.detail');
        Route::get('{news:slug}/delete', [NewsController::class, 'destroy'])->name('news.delete');
    });

    Route::prefix('article')->group(function () {
        Route::get('/', ArticleController::class)->name('article');
        Route::get('/create', [ArticleController::class, 'create'])->name('article.create');
        Route::post('/create', [ArticleController::class, 'save']);
        Route::get('{article:slug}/edit', [ArticleController::class, 'edit'])->name('article.edit');
        Route::put('{article:slug}/edit', [ArticleController::class, 'update']);
        Route::get('{article:slug}/detail', [ArticleController::class, 'detail'])->name('article.detail');
        Route::get('{article:slug}/delete', [ArticleController::class, 'destroy'])->name('article.delete');
    });
    
    Route::prefix('grade')->group(function () {
        Route::get('/', GradeController::class)->name('grade');
        Route::get('/create', [GradeController::class, 'create'])->name('grade.create');
        Route::post('/create', [GradeController::class, 'save']);
        Route::get('{grade:slug}/edit', [GradeController::class, 'edit'])->name('grade.edit');
        Route::put('{grade:slug}/edit', [GradeController::class, 'update']);
        Route::get('{grade:slug}/detail', [GradeController::class, 'detail'])->name('grade.detail');
        Route::get('{grade:slug}/delete', [GradeController::class, 'destroy'])->name('grade.delete');
    });
    
    Route::prefix('extracurricular')->group(function () {
        Route::get('/', ExtracurricularController::class)->name('extracurricular');
        Route::get('/create', [ExtracurricularController::class, 'create'])->name('extracurricular.create');
        Route::post('/create', [ExtracurricularController::class, 'save']);
        Route::get('{extracurricular:slug}/edit', [ExtracurricularController::class, 'edit'])->name('extracurricular.edit');
        Route::put('{extracurricular:slug}/edit', [ExtracurricularController::class, 'update']);
        Route::get('{extracurricular:slug}/detail', [ExtracurricularController::class, 'detail'])->name('extracurricular.detail');
        Route::get('{extracurricular:slug}/delete', [ExtracurricularController::class, 'destroy'])->name('extracurricular.delete');
    });

    Route::prefix('teach')->group(function(){
        Route::get('/', TeachesController::class)->name('teach');
        Route::get('/create', [TeachesController::class, 'create'])->name('teach.create');
        Route::post('/create', [TeachesController::class, 'save']);
        Route::get('{teach:slug}/edit', [TeachesController::class, 'edit'])->name('teach.edit');
        Route::put('{teach:slug}/edit', [TeachesController::class, 'update']);
        Route::get('{teach:slug}/delete', [TeachesController::class, 'destroy'])->name('teach.delete');
    });

    Route::prefix('profile')->group(function(){
        Route::get('/', ProfileController::class)->name('profile');
        Route::post('/create', [ProfileController::class, 'save'])->name('profile.create');
        Route::put('/update', [ProfileController::class, 'update'])->name('profile.update');
    });

    Route::prefix('galery')->group(function(){
        Route::get('/', GaleryController::class)->name('galery');
        Route::get('/create', [GaleryController::class, 'create'])->name('galery.create');
        Route::post('/create', [GaleryController::class, 'save']);
        Route::get('{galery:slug}/edit', [GaleryController::class, 'edit'])->name('galery.edit');
        Route::put('{galery:slug}/edit', [GaleryController::class, 'update']);
    });

    Route::prefix('image')->group(function(){
        Route::get('', ImageController::class)->name('image');
        Route::get('create', [ImageController::class, 'create'])->name('image.create');
        Route::post('create', [ImageController::class, 'save']);
    });

    Route::prefix('banner')->group(function(){
        Route::get('/', BannerController::class)->name('banner');
        Route::get('/create', [BannerController::class, 'create'])->name('banner.create');
        Route::post('/create', [BannerController::class, 'save']);
        Route::get('{banner:slug}/edit', [BannerController::class, 'edit'])->name('banner.edit');
        Route::put('{banner:slug}/edit', [BannerController::class, 'update']);
        Route::get('{banner:slug}/delete', [BannerController::class, 'destroy'])->name('banner.delete');
    });

    Route::prefix('testimonial')->group(function(){
        Route::get('', TestimonialController::class)->name('testimonial');
        Route::get('create', [TestimonialController::class, 'create'])->name('testimonial.create');
        Route::post('create', [TestimonialController::class, 'save']);
        Route::get('{testimonial:slug}/create', [TestimonialController::class, 'edit'])->name('testimonial.edit');
        Route::put('{testimonial:slug}/create', [TestimonialController::class, 'update']);
        Route::get('{testimonial:slug}/delete', [TestimonialController::class, 'destroy'])->name('testimonial.delete');
    });
});