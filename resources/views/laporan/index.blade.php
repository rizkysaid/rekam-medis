@extends('layouts.master')

@section('title')
    <title>Laporan</title>
@endsection

@push('css')
    <style type="text/css">
    #btns {
       border: 1px;
       height:200px;
       width:200px;
       cursor:pointer;
       margin: 20px;

    }

    .ui-datepicker-calendar {
        display: none;
    }

    </style>

    <link rel="stylesheet" href="{{ asset('plugins/jQueryUI/jquery-ui.css') }}">

@endpush

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Laporan</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><i class="fa fa-home"></i><a href="./"> Home</a></li>
                            <li class="breadcrumb-item active">Laporan</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <section class="content">
            <div class="container-fluid">
                <div class="col-12 col-sm-4" >
                    <a href="{{ route('laporan.kunjungan') }}" style="text-decoration: none" class="modal-laporan">
                        <div class="info-box">
                            <span class="info-box-icon bg-success"><i class="fa fa-stethoscope"></i></span>
                            <div class="info-box-content">
                                <h4 class="info-box-number">Kunjungan</h4>
                                <small class="info-box-text">Laporan Daftar Kunjungan Pasien</small>
                            </div><!-- /.info-box-content -->
                        </div><!-- /.info-box -->
                    </a>
                </div><!-- /.col -->
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('js/laporan.js') }}"></script>
    <script src="{{ asset('plugins/jQueryUI/jquery-ui.js') }}"></script>

@endpush