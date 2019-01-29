@extends('layouts.master')

@section('title')
    <title>Pemeriksaan</title>
@endsection

@push('css')
    <style type="text/css">
        tfoot {
            display: table-header-group;
        }
    </style>
@endpush

@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Pemeriksaan</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><i class="fa fa-home"></i><a href="./"> Home</a></li>
                        <li class="breadcrumb-item active">Pemeriksaan</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header with-border">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h3 class="card-title">Pemeriksaan Pasien</h3>
                                    </div>                                        
                                </div>
                            </div>
                        <div class="card-body">
                          
                            <nav>
                              <ul class="nav nav-tabs justify-content-end" id="nav-tab" role="tablist">
                                <li>
                                   <a class="nav-item nav-link" id="nav-pasien-tab" data-toggle="tab" href="#nav-pasien" role="tab" aria-controls="nav-pasien" aria-selected="true">Pasien</a> 
                                </li>
                                <li class="active">
                                    <a class="nav-item nav-link active" id="nav-diagnosa-tab" data-toggle="tab" href="#" role="tab" aria-controls="nav-diagnosa" aria-selected="true">Diagnosa</a>
                                </li>
                                <li>
                                    <a class="nav-item nav-link" id="nav-tindakan-tab" data-toggle="tab" href="#nav-tindakan" role="tab" aria-controls="nav-tindakan" aria-selected="false">Tindakan</a>
                                </li>
                                <li> 
                                    <a class="nav-item nav-link" id="nav-obat-tab" data-toggle="tab" href="#nav-obat" role="tab" aria-controls="nav-obat" aria-selected="false">Obat</a>
                                </li>
                              </ul>
                            </nav>


                        <div class="tab-content" id="nav-tabContent">
                            <!-- tab pasien -->
                            <div class="tab-pane fade" id="nav-pasien" role="tabpanel" aria-labelledby="nav-pasien-tab">
                                <div class="row">
                                    <div class="col-sm-12" style="margin-top: 10px">
                                        <div class="card">
                                            <div class="card-header" style="line-height: 1">
                                                <p style="font-size: 14pt;"><strong>{{$pasien->pasien_nm}}</strong></p>
                                                <p style="font-size: 14pt;"><strong>{{$pasien->pasien_no_rm}}</strong></p>
                                            </div>
                                            <div class="card-body" style="line-height: 1">
                                                <p>
                                                    <table>
                                                    <tr>
                                                        <td width="20px">
                                                            @if($pasien->jk == 'Perempuan')
                                                                <span class="fa fa-venus"></span>
                                                                @else
                                                                <span class="fa fa-mars"></span>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            <small>{{$pasien->jk}}, {{$pasien->usia}} tahun</small>
                                                        </td>
                                                    </tr>
                                                    </table>
                                                </p>
                                                <p>
                                                    <table>
                                                        <tr>
                                                            <td width="20px">
                                                                <span class="fa fa-calendar"></span>
                                                            </td>
                                                            <td>
                                                                <small>{{ date('d-M-Y', strtotime($pasien->tgl_lahir)) }}</small>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </p>
                                                <p>
                                                    <table>
                                                        <tr>
                                                            <td width="20px">
                                                                <span class="fa fa-map-marker"></span>
                                                            </td>
                                                            <td>
                                                                <small>{{$pasien->alamat}}</small>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </p>
                                                <p>
                                                    <table>
                                                        <tr>
                                                            <td width="20px">
                                                                <span class="fa fa-phone-square"></span>
                                                            </td>
                                                            <td>
                                                                <small>{{$pasien->no_telp}}</small>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- pasien -->

                        <!-- tab diagnosa -->
                        <div class="tab-pane fade show active" id="nav-diagnosa" role="tabpanel" aria-labelledby="nav-diagnosa-tab">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="card" style="margin-top: 10px">
                                        <div class="card-body" id="form-diagnosa">
                                            {!! Form::model($pasien, [
                                                    'route' => 'diagnosa.store',
                                                    'method' => 'POST'
                                                ]) 
                                            !!}
                                                <input type="hidden" name="id_kunjungan" value="{{ $pasien->id_kunjungan }}">
                                                <input type="hidden" id="url"  value="{{ Request::url() }}">
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="form-group"> 
                                                            <h6>Tanggal</h6>
                                                            <div class="input-group">
                                                                <input type="text" name="tgl_daftar" class="form-control" id="tgl_daftar" value="{{ date('d-m-Y', strtotime(Carbon::now())) }}">
                                                                <div class="input-group-append">
                                                                  <span class="input-group-text fa fa-calendar"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="form-group">
                                                            <h6>Anamnesa</h6>
                                                            <textarea class="form-control form-control-sm" id="anamnesa" name="anamnesa" rows="2" autofocus></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group col-sm-3">
                                                      <!-- <label for="tb">Tinggi Badan</label> -->
                                                        <h6>Tinggi Badan</h6>
                                                        <div class="input-group input-group-sm mb-3">
                                                          <input type="number" name="tinggi_badan" id="tinggi_badan" class="form-control" aria-describedby="basic-addon">
                                                          <div class="input-group-append">
                                                            <span class="input-group-text" id="basic-addon">cm</span>
                                                          </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                      <h6>Berat Badan</h6>
                                                        <div class="input-group input-group-sm mb-3">
                                                          <input type="number" name="berat_badan" id="berat_badan" class="form-control" aria-describedby="basic-addon">
                                                          <div class="input-group-append">
                                                            <span class="input-group-text" id="basic-addon">kg</span>
                                                          </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                      <h6>Suhu Badan</h6>
                                                      <div class="input-group input-group-sm mb-3">
                                                          <input type="number" name="suhu_badan" id="suhu_badan" class="form-control" aria-describedby="basic-addon">
                                                          <div class="input-group-append">
                                                            <span class="input-group-text" id="basic-addon">&#8451;</span>
                                                          </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                      <h6>Tekanan darah</h6>
                                                      <input name="tekanan_darah" class="form-control form-control-sm" type="text" id="tekanan_darah">
                                                    </div>  
                                                </div>
                                                <div class="row">
                                                    <div class="form-group col-sm-9">
                                                        <h6>Diagnosa Utama</h6>
                                                        <input type="text" name="diagnosa_1" class="form-control form-control-sm" id="diagnosa_1">
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                      <h6>ICD</h6>
                                                      <input name="icd_1" class="form-control form-control-sm" type="text" id="icd_1">
                                                    </div>  
                                                </div>
                                                <div class="row">
                                                    <div class="form-group col-sm-9">
                                                        <h6>Diagnosa Kedua</h6>
                                                        <input type="text" name="diagnosa2" class="form-control form-control-sm" id="diagnosa_2">
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                      <h6>ICD</h6>
                                                      <input name="icd_2" class="form-control form-control-sm" type="text" id="icd2">
                                                    </div>  
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="form-group">
                                                            <textarea class="form-control form-control-sm" name="keterangan" rows="2" placeholder="Keterangan..."></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <button type="button" class="btn btn-primary pull-right submit" id="btn-save-diagnosa"><i class="fa fa-save"> Simpan</i></button>
                                                    </div>
                                                </div>
                                            {!! Form::close() !!}
                                        </div>
                                    </div>
                                </div> 
                            </div><!-- row -->

                            <div class="row">
                                <div class="col-md-12">
                                        <div class="card">
                                            <!-- <div class="card-header with-border">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <h3 class="card-title">List Pasien Terdaftar</h3>
                                                    </div>                                        
                                                </div>
                                            </div> -->
                                            <div class="card-body">
                                                <h6><i class="fa fa-calendar"></i> Riwayat Diagnosa</h6>
                                                <table id="tabel_diagnosa" class="table table-hover table-striped display nowrap" style="width:100%">
                                                    <thead class="bg-info">
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Tanggal</th>
                                                            <th>Diagnosa Utama</th>
                                                            <th>Diagnosa Kedua</th>
                                                            <th>Proses</th>
                                                        </tr>
                                                    </thead>

                                                    <tfoot>
                                                        <tr>
                                                            
                                                        </tr>
                                                    </tfoot>

                                                    <tbody>

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>   
                                     </div>
                            </div>

                          </div><!-- diagnosa -->

                          <!-- tab tindakan -->
                          <div class="tab-pane fade" id="nav-tindakan" role="tabpanel" aria-labelledby="nav-tindakan-tab">Ini tindakan
                          
                          </div><!-- tindakan -->
                          
                          <!-- tab obat -->
                          <div class="tab-pane fade" id="nav-obat" role="tabpanel" aria-labelledby="nav-obat-tab">Ini obat

                          </div><!-- obat -->
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection

