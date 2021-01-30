<?php

namespace App\Http\Controllers;

use App\enquetes;
use App\enquetes_rapport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class EnquetesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   $enquetes = enquetes::all();
        return view('enquetes.enquetes',compact('enquetes'));
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
        enquetes::create([
            'n_pension' => $request->n_pension,
            'nom' => $request->nom,
            'demande' => $request->demande,
            'reponse' => $request->reponse,
            'periode' => $request->periode,
            'emp' => $request->emp,
            'obs' => $request->obs,

        ]);

        if ($request->hasFile('pic')){

            $enquete_id = enquetes::latest()->first()->id;
            $image = $request->file('pic');
            $file_name = $image->getClientOriginalName();
            $n_pension = $request->n_pension;

            $attachements = new enquetes_rapport();
            $attachements->file_name = $file_name;
            $attachements->n_pension = $n_pension;
            $attachements->enquete_id = $enquete_id;
            $attachements->save();

            $imageName = $request->pic->getClientOriginalName();
            $request->pic->move(public_path('Attachements/'.$n_pension), $imageName);

        }

        session()->flash('Add', 'ajout reussé');
        return redirect('/enquetes');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\enquetes  $enquetes
     * @return \Illuminate\Http\Response
     */
    public function show(enquetes $enquetes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\enquetes  $enquetes
     * @return \Illuminate\Http\Response
     */
    public function edit(enquetes $enquetes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\enquetes  $enquetes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id = $request->id;
        $enquetes = enquetes::find($id);
        $enquetes->update([
            'n_pension'=> $request->n_pension,
            'nom'=> $request->nom,
            'demande'=> $request->demande,
            'reponse'=> $request->reponse,
            'periode'=> $request->periode,
            'emp'=> $request->emp,
            'obs'=> $request->obs,
        ]);
        session()-> flash('edit','modification réussi');
        return redirect('/enquetes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\enquetes  $enquetes
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
        enquetes::find($id)->delete();
        session()->flash('delete', 'la supprision reussite');
        return redirect('/enquetes');
    }
}
