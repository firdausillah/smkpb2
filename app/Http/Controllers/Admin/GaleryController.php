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
    public function __invoke()
    {
        return view('back/galery/index', [
            'galery' => Galery::get(),
            'grade' => Grade::get()
        ]);
    }

    public function create(){
        return view('back/galery/create', [
            'galery' => new Galery,
            'grades' => Grade::get(),
            'submit' => 'Create'
        ]);
    }

    public function save(){
        request()->validate([
            'title' => 'required|unique:galeries',
            'description' => 'required'
        ]); 

        Galery::create([
            'title' => request('title'),
            'description' => request('description'),
            'grades' => request('grade'),
            'slug' => Str::slug(request('title'))
        ]);

        return back()->with('success', 'Galery '.request('title').' Was Created');

    }

    public function edit(Galery $galery)
    {
        return view('back/galery/edit', [
            'galery' => $galery,
            'grades' => Grade::get(),
            'images' => Image::where('galery', '=', $galery->id)->get(),
            'submit' => 'Update'
        ]);
    }

    public function update(Galery $galery){
        request()->validate([
            'title' => 'required|unique:galeries,title,' . $galery->id,
            'description' => 'required'
        ]);

        $galery->update([
            'title' => request('title'),
            'description' => request('description'),
            'grades' => request('grade'),
            'slug' => Str::slug(request('title'))
        ]);

        return back()->with('success', 'Galery ' . request('title') . ' Was Updated');
    }

    public function destroy(Galery $galery)
    {
        $galery->delete();

        return back()->with('success', $galery->title . ' Was Deleted!');
    }
}
