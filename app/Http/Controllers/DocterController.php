<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;
use DB;
use App\Dokter;
use App\Poli;
use App\Spesialis;
use App\Gender;

class DocterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dokter.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $model = new Dokter();
        $gender = Gender::pluck('detail_gender', 'id');
        $poli = Poli::pluck('nama', 'id');
        $spesialis = Spesialis::pluck('nama', 'id');
        return view('dokter.form', compact('model', 'gender', 'poli', 'spesialis'));
        //dd($model->exists);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required|string|max:30',
            'id_gender' => 'required',
            'id_poli' => 'required',
            'id_spesialis' => 'required'
        ]);

        date_default_timezone_set('Asia/Jakarta');
        $tgl = $request->tgl_lahir;
        $tgl = implode("-", array_reverse(explode("/", $tgl)));

        $usia = date_diff(date_create($tgl), date_create('now'))->y;
        
        $dokter = new Dokter;
            $dokter->nama = $request->nama;
            $dokter->id_gender = $request->id_gender;
            $dokter->alamat = $request->alamat;
            $dokter->tgl_lahir = $tgl;
            $dokter->usia = $usia;
            $dokter->no_telp = $request->no_telp;
            $dokter->id_poli = $request->id_poli;
            $dokter->id_spesialis = $request->id_spesialis;
            $dokter->save();
        
        return $dokter;

        //dd($tgl);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //$dokter = Dokter::findOrFail($id);
        $model = Dokter::with('poli', 'spesialis')->findOrFail($id);
        $gender = Gender::pluck('detail_gender', 'id');
        $poli = Poli::pluck('nama', 'id');
        $spesialis = Spesialis::pluck('nama', 'id');
        return view('dokter.edit_form', compact('model', 'gender', 'poli', 'spesialis'));
        //dd($model);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nama' => 'required|string|max:30',
            'id_gender' => 'required',
            'id_poli' => 'required',
            'id_spesialis' => 'required'
        ]);

        $tgl = $request->tgl_lahir;
        $tgl = implode("-", array_reverse(explode("/", $tgl)));

        $usia = date_diff(date_create($tgl), date_create('now'))->y;
        
        $dokter = new Dokter;
            $dokter->nama = $request->nama;
            $dokter->id_gender = $request->id_gender;
            $dokter->alamat = $request->alamat;
            $dokter->tgl_lahir = $tgl;
            $dokter->usia = $usia;
            $dokter->no_telp = $request->no_telp;
            $dokter->id_poli = $request->id_poli;
            $dokter->id_spesialis = $request->id_spesialis;
            $dokter->update();
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dokter = Dokter::findOrFail($id);
        $dokter->delete();
    }

    public function dataTable(){
        $model = DB::table('dokter')
                    ->join('gender', 'dokter.id_gender', '=', 'gender.id')
                    ->join('poli', 'dokter.id_poli', '=', 'poli.id')
                    ->join('spesialis', 'dokter.id_spesialis', '=', 'spesialis.id')
                    ->select('dokter.id', 
                             'dokter.nama',
                             'gender.nama as gender', 
                             'dokter.alamat', 
                             'dokter.no_telp', 
                             'poli.nama as nama_poli', 
                             'spesialis.nama as nama_spesialis')
                    ->orderby('dokter.created_at', 'DESC');

        return DataTables::of($model)
            ->addColumn('action', function($model){
                return view('layouts.module.action', [
                    'model' => $model,
                    'url_edit' => route('dokter.edit', $model->id),
                    'url_destroy' => route('dokter.destroy', $model->id)
                ]);
            })
            ->addIndexColumn()
            ->rawColumns(['action'])
            ->make(true);

            //dd($model);

    }
}
