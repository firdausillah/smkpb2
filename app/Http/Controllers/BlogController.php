<?php

namespace App\Http\Controllers;
use App\Models\{News, Grade};

use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function __invoke()
    {
        return view('front/blog', [
            'news' => News::latest()->simplePaginate(5),
            'popularpost' => News::orderByDesc('view')->take(5)->get(),
            'grades' => Grade::get(),
        ]);
    }

    public function detail(News $news){
        $view = $news->view;
        $news->update(['view' => $view + 1 ]);
        return view('front/detail_blog', [
            'news' => $news,
            'popularpost' => News::orderByDesc('view')->take(5)->get(),
            'grades' => Grade::get()
        ]);
    }

    public function find(Request $request){
        $cari = $request->cari;
        $news = News::where('tags', 'like', "%" . $cari . "%")
            ->orWhere('title', 'like', "%" . $cari . "%")
            ->orWhere('writer', 'like', "%" . $cari . "%")
            ->paginate(5);

        return view('front/blog', [
            'news' => $news,
            'grades' => Grade::get()
        ]);
    }
}
