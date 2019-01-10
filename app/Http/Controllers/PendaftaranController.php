<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;
use DB;
use App\Pasien;
use App\Poli;
use App\Pasien_tp;
use App\Kunjungan;
use \Carbon\Carbon;

class PendaftaranController extends Controller
{
    public function index(){
    	return view('pendaftaran.index');
    }
    
    public function tblPendaftaran(){
      //list daftar
      $model = DB::table('kunjungan')
                   ->join('pasien', 'kunjungan.id_pasien', '=', 'pasien.id')
                   ->join('poli', 'kunjungan.id_poli', '=', 'poli.id')
                   ->join('pasien_tp', 'kunjungan.id_pasien_tp', '=', 'pasien_tp.id')
                   ->join('status_proses', 'kunjungan.id_status', '=', 'status_proses.id')
                   ->select('kunjungan.id',
                            'kunjungan.tgl_daftar', 
                            'pasien.nama as nama',
                            'pasien.no_rm',
                            'poli.nama as poli',
                            'pasien_tp.nama as tipe',
                            'status_proses.nama as status')
                   ->orderby('kunjungan.tgl_daftar', 'DESC');

      return DataTables::of($model)
          ->addColumn('action', function($model){
                return view('pendaftaran.action', [
                    'model' => $model,
                    'url_periksa' => route('pemeriksaan.show', $model->id),
                    'url_edit' => route('pendaftaran.edit', $model->id),
                    'url_destroy' => route('pendaftaran.destroy', $model->id)
              ]);
          })
          ->addIndexColumn()
          ->rawColumns(['action'])
          ->make(true);
    }

    public function show($id){

      $poli = Poli::pluck('nama', 'id');
      $pasien_tp = Pasien_tp::pluck('nama', 'id');

      $pasien = DB::table('pasien')
                   ->join('gender', 'pasien.id_gender', '=', 'gender.id')
                   ->select('pasien.id',
                            'pasien.no_rm', 
                            'pasien.nama', 
                            'gender.detail_gender as jk', 
                            'pasien.tgl_lahir', 
                            'pasien.usia',
                            'pasien.no_telp', 
                            'pasien.alamat',
                            'pasien.no_bpjs')
                   ->where('pasien.id', $id)->first();
      return view('pendaftaran.show', compact('pasien', 'poli', 'pasien_tp'));
      //dd($pasien);
    }

    public function store(Request $request){
      $this->validate($request, [
        'tgl_daftar' => 'required',
        'id_poli' => 'required',
        'id_pasien_tp' => 'required'
      ]);
      
      $kunjungan = new Kunjungan;
      $kunjungan->tgl_daftar = implode("-", array_reverse(explode("/", $request->tgl_daftar)));
      $kunjungan->id_pasien = $request->id_pasien;
      $kunjungan->id_poli = $request->id_poli;
      $kunjungan->id_pasien_tp = $request->id_pasien_tp;
      $kunjungan->id_status = 2;
      $kunjungan->save();

      return $kunjungan;
    }

    public function update(Request $request, $id){
      $this->validate($request, [
        'tgl_daftar' => 'required',
        'id_poli' => 'required',
        'id_pasien_tp' => 'required'
      ]);
      
      $kunjungan = Kunjungan::findOrFail($id);
      $kunjungan->tgl_daftar = implode("-", array_reverse(explode("/", $request->tgl_daftar)));
      $kunjungan->id_poli = $request->id_poli;
      $kunjungan->id_pasien_tp = $request->id_pasien_tp;
      $kunjungan->update();
    }

    public function edit($id){

      $model = Kunjungan::with('poli', 'pasien_tp')->findOrFail($id);
      $poli = Poli::pluck('nama', 'id');
      $pasien_tp = Pasien_tp::pluck('nama', 'id');

      return view('pendaftaran.edit_form', compact('model', 'poli', 'pasien_tp'));
      //dd($model);

    }

    public function destroy($id){
        $kunjungan = Kunjungan::findOrFail($id);
        $kunjungan->delete();
    }

}
