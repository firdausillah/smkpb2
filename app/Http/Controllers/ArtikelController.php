<?php

namespace App\Http\Controllers;
use App\Models\{Article, Grade};
use Illuminate\Http\Request;

class ArtikelController extends Controller
{
    public function __invoke()
    {
        return view('front/article', [
            'articles' => Article::latest()->simplePaginate(5),
            'populararticle' => Article::orderByDesc('view')->take(5)->get(),
            'grades' => Grade::get(),
        ]);
    }

    public function detail(Article $article)
    {
        $view = $article->view;
        $article->update(['view' => $view + 1]);
        return view('front/detail_artikel', [
            'article' => $article,
            'populararticle' => Article::orderByDesc('view')->take(5)->get(),
            'grades' => Grade::get()
        ]);
    }

    public function find(Request $request)
    {
        $cari = $request->cari;
        $article = Article::where('tags', 'like', "%" . $cari . "%")
            ->orWhere('title', 'like', "%" . $cari . "%")
            ->orWhere('writer', 'like', "%" . $cari . "%")
            ->paginate(5);

        return view('front/article', [
            'articles' => $article,
            'populararticle' => Article::orderByDesc('view')->take(5)->get(),
            'grades' => Grade::get()
        ]);
    }
}
