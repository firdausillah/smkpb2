<?php

namespace App\Http\Controllers\Admin;

use App\Models\Grade;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class GradeController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        return view('back/grade/index', [
            'grades' => Grade::get()
        ]);
    }

    public function create(){
        return view('back/grade/create', [
            'grades' => new Grade,
            'submit' => 'Create'
        ]);
    }

    public function save(){
        request()->validate([
            'title' => 'required|unique:grades',
            'image' => request('image') ? 'image|mimes:jpeg,png,gif' : '',
            'icon' => 'required',
            'description' => 'required',
            'materials' => 'required'
        ]);

        Grade::create([
            'title' => request('title'),
            'image' => request('image') ? request()->file('image')->store('images/grade') : 'null',
            'icon' => request('icon'),
            'description' => request('description'),
            'materials' => request('materials'),
            'slug' => Str::slug(request('title'))
        ]);

        return back()->with('success', 'Grade Was Created');
    }

    public function edit(Grade $grade){
        return view('back/grade/edit', [
            'grades' => $grade,
            'submit' => 'Update'
        ]);
    }

    public function update(Grade $grade){
        request()->validate([
            'title' => 'required|unique:grades,title,'. $grade->id,
            'image' => request('image') ? 'image|mimes:jpeg,png,gif' : '',
            'icon' => 'required',
            'description' => 'required',
            'materials' => 'required'
        ]);

        if (request('image')) {
            Storage::delete($grade->image);
            $image = request()->file('image')->store('images/grade');
        } elseif ($grade->image) {
            $image = $grade->image;
        } else {
            $image = null;
        }

        $grade->update([
            'title' => request('title'),
            'image' => $image,
            'icon' => request('icon'),
            'description' => request('description'),
            'materials' => request('materials'),
            'slug' => Str::slug(request('title'))
        ]);

        return back()->with('success', 'Grade Was Updated!');
    }
    public function destroy(Grade $grade){
        Storage::delete($grade->image);
        $grade->delete();

        return back()->with('success', $grade->title . ' Was Deleted!');
    }
    
    public function detail(Grade $grade){
        dd($grade);
    }
}
