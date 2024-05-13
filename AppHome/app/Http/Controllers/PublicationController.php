<?php

namespace App\Http\Controllers;

use App\Models\Publication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\PublicationRequest;

class PublicationController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function __construct(){
        $this->middleware('auth')->except('index');
    }
    
    public function index()
    {
        $publications = Publication::latest()->paginate();
        return view('publication.publications', compact('publications'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('publication.createPublication');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PublicationRequest $request)
    {
        $formField = $request->validated();
        $formField['image']= $this->uploadImage($request,$formField);
        $formField['profile_id']= Auth::id();
        Publication::create($formField);
        return to_route('publications.index')->with('success', 'Votre publication a ete ajouter avec succès');
    }
    
    private function uploadImage(PublicationRequest $request, array &$formField){
        unset($formField['image']);
        if($request->hasFile('image')){
            return $request->file('image')->store('publication', 'public');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Publication $publication)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Publication $publication, Request $request)
    {
        // autorisation et permission (makankhdmox bhad tari9a 7it khask db9a d3awda omaxi pratique)
        // if(Auth::id() !== $publication->profile_id){
        //     abort(403);
        // }

        //methode pro  
        // Gate::authorize('update-publication',$publication);
        // Gate::authorize('update',$publication);
        // $this->authorize('update', $publication);
        if($request->user()->can('update', $publication)){
            abort(403);
        }

        return view('publication.updatePublication', compact('publication'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PublicationRequest $request, Publication $publication)
    {
        Gate::authorize('update-publication',$publication);
        $formField = $request->validated();
        $image=$this->uploadImage($request, $formField);
        $formField['image'] = $image;
        $publication->fill($formField)->save();
        return to_route('publications.index', $publication->id)->with('success', 'La publication a etes bien modifie');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Publication $publication)
    {
        $publication->delete();
        return to_route('publications.index')->with('success', 'La publication a etes supprimer');
    }
}
