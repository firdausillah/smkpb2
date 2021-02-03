<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Teach;

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
            'NIPY' => 'required'
        ]);

        Teach::Create([
            'name' => request('name'),
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
            'NIPY' => 'required'
        ]);

        $teach->update([
            'name' => request('name'),
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
