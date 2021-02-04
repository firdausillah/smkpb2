<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Testimonial, Grade};
use Illuminate\Support\Str;

class ContactController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        return view('front/contact', [
            'grades' => Grade::get()
        ]);
    }

    public function saveTestimoni(){
        // dd(request());
        request()->validate([
            'name' => 'required|unique:testimonials',
            'testimoni' => 'required',
        ]);

        Testimonial::create([
            'name' => request('name'),
            'email' => request('email'),
            'image' => request('image') ? request()->file('image')->store('images/testimonial') : 'null',
            'testimoni' => request('testimoni'),
            'grade' => request('grade'),
            'status' => '0',
            'slug' => Str::slug(request('name')),
        ]);
        return back()->with('success', 'Terimakasih telah mengirimkan testimoni anda');
    }
}
