<?php

namespace App\Http\Controllers;
use App\wilayas;
use App\wilayasRapport;
use Illuminate\Support\Facades\Storage;
use File;
use Illuminate\Http\Request;

class WilayasRapportController extends Controller
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
     * @param  \App\wilayasRapport  $wilayasRapport
     * @return \Illuminate\Http\Response
     */
    public function show(wilayasRapport $wilayasRapport)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\wilayasRapport  $wilayasRapport
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $attachments = wilayasRapport::where('wilaya_id',$id)->get();
        return view('enquetes.wilayasRapport', compact('attachments'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\wilayasRapport  $wilayasRapport
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, wilayasRapport $wilayasRapport)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\wilayasRapport  $wilayasRapport
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {

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
