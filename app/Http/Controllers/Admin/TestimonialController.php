<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\{Testimonial, Grade};
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

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
        request()->validate( [
            'name' => 'required|unique:testimonials',
            'image' => request('image') ? 'image|mimes:jpg,jpeg,png,gif' :'',
            'testimoni' => 'required',
        ]);
        Testimonial::create([
            'name' => request('name'),
            'email' => request('email'),
            'image' => request('image') ? request()->file('image')->store('images/testimonial') : 'null',
            'testimoni' => request('testimoni'),
            'grade' => request('grade'),
            'status' => request('status'),
            'slug' => Str::slug(request('name')),
        ]);

        return back()->with('success', 'Testimoni Was Created');
    }

    public function edit(Testimonial $testimonial)
    {
        return view('back/testimonial/edit', [
            'testimonial' => $testimonial,
            'grades' => Grade::get(),
            'submit' => 'Update'
        ]);
    }

    public function update(Testimonial $testimonial)
    {
        request()->validate([
            'name' => 'required|unique:testimonials,name,' . $testimonial->id,
            'image' => request('image') ? 'image|mimes:jpg,jpeg,png,gif' : '',
            'testimoni' => 'required',
        ]);

        if (request('image')) {
            Storage::delete($testimonial->image);
            $image = request()->file('image')->store('images/testimonial');
        } elseif ($testimonial->image) {
            $image = $testimonial->image;
        } else {
            $image = null;
        }

        $testimonial->update([
            'name' => request('name'),
            'email' => request('email'),
            'image' => $image,
            'testimoni' => request('testimoni'),
            'grade' => request('grade'),
            'status' => request('status'),
            'slug' => Str::slug(request('name')),
        ]);

        return back()->with('success', 'testimonial Was Updated!');
    }
}