@push('scripts')
    
    <script>
        var my_url = $('#url').val() +'/get';

        $('#tabel_diagnosa').DataTable({
            searching: false,
            language: {
                "sEmptyTable":   "Tidak ada data yang tersedia pada tabel ini",
                "sProcessing":   "Sedang memproses...",
                "sLengthMenu":   "Menampilkan _MENU_ entri",
                "sZeroRecords":  "Tidak ditemukan data yang sesuai",
                "sInfo":         "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
                "sInfoEmpty":    "Menampilkan 0 sampai 0 dari 0 entri",
                "sInfoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
                "sInfoPostFix":  "",
                "sSearch":       "Cari : ",
                "sUrl":          "",
                "oPaginate": {
                    sNext: '<i class="fa fa-forward"></i>',
                    sPrevious: '<i class="fa fa-backward"></i>',
                    sFirst: '<i class="fa fa-step-backward"></i>',
                    sLast: '<i class="fa fa-step-forward"></i>'
                }
            },

            responsive: true,
            processing: true,
            serverSide: true,
            ajax: my_url,
            columns: [
                {data: 'id', name: 'id'},
                {data: 'tgl_periksa', name: 'tgl_periksa'},
                {data: 'diagnosa_1', name: 'diagnosa_1'},
                {data: 'diagnosa_2', name: 'diagnosa_2'},
                {data: 'action', name: 'action'}
            ],
            columnDefs: [
                {
                    //id
                    "targets" : [0],
                    "visible" : false,
                    "searchable" : false
                },
                {
                    //tgl_lahir
                    "targets" : [1],
                    render: $.fn.dataTable.render.moment('DD-MM-YYYY' )  
                },
                {
                    //jk
                    "targets" : [4],
                    "searchable" : false,
                    "className" : 'dt-body-center'
                }
            ]
        });

    </script>

    <script src="{{ asset('js/app.js') }}"></script>

@endpush
