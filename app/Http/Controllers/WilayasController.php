<?php

namespace App\Http\Controllers;

use App\enquetes;
use App\wilayas;
use App\wilayasRapport;
use Illuminate\Http\Request;

class WilayasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    function __construct()
    {
    $this->middleware('permission:Enquete Wilaya', ['only' => ['index']]);
    /*
    $this->middleware('permission:Ajouter Permission', ['only' => ['create','store']]);
    $this->middleware('permission:Modifier Permission', ['only' => ['edit','update']]);
    $this->middleware('permission:suprimer', ['only' => ['destroy']]);
    */
    }

    public function index()
    {
        $wilayas = wilayas::all();
        return view('enquetes.wilayas', compact('wilayas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        wilayas::create([
            'n_pension' => $request->n_pension,
            'nom' => $request->nom,
            'demande' => $request->demande,
            'reponse' => $request->reponse,
            'periode' => $request->periode,
            'emp' => $request->emp,
            'rapport' => $request->rapport,

        ]);
        if ($request->hasFile('pic')){

            $wilaya_id = wilayas::latest()->first()->id;
            $image = $request->file('pic');
            $file_name = $image->getClientOriginalName();
            $n_pension = $request->n_pension;

            $attachements = new wilayasRapport();
            $attachements->file_name = $file_name;
            $attachements->n_pension = $n_pension;
            $attachements->wilaya_id = $wilaya_id;
            $attachements->save();

            $imageName = $request->pic->getClientOriginalName();
            $request->pic->move(public_path('Attachements/'.$n_pension), $imageName);

        }
        session()->flash('Add', 'ajout reussé');
        return redirect('/wilayas');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\wilayas  $wilayas
     * @return \Illuminate\Http\Response
     */
    public function show(wilayas $wilayas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\wilayas  $wilayas
     * @return \Illuminate\Http\Response
     */
    public function edit(wilayas $wilayas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\wilayas  $wilayas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id = $request->id;
        $wilayas = wilayas::find($id);
        $wilayas->update([
            'n_pension' => $request->n_pension,
            'nom' => $request->nom,
            'demande' => $request->demande,
            'reponse' => $request->reponse,
            'periode' => $request->periode,
            'emp' => $request->emp,
            'rapport' => $request->rapport,
        ]);
        session()-> flash('edit','modification réussi');
        return redirect('/wilayas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\wilayas  $wilayas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
        wilayas::find($id)->delete();
        session()-> flash('delete','modification réussi');
        return redirect('/wilayas');
    }
}
