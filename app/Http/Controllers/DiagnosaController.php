<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;
use DB;
use App\Medical_rec;
use Illuminate\Support\Facades\URL;

class DiagnosaController extends Controller
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
        $this->validate($request, [
            'tgl_daftar' => 'required',
            'anamnesa' => 'string|required',
            'tinggi_badan' => 'required',
            'berat_badan' => 'required',
            'suhu_badan' => 'required',
            'tekanan_darah' => 'required',
            'diagnosa_1' => 'required',
            'icd_1' => 'required',
        ]);

        date_default_timezone_set('Asia/Jakarta');
        $tgl = $request->tgl_daftar;
        $tgl = implode("-", array_reverse(explode("/", $tgl)));

        $diagnosa = new Medical_rec;
        $diagnosa->tgl_periksa = $tgl;
        $diagnosa->id_kunjungan = $request->id_kunjungan;
        $diagnosa->anamnesa = ucfirst($request->anamnesa);
        $diagnosa->tinggi_badan = $request->tinggi_badan;
        $diagnosa->berat_badan = $request->berat_badan;
        $diagnosa->suhu_badan = $request->suhu_badan;
        $diagnosa->tekanan_darah = $request->tekanan_darah;
        $diagnosa->diagnosa_1 = $request->diagnosa_1;
        $diagnosa->icd_1 = $request->icd_1;
        $diagnosa->diagnosa_2 = $request->diagnosa_2;
        $diagnosa->icd_2 = $request->icd_2;
        $diagnosa->keterangan = $request->keterangan;
        $diagnosa->save();
        return $diagnosa;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pasien = DB::table('kunjungan as k')
                    ->leftjoin('pasien as p', 'k.id_pasien', '=', 'p.id')
                    ->leftjoin('poli as po', 'k.id_poli', '=', 'po.id')
                    ->leftjoin('pasien_tp as tipe', 'k.id_pasien_tp', '=', 'tipe.id')
                    ->leftjoin('gender as g', 'p.id_gender', '=', 'g.id')
                    ->leftjoin('pekerjaan as job', 'p.id_pekerjaan', '=', 'job.id')
                    ->leftjoin('pendidikan as edu', 'p.id_pendidikan', '=', 'edu.id')
                    ->select('k.id as id_kunjungan',
                             'p.id as id_pasien',
                             'k.tgl_daftar',
                             'p.no_rm as pasien_no_rm',
                             'p.nama as pasien_nm',
                             'g.detail_gender as jk',
                             'p.tgl_lahir as tgl_lahir',
                             'p.usia',
                             'p.alamat',
                             'p.no_telp',
                             'job.nama as job')
                    ->where('k.id', $id)->first();
        return view('pemeriksaan.diagnosa', compact('pasien'));
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

    public function tblDiagnosa($id){
        // $id = \Request::segment(2);
        $model = DB::table('medical_recs as mr')
                ->leftjoin('kunjungan as k', 'mr.id_kunjungan', '=', 'k.id')
                ->leftjoin('pasien as p', 'k.id_pasien', '=', 'p.id')
                ->select('mr.id',
                         'mr.id_kunjungan',
                         'mr.tgl_periksa',
                         'mr.diagnosa_1',
                         'mr.icd_1',
                         'mr.diagnosa_2',
                         'mr.icd_2',
                         'mr.created_at')
                ->where('mr.id_kunjungan', $id)
                ->orderby('created_at', 'DESC')->get();
        //dd($id);
        
        return Datatables::of($model)
        ->addColumn('action', function($model){
                return view('pemeriksaan.action_diagnosa', [
                    'model' => $model,
                    'url_show' => route('diagnosa.show', $model->id),
                    'url_edit' => route('diagnosa.edit', $model->id),
                    'url_destroy' => route('diagnosa.destroy', $model->id)
                ]);
            })
            ->addIndexColumn()
            ->rawColumns(['action'])
            ->make(true);

    }

}
