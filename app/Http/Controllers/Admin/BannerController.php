<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;

class BannerController extends Controller
{
    public function __invoke(){
        return view('back/banner/index', [
            'banners' => Banner::get()
        ]);
    }

    public function create(){
        return view('back/banner/create', [
            'banners' => New Banner,
            'submit' => 'Create'
        ]);
    }

    public function save(){
        request()->validate([
            'title' => 'required|unique:banners',
            'image' => request('image') ? 'image|mimes:jpg,jpeg,png,gif' : '',
            'link' => 'required',
            'description' => 'required',
        ]);

        Banner::create([
            'title' => request('title'),
            'image' => request('image') ? request()->file('image')->store('images/banner') : 'null',
            'link' => request('link'),
            'description' => request('description'),
            'slug' => Str::slug(request('title')),
        ]);

        return back()->with('success', 'Banner Was Created');
    }

    public function edit(Banner $banner){
        return view('back/banner/edit', [
            'banners' => $banner,
            'submit' => 'Update'
        ]);
    }

    public function update(Banner $banner){
        request()->validate([
            'title' => 'required|unique:banners,title,' . $banner->id,
            'image' => request('image') ? 'image|mimes:jpg,jpeg,png,gif' : '',
            'link' => 'required',
            'description' => 'required',
        ]);

        if (request('image')) {
            Storage::delete($banner->image);
            $image = request()->file('image')->store('images/banner');
        } elseif ($banner->image) {
            $image = $banner->image;
        } else {
            $image = null;
        }

        $banner->update([
            'title' => request('title'),
            'image' => $image,
            'link' => request('link'),
            'description' => request('description'),
            'slug' => Str::slug(request('title')),
        ]);

        return back()->with('success', 'Banner Was Updated');
    }

    public function destroy(Banner $banner){
        Storage::delete($banner->image);
        $banner->delete();

        return back()->with('success', $banner->title . ' Was Deleted!');
    }
}
