<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class DashboardController extends Controller
{
    public function index(){
    	$pasien_count = DB::table('pasien')->count();
    	$dokter_count = DB::table('dokter')->count();
    	$kunjungan_count = DB::table('kunjungan')->count();
    	return view('layouts.dashboard', compact('pasien_count', 'dokter_count', 'kunjungan_count'));

    }
}
