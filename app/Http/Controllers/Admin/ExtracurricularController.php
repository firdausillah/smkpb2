<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Extracurricular;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class ExtracurricularController extends Controller
{
    public function __invoke(Request $request)
    {
        return view('back/extracurricular/index', [
            'extracurriculars' => Extracurricular::get()
        ]);
    }

    public function create()
    {
        return view('back/extracurricular/create', [
            'extracurriculars' => new Extracurricular(),
            'submit' => 'Create'
        ]);
    }

    public function save()
    {
        request()->validate([
            'title' => 'required|unique:extracurriculars',
            'image' => request('image') ? 'image|mimes:jpeg,png,gif' : '',
            'icon' => 'required',
            'description' => 'required',
            'type' => 'required'
        ]);

        Extracurricular::create([
            'title' => request('title'),
            'image' => request('image') ? request()->file('image')->store('images/extracurricular') : 'null',
            'icon' => request('icon'),
            'description' => request('description'),
            'type' => request('type'),
            'slug' => Str::slug(request('title'))
        ]);

        return back()->with('success', 'Extracurricular Was Created');
    }

    public function edit(Extracurricular $extracurricular)
    {
        return view('back/extracurricular/edit', [
            'extracurriculars' => $extracurricular,
            'submit' => 'Update'
        ]);
    }

    public function update(Extracurricular $extracurricular)
    {
        request()->validate([
            'title' => 'required|unique:extracurriculars,title,' . $extracurricular->id,
            'image' => request('image') ? 'image|mimes:jpeg,png,gif' : '',
            'icon' => 'required',
            'description' => 'required',
            'type' => 'required'
        ]);

        if (request('image')) {
            Storage::delete($extracurricular->image);
            $image = request()->file('image')->store('images/extracurricular');
        } elseif ($extracurricular->image) {
            $image = $extracurricular->image;
        } else {
            $image = null;
        }

        $extracurricular->update([
            'title' => request('title'),
            'image' => $image,
            'icon' => request('icon'),
            'description' => request('description'),
            'type' => request('type'),
            'slug' => Str::slug(request('title'))
        ]);

        return redirect('admin/extracurricular')->with('success', 'extracurricular Was Updated!');
    }
    public function destroy(Extracurricular $extracurricular)
    {
        Storage::delete($extracurricular->image);
        $extracurricular->delete();

        return back()->with('success', $extracurricular->title . ' Was Deleted!');
    }

    public function detail(Extracurricular $extracurricular)
    {
        dd($extracurricular);
    }
}
