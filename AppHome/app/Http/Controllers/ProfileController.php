<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Validator;

class ProfileController extends Controller
{

    // public function __construct(){
    //     $this->middleware('auth')->except(['create','index']);
    //     $this->middleware('auth')->only(['show']);
    // }
    public function index(){
        $profiles = Profile::paginate(9);
        return view('profile.profiles', compact('profiles'));
    }
    public function show(Profile $profile){
        return view('profile.profile', compact('profile'));
    }

    public function create(){
        return view('profile.createProfile');
    }
    public function store(ProfileRequest $request){
        $formField = $request->validated();
        $formField['password'] = Hash::make($request->password); 
        $formField['image'] = $this->uploadImage($request, $formField);
        Profile::create($formField);
        return redirect()->route('profiles.index')->with('success', 'Votre compte a ete créé avec succès');
    }
    public function destroy(Profile $profile){
        // dd($profile);
        $profile->delete();
        return to_route('profiles.index')->with('success', 'Le profile a etes bien supprimer');
    }
    public function edit(Profile $profile){
        return view('profile.updateProfile', compact('profile'));
    }
    public function update(ProfileRequest $request, Profile $profile){
        $formField = $request->validated();
        $formField['password'] = Hash::make($request->password);
        $formField['image'] = $this->uploadImage($request, $formField);
        $profile->fill($formField)->save();
        return to_route('profiles.edit', $profile->id)->with('success', 'Le profile a etes bien modifie');
    }
    private function uploadImage(ProfileRequest $request, array &$formField){
        unset($formField['image']);
        if($request->hasFile('image')){
            return $request->file('image')->store('profile', 'public');
        }
    }
}