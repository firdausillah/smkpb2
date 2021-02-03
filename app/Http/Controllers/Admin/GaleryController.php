<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\{Galery, Grade, Image};

class GaleryController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        // $image = image::find($ij);
        return view('back/galery/index', [
            'galery' => Galery::get(),
            'image' => Image::get()
        ]);
    }

    public function create(){
        return view('back/galery/create', [
            'galery' => new Galery,
            'grades' => Grade::get(),
            'images' => Image::where('galery', '=', 'tuyt')->get(),
            'submit' => 'Create'
        ]);
    }

    public function save(){
        dd(request());
        /* request()->validate([
            'title' => 'required|unique:galeries',
            'description' => 'required',
            // 'image' => 'image|mimes:jpg,jpeg,png,gif'
        ]); */
        // dd(request('image'));

        Galery::create([
            'title' => request('title'),
            'description' => request('description'),
            'grades' => request('grade'),
            'slug' => Str::slug(request('title'))
        ]);

        $gal = Galery::latest()->first();
        $images = request('image');
        foreach($images as $image){
            $filename = $image->store('images/galery');
            Image::create([
                'galery' => $gal->id,
                'image' => $filename
            ]);
        }

        return back()->with('success', 'Galery '.request('title').' Was Created');

    }

    public function edit(Galery $galery)
    {
        return view('back/galery/edit', [
            'galery' => $galery,
            'grades' => Grade::get(),
            'images' => Image::where('galery', '=', $galery->id)->get(),
            'submit' => 'Create'
        ]);
    }

}
