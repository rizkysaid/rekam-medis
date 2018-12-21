<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Pasien;
use App\Sex;
use App\Pekerjaan;
use App\Pendidikan;
use App\Status_kawin;
use App\Pasien_tp;
use DataTables;

class PasienController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pasien.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pasien = new Pasien();
        $latestnorm = DB::table('pasien')->max('no_rm');
        $sex = Sex::pluck('detail_sex', 'id');
        $pekerjaan = Pekerjaan::pluck('nama', 'id');
        $pendidikan = Pendidikan::pluck('nama', 'id');
        $st_kawin = Status_kawin::pluck('nama', 'id');
        $pasien_tp = Pasien_tp::pluck('nama', 'id');

        return view('pasien.form', compact('pasien', 'sex', 'latestnorm', 'pekerjaan', 'pendidikan', 'st_kawin', 'pasien_tp'));
        //dd($sex);
    }   

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validasi
        $this->validate($request, [
            'no_rm' => 'required|integer|max:8|unique:pasien,no_rm',
            'nama' => 'required|string|max:50',
            'sex' => 'reqired|integer',
            'tgl_lahir' => 'required',
            'alamat' => 'required|string|max:255',
            'nama_wali' => 'string|max:50',
            'tipe' => 'required|integer',
            'bpjs' => 'integer',
            'ktp' => 'integer'
        ]);

        //simpan ke database
        $pasien = Pasien::create($request->all());
        return $pasien;
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function dataTable(){
        $pasien = DB::table('pasien')
                     ->join('sex', 'pasien.id_sex', '=', 'sex.id')
                     ->select('pasien.id',
                              'pasien.no_rm', 
                              'pasien.nama', 
                              'sex.nama', 
                              'pasien.tgl_lahir', 
                              'pasien.usia', 
                              'pasien.alamat');

        return DataTables::of($pasien)
            ->addColumn('action', function($pasien){
                return view('layouts.module.action', [
                    'pasien' => $pasien,
                    'url_edit' => route('pasien.edit', $pasien->id),
                    'url_destroy' => route('pasien.destroy', $pasien->id)
                ]);
            })
            ->addIndexColumn()
            ->rawColumns(['action'])
            ->make(true);
    }

}
