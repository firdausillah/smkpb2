<?php

namespace App\Http\Controllers;
use App\Models\{Banner, Grade, News, Profile};

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __invoke()
    {
        return view('front/index', [
            'banners' => Banner::take(5)->get(),
            'grades' => Grade::get(),
            'profile' => Profile::first(),
            'news' => News::take(4)->get()
        ]);
    }
}
