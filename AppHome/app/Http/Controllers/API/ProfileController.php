<?php

namespace App\Http\Controllers\API;

use App\Http\Resources\ProfileResource;
use App\Models\Profile;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // methode 1
        // $profile = Profile::All();
        // return response()->json($profile);

        // methode 2
        // return Profile::All();

        // methode 3
        // return Profile::Paginate(5);

        return ProfileResource::collection(Profile::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $formFields = $request->all();
        $formFields['password'] = Hash::make($request->password);
        $profile = Profile::create($formFields);
        return new ProfileResource($profile) ;
    }

    /**
     * Display the specified resource.
     */
    public function show(Profile $profile)
    {
        return new ProfileResource($profile);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Profile $profile)
    {
        $formFields = $request->all();
        $formFields['password'] = Hash::make($request->password);
        $profile->fill($formFields)->save();
        return new ProfileResource($profile);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Profile $profile)
    {
        $profile->delete();
        return response()->json([
            'message' => 'Le profile est bien supprime',
            'id' => $profile->id,
            'errors' => []
        ]);
    }
}
