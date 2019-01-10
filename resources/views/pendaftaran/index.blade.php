@extends('layouts.master')

@section('title')
    <title>Pendaftaran</title>
@endsection

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Pendaftaran</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><i class="fa fa-home"></i><a href="./"> Home</a></li>
                            <li class="breadcrumb-item active">pendaftaran</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <section class="content">
            <div class="container-fluid">

                <!-- Pasien terdaftar -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header with-border">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h3 class="card-title">List Pasien Terdaftar</h3>
                                    </div>                                        
                                </div>
                            </div>
                            <div class="card-body">

                                <table id="datatable" class="table table-hover table-striped" style="width:100%">
                                    <thead class="bg-info">
                                        <tr>
                                            <th>#</th>
                                            <th>No RM</th>
                                            <th>Nama Pasien</th>
                                            <th>Poli</th>
                                            <th>Tanggal Daftar</th>
                                            <th>Tipe</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
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

        //list pasien terdaftar
        $('#datatable').DataTable({
            "info": false,
            "paging": true,
            language: {
                "sEmptyTable":   "Belum ada pasien yang terdaftar hari ini!",
                "sProcessing":   "Sedang memproses...",
                "sLengthMenu":   "Menampilkan _MENU_ entri",
                "sZeroRecords":  "Tidak ditemukan data yang sesuai",
                "sInfo":         "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
                "sInfoEmpty":    "Menampilkan 0 sampai 0 dari 0 entri",
                "sInfoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
                "sInfoPostFix":  "",
                "sSearch":       "Cari Pasien : ",
                "sUrl":          "",
                "oPaginate": {
                    "sFirst":    "Pertama",
                    "sPrevious": "Sebelumnya",
                    "sNext":     "Selanjutnya",
                    "sLast":     "Terakhir"
                }
            },

            responsive: true,
            processing: true,
            serverSide: true,
            ajax: "{{ route('tabel.pendaftaran') }}",
            columns: [
                {data: 'id', name: 'id'},
                {data: 'no_rm', name: 'no_rm'},
                {data: 'nama', name: 'nama'},
                {data: 'poli', name: 'poli'},
                {data: 'tgl_daftar', name: 'tgl_daftar'},
                {data: 'tipe', name: 'tipe'},
                {data: 'action', name: 'action', searchable:false}
            ],
            columnDefs: [
                {
                    //id
                    "targets" : [0],
                    "visible" : false,
                    "searchable" : false
                },
                {
                    //jk
                    "targets" : [3],
                    "searchable" : false,
                    "className" : 'dt-body-center'
                },
                {
                    //tgl_lahir
                    "targets" : [4],
                    render: $.fn.dataTable.render.moment('DD-MM-YYYY' )  
                }
            ]
        });

    </script>

    <script src="{{ asset('js/app.js') }}"></script>

@endpush