<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Teach;
use Illuminate\Support\Facades\Storage;

class TeachesController extends Controller
{

    public function __invoke()
    {
        return view('back/teach/index', [
            "teaches" => Teach::get()
        ]);
    }

    public function create(Teach $teach){
        return view('back/teach/create', [
            "teach" => new Teach,
            "submit" => 'Create'
        ]);
    }

    public function save(){
        request()->validate([
            'name' => 'required|unique:teaches',
            'image' => request('image') ? 'image|mimes:jpg,jpeg,png,gif' : '',
            'NIPY' => 'required'
        ]);

        Teach::Create([
            'name' => request('name'),
            'image' => request('image') ? request()->file('image')->store('images/teacher') : 'null',
            'NIPY' => request('NIPY'),
            'position' => request('position'),
            'slug' => Str::slug(request('name')),
        ]);

        return back()->with('success', 'Teach data was Created!');
    }

    public function edit(Teach $teach){
        return view('back/teach/edit', [
            'teach' => $teach,
            'submit' => 'Update'
        ]);
    }

    public function update(Teach $teach){
        request()->validate([
            'name' => 'required|unique:teaches,name,' . $teach->id,
            'image' => request('image') ? 'image|mimes:jpg,jpeg,png,gif' : '',
            'NIPY' => 'required'
        ]);

        if (request('image')) {
            Storage::delete($teach->image);
            $image = request()->file('image')->store('images/teacher');
        } elseif ($teach->image) {
            $image = $teach->image;
        } else {
            $image = null;
        }

        $teach->update([
            'name' => request('name'),
            'image' => $image,
            'NIPY' => request('NIPY'),
            'position' => request('position'),
            'slug' => Str::slug(request('name')),
        ]);

        return back()->with('success', 'Teach data was Updated!');
    }

    public function destroy(Teach $teach){
        $teach->delete();

        return back()->with('success', $teach->name . ' Was Deleted!');
    }
}
