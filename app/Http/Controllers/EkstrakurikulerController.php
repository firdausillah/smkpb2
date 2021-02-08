<?php

namespace App\Http\Controllers;

use App\Models\{Extracurricular, News};
use Illuminate\Http\Request;

class EkstrakurikulerController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Extracurricular $ekstrakurikuler)
    {
        return view('front/ekstrakurikuler', [
            'extracurriculars' => Extracurricular::get(),
            'ekstrakurikuler' => $ekstrakurikuler
        ]);
    }

    public function detail(Extracurricular $extracurricular)
    {
        // dd($extracurricular->id);
        return view('front/ekstrakurikuler_detail', [
            'extracurricular' => $extracurricular,
            'news' => News::take(5)->get(),
        ]);
    }
}
