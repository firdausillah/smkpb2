<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\{News, Grade};
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function __invoke(){
        return view('back/news/index', [
            'news'=> News::get(),
            'grade'=> Grade::get()
        ]);
    }

    public function detail(News $news){
        return view('back/news/detail', [
            'news' => $news,
            'grade' => Grade::get()
        ]);
    }

    public function create(){
        return view('back/news/create', [
            'news' => new News,
            'grades' => Grade::get(),
            'submit' => 'Create'
        ]);
    }

    public function save(){
        request()->validate( [
            'title' => 'required|unique:news',
            'image' => request('image') ? 'image|mimes:jpg,jpeg,png,gif' :'',
            'tags' => 'required',
            'description' => 'required',
        ]);
        News::create([
            'title' => request('title'),
            'image' => request('image') ? request()->file('image')->store('images/news') : 'null',
            'tags' => request('tags'),
            'writer' => request('writer'),
            'description' => request('description'),
            'grade' => request('grade'),
            'view' => request('view'),
            'slug' => Str::slug(request('title')),
        ]);

        return back()->with('success', 'News Was Created');
    }

    public function edit(News $news){
        return view('back/news/edit',[
            'news' => $news,
            'grades' => Grade::get(),
            'submit' => 'Update'
        ]);
    }

    public function update(News $news)
    {
        request()->validate([
            'title' => 'required|unique:news,title,'. $news->id,
            'image' => request('image') ? 'image|mimes:jpeg,png,gif' : '',
            'tags' => 'required',
            'description' => 'required',
        ]);

        if(request('image')) {
            Storage::delete($news->image);
            $image = request()->file('image')->store('images/news');
        } elseif($news->image) {
            $image = $news->image;
        } else{
            $image = null;
        }

        $news->update([
            'title' => request('title'),
            'image' => $image,
            'tags' => request('tags'),
            'writer' => request('writer'),
            'description' => request('description'),
            'grade' => request('grade'),
            'view' => request('view'),
            'slug' => Str::slug(request('title')),
        ]);

        return back()->with('success', 'News Was Updated!');
    }

    public function destroy(News $news){
        Storage::delete($news->image);
        $news->delete();

        return back()->with('success', $news->title.' Was Deleted!');
    }
}
