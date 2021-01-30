<?php

namespace App\Http\Controllers;
use App\enquetes_rapport;
use App\enquetes;
use Illuminate\Support\Facades\Storage;
use File;
use Illuminate\Http\Request;

class EnquetesRapportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\enquetes_rapport  $enquetes_rapport
     * @return \Illuminate\Http\Response
     */
    public function show(enquetes_rapport $enquetes_rapport)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\enquetes_rapport  $enquetes_rapport
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $attachments = enquetes_rapport::where('enquete_id',$id)->get();
        //return view('enquetes_rapport_enquete', compact('attachments'));
        return view('enquetes.enquetesRapport', compact('attachments'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\enquetes_rapport  $enquetes_rapport
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, enquetes_rapport $enquetes_rapport)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\enquetes_rapport  $enquetes_rapport
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //
    }

         public function get_file($n_pension,$file_name)
    {
        $contents= Storage::disk('public_uploads')->getDriver()->getAdapter()->applyPathPrefix($n_pension.'/'.$file_name);
        return response()->download( $contents);
    }

        public function open_file($n_pension,$file_name)

    {
        $files = Storage::disk('public_uploads')->getDriver()->getAdapter()->applyPathPrefix($n_pension.'/'.$file_name);
        return response()->file($files);
    }

}
