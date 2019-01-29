<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Poli;
use App\Kunjungan;
use Illuminate\Support\Facades\Input;
use DB;
use PDF;

class LaporanController extends Controller
{
    public function index(){
    	$poli = Poli::pluck('nama', 'id');
    	return view('laporan.index', compact('poli'));
    	//dd($poli);
    }

    public function kunjungan(){
    	return view('laporan.modal_kunjungan');
    }

    public function print_kunjungan(){

    	$poli = Input::get('poli');	


    	$periode = Input::get('periode');

    	$bln = substr($periode, 0,2);
    	$thn = substr($periode, 3);

    	$nama_poli = Poli::where('id', $poli)->first();
    	
    	switch($bln){
    		case("01"):
    		$nama_bulan = 'Januari';
    		break;
    		case("02"):
    		$nama_bulan = 'Februari';
    		break;
    		case("03"):
    		$nama_bulan = 'Maret';
    		break;
    		case("04"):
    		$nama_bulan = 'April';
    		break;
    		case("05"):
    		$nama_bulan = 'Mei';
    		break;
    		case("06"):
    		$nama_bulan = 'Juni';
    		break;
    		case("07"):
    		$nama_bulan = 'Juli';
    		break;
    		case("08"):
    		$nama_bulan = 'Agustus';
    		break;
    		case("09"):
    		$nama_bulan = 'September';
    		break;
    		case("10"):
    		$nama_bulan = 'Oktober';
    		break;
    		case("11"):
    		$nama_bulan = 'November';
    		break;
    		case("12"):
    		$nama_bulan = 'Desember';
    		break;
    	}

        $kunjungan = DB::table('kunjungan')
                   ->join('pasien', 'kunjungan.id_pasien', '=', 'pasien.id')
                   ->join('poli', 'kunjungan.id_poli', '=', 'poli.id')
                   ->join('pasien_tp', 'kunjungan.id_pasien_tp', '=', 'pasien_tp.id')
                   ->join('status_proses', 'kunjungan.id_status', '=', 'status_proses.id')
                   ->select('kunjungan.id',
                            'kunjungan.tgl_daftar as tgl', 
                            'pasien.nama as nama',
                            'pasien.no_rm',
                            'pasien.alamat as almt',
                            'poli.nama as poli',
                            'pasien_tp.nama as tipe')
                   ->orderby('kunjungan.tgl_daftar', 'ASC')
                   ->orderby('kunjungan.created_at', 'ASC')
                   ->where('kunjungan.id_poli', $poli)
                   ->whereMonth('kunjungan.tgl_daftar', $bln)
                   ->whereYear('kunjungan.tgl_daftar', $thn)
                   ->get();
      //$pdf = PDF::loadView('laporan.kunjungan', compact('kunjungan', 'nama_poli', 'nama_bulan', 'thn'))->setPaper('A4', 'landscape');
      //return $pdf->stream();
      //dd($kunjungan);

      return view('laporan.kunjungan', compact('kunjungan', 'nama_poli', 'nama_bulan', 'thn'));

      //dd($poli);
    }

}
