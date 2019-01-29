@extends('layouts.master')

@section('title')
    <title>Manajemen Pasien</title>
@endsection

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Dashboard</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><i class="fa fa-home"></i><a href="./"> Home</a></li>
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <section class="content">
            <div class="container-fluid">
                <!-- Info boxes -->
                <div class="row">

                    <div class="col-12 col-sm-6 col-md-3">
                        <a href="{{ route('dokter.index') }}" style="text-decoration: none">
                        <div class="info-box mb-3">
                            <span class="info-box-icon bg-success elevation-1"><i class="fa fa-user-md"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Dokter</span>
                                <span class="info-box-number">Jumlah : {{ $dokter_count }}</span>
                            </div><!-- /.info-box-content -->
                        </div><!-- /.info-box -->
                        </a>
                    </div><!-- /.col -->
                    
                    <div class="col-12 col-sm-6 col-md-3">
                        <a href="{{ route('pasien.index') }}" style="text-decoration: none">
                        <div class="info-box mb-3">
                            <span class="info-box-icon bg-success elevation-1"><i class="fa fa-wheelchair"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Pasien</span>
                                <span class="info-box-number">Jumlah : {{ $pasien_count }}</span>
                            </div><!-- /.info-box-content -->
                        </div><!-- /.info-box -->
                        </a>
                  </div><!-- /.col -->
                  
                  <div class="col-12 col-sm-6 col-md-3">
                        <a href="{{ route('pemeriksaan.index') }}" style="text-decoration: none">
                        <div class="info-box mb-3">
                            <span class="info-box-icon bg-success elevation-1"><i class="fa fa-users"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Pendaftaran</span>
                                <span class="info-box-number">Jumlah : {{ $kunjungan_count }}</span>
                            </div><!-- /.info-box-content -->
                        </div><!-- /.info-box -->
                        </a>
                  </div><!-- /.col -->

                </div><!-- /.row -->
            </div>
        </section>
    </div>
@endsection
