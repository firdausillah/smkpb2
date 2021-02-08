<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\{Article, Grade};
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function __invoke(){
        return view('back/article/index', [
            'articles' => Article::get(),
            'grades' => Grade::get()
        ]);
    }

    public function detail(Article $article)
    {
        return view('back/article/detail', [
            'article' => $article,
            'grades' => Grade::get()
        ]);
    }

    public function create(){
        return view('back/article/create', [
            'article' => new Article,
            'grades' => Grade::get(),
            'submit' => 'Create'
        ]);
    }

    public function save()
    {
        request()->validate([
            'title' => 'required|unique:Articles',
            'image' => request('image') ? 'image|mimes:jpg,jpeg,png,gif' : '',
            'tags' => 'required',
            'description' => 'required',
        ]);
        Article::create([
            'title' => request('title'),
            'image' => request('image') ? request()->file('image')->store('images/articles') : 'null',
            'tags' => request('tags'),
            'writer' => request('writer'),
            'description' => request('description'),
            'grade' => request('grade'),
            'view' => request('view'),
            'slug' => Str::slug(request('title')),
        ]);

        return back()->with('success', 'Article Was Created');
    }

    public function edit(Article $article)
    {
        return view('back/article/edit', [
            'article' => $article,
            'grades' => Grade::get(),
            'submit' => 'Update'
        ]);
    }


    public function update(Article $article)
    {
        request()->validate([
            'title' => 'required|unique:articles,title,' . $article->id,
            'image' => request('image') ? 'image|mimes:jpeg,png,gif' : '',
            'tags' => 'required',
            'description' => 'required',
        ]);

        if (request('image')) {
            Storage::delete($article->image);
            $image = request()->file('image')->store('images/articles');
        } elseif ($article->image) {
            $image = $article->image;
        } else {
            $image = null;
        }

        $article->update([
            'title' => request('title'),
            'image' => $image,
            'tags' => request('tags'),
            'writer' => request('writer'),
            'description' => request('description'),
            'grade' => request('grade'),
            'view' => request('view'),
            'slug' => Str::slug(request('title')),
        ]);

        return redirect('admin/article')->with('success', 'Article Was Updated!');
    }

    public function destroy(Article $article)
    {
        Storage::delete($article->image);
        $article->delete();

        return back()->with('success', $article->title . ' Was Deleted!');
    }
}
