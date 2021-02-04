<?php

namespace App\Http\Controllers;
use App\Models\{Teach};

use Illuminate\Http\Request;

class TeachController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        return view('front/teach', [
            'teach' => Teach::get()
        ]);
    }
}
