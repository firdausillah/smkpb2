<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\{Testimonial, Grade};

use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    public function __invoke()
    {
        return view('back/testimonial/index', [
            'testimonials' => Testimonial::get()
        ]);
    }

    public function create(){
        return view('back/testimonial/create', [
            "testimonial" => new Testimonial,
            'grades' => Grade::get(),
            "submit" => 'Create'
        ]);
    }

    public function save(){
        dd(request());
    }
}
