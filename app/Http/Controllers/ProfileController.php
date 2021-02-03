<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Profile;
use App\Models\Galery;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke()
    {
        $profile = Profile::first();
        if($profile == null){
            return view('back/profile/create', [
                'profile' => new Profile,
                'submit' => 'Create'
            ]);
        } else {
            return view('back/profile/edit', [
                'profile' => $profile,
                'submit' => 'Update'
            ]);
        }
    }

    public function save(){
        // dd(request());
        request()->validate([
            'name' => 'required',
            'logo' => request('logo') ? 'image|mimes:png' : '',
            'greeting' => 'required',
            'address' => 'required'
        ]);
        Profile::create([
            'name' => request('name'),
            'slug' => Str::slug(request('title')),
            'logo' => request('logo') ? request()->file('logo')->store('images/logo') : 'null',
            'greeting' => request('greeting'),
            'address' => request('address'),
            'contact1' => request('contact1'),
            'contact2' => request('contact2'),
            'email' => request('email'),
            'socialmedia1' => request('socialmedia1'),
            'socialmedia2' => request('socialmedia2'),
            'socialmedia3' => request('socialmedia3')
        ]);
        return back()->with('success', 'Profile was Created!');
    }

    public function update(){
        $profile = Profile::first();
        request()->validate([
            'name' => 'required',
            'logo' => request('logo') ? 'image|mimes:png' : '',
            'greeting' => 'required',
            'address' => 'required'
        ]);
        if (request('logo')) {
            Storage::delete($profile->logo);
            $logo = request()->file('logo')->store('image/logo');
        } elseif ($profile->logo) {
            $logo = $profile->logo;
        } else {
            $logo = null;
        }
        $profile->update([
            'name' => request('name'),
            'slug' => Str::slug(request('title')),
            'logo' => $logo,
            'greeting' => request('greeting'),
            'address' => request('address'),
            'contact1' => request('contact1'),
            'contact2' => request('contact2'),
            'email' => request('email'),
            'socialmedia1' => request('socialmedia1'),
            'socialmedia2' => request('socialmedia2'),
            'socialmedia3' => request('socialmedia3')
        ]);
        return back()->with('success', 'Profile was Updated!');
    }
}
