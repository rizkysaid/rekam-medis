<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;
use DB;
use App\Pasien;
use App\Gender;
use App\Pekerjaan;
use App\Pendidikan;
use App\Status_kawin;
use App\Pasien_tp;
use Carbon\Carbon;

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
        $model = new Pasien();
        $latestnorm = DB::table('pasien')->max('no_rm');
        $jk = Gender::pluck('detail_gender', 'id');
        $pekerjaan = Pekerjaan::pluck('nama', 'id');
        $pendidikan = Pendidikan::pluck('nama', 'id');
        $st_kawin = Status_kawin::pluck('nama', 'id');
        $pasien_tp = Pasien_tp::pluck('nama', 'id');

        return view('pasien.form', compact('model', 'jk', 'latestnorm', 'pekerjaan', 'pendidikan', 'st_kawin', 'pasien_tp'));
        //dd($gender);
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
            /*'no_rm' => 'required|unique:pasien,no_rm',*/
            'nama' => 'required|string|max:30',
            'id_gender' => 'required',
            'id_status_kawin' => 'required',
            'id_pekerjaan' => 'required',
            'id_pendidikan' => 'required',
            'id_pasien_tp' => 'required'
        ]);

        date_default_timezone_set('Asia/Jakarta');
        $tgl = $request->tgl_lahir;
        $tgl = implode("-", array_reverse(explode("/", $tgl)));
        $usia = date_diff(date_create($tgl), date_create('now'))->y;
        
        $pasien = new pasien;
            $pasien->no_rm = $request->no_rm;
            $pasien->nama = ucwords($request->nama);
            $pasien->id_gender = $request->id_gender;
            $pasien->tgl_lahir = $tgl;
            $pasien->usia = $usia;
            $pasien->alamat = ucwords($request->alamat);
            $pasien->no_telp = $request->no_telp;
            $pasien->id_pekerjaan = $request->id_pekerjaan;
            $pasien->id_pendidikan = $request->id_pendidikan;
            $pasien->id_status_kawin = $request->id_status_kawin;
            $pasien->id_gol_darah = '5'; //lain-lain(belum di-set)
            $pasien->id_pasien_tp = $request->id_pasien_tp;
            $pasien->nm_wali = ucwords($request->nm_wali);
            $pasien->no_ktp = $request->no_ktp;
            $pasien->no_bpjs = $request->no_bpjs;
            $pasien->save();
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
        $model = Pasien::with('gender', 'pekerjaan', 'pendidikan', 'status_kawin', 'pasien_tp')->findOrFail($id);

        $jk = Gender::pluck('detail_gender', 'id');
        $pekerjaan = Pekerjaan::pluck('nama', 'id');
        $pendidikan = Pendidikan::pluck('nama', 'id');
        $st_kawin = Status_kawin::pluck('nama', 'id');
        $pasien_tp = Pasien_tp::pluck('nama', 'id');

        return view('pasien.edit_form', compact('model', 'jk', 'pekerjaan', 'pendidikan', 'st_kawin', 'pasien_tp'));
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
        //validasi
        $this->validate($request, [
            /*'no_rm' => 'required|unique:pasien,no_rm',*/
            'nama' => 'required|string|max:30',
            'id_gender' => 'required',
            'id_status_kawin' => 'required',
            'id_pekerjaan' => 'required',
            'id_pendidikan' => 'required',
            'id_pasien_tp' => 'required'
        ]);

        date_default_timezone_set('Asia/Jakarta');
        $tgl = $request->tgl_lahir;
        $tgl = implode("-", array_reverse(explode("/", $tgl)));
        $usia = date_diff(date_create($tgl), date_create('now'))->y;
        
        $pasien = Pasien::findOrFail($id);
            $pasien->no_rm = $request->no_rm;
            $pasien->nama = ucwords($request->nama);
            $pasien->id_gender = $request->id_gender;
            $pasien->tgl_lahir = $tgl;
            $pasien->usia = $usia;
            $pasien->alamat = ucwords($request->alamat);
            $pasien->no_telp = $request->no_telp;
            $pasien->id_pekerjaan = $request->id_pekerjaan;
            $pasien->id_pendidikan = $request->id_pendidikan;
            $pasien->id_status_kawin = $request->id_status_kawin;
            $pasien->id_gol_darah = '5'; //lain-lain(belum di-set)
            $pasien->id_pasien_tp = $request->id_pasien_tp;
            $pasien->nm_wali = ucwords($request->nm_wali);
            $pasien->no_ktp = $request->no_ktp;
            $pasien->no_bpjs = $request->no_bpjs;
        $pasien->update();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pasien = Pasien::findOrFail($id);
        $pasien->delete();
    }

    public function dataTable(){
        $model = DB::table('pasien')
                     ->join('gender', 'pasien.id_gender', '=', 'gender.id')
                     ->select('pasien.id',
                              'pasien.no_rm', 
                              'pasien.nama', 
                              'gender.nama as jk', 
                              'pasien.tgl_lahir', 
                              'pasien.usia', 
                              'pasien.alamat')
                     ->orderby('pasien.created_at', 'DESC');

        return DataTables::of($model)
            ->addColumn('action', function($model){
                return view('pasien.action', [
                    'model' => $model,
                    'url_daftar' => route('pendaftaran.show', $model->id),
                    'url_edit' => route('pasien.edit', $model->id),
                    'url_destroy' => route('pasien.destroy', $model->id)
                ]);
            })
            ->addIndexColumn()
            ->rawColumns(['action'])
            ->make(true);
    }

}
