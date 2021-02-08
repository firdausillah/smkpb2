<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\{Galery, Grade, Image};
use App\file;

class ImageController extends Controller
{
    public function __invoke()
    {
        return view('back/image/index', [
            'images' => Image::get(),
            'galeries' => Galery::get(),
            'grades' => Grade::get()
        ]);
    }

    public function create(){
        return view('back/image/create', [
            'images' => New Image,
            'galeries' => Galery::get(),
            'submit' => 'Create'
        ]);
    }

    public function save(Request $request){

        request()->validate([
            'galery' => 'required',
            'image' => 'required|array'
        ]);

        $image = request()->file('image');
        dd($image->getClientOriginalName());

        foreach($request as $req){
            echo $req->image;
        }
        end();
        Image::create([
            'galery' => request('galery'),
            'image' => request('image') ? request()->file('image')->store('images/galery') : 'null'
        ]);

        return back()->with('success', 'News Was Created');
    }
}
