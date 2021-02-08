<?php

namespace App\Http\Controllers;
use App\Models\{Grade, News, Testimonial};

use Illuminate\Http\Request;

class JurusanController extends Controller
{
    public function __invoke(Grade $jurusan){
        return view('front/jurusan', [
            'grades' => Grade::get(),
            'jurusan' => $jurusan
        ]);
    }

    public function detail(Grade $grade){
        // dd($grade->id);
        return view('front/jurusan_detail', [
            'grade' => $grade,
            'news' => News::take(5)->get(),
            'testimonials' => Testimonial::where('grade', '=', $grade->id)->get()
        ]);
    }
}
