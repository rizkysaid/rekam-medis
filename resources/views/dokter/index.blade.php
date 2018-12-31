@extends('layouts.master')

@section('title')
    <title>Manajemen Dokter</title>
@endsection

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Manajemen Dokter</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><i class="fa fa-home"></i><a href="./"> Home</a></li>
                            <li class="breadcrumb-item active">Dokter</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header with-border">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <h3 class="card-title">List Dokter</h3>
                                    </div>
                                    <div class="col-sm-6">
                                        <a href="{{ route('dokter.create') }}" class="btn btn-sm btn-success pull-right modal-show" title="Tambah dokter"><i class="fa fa-plus"></i> Tambah</a>
                                    </div>
                                        
                                </div>
                            </div>
                            <div class="card-body">

                                <table id="datatable" class="table table-hover table-striped" style="width:100%">
                                    <thead class="bg-success">
                                        <tr>
                                            <th>#</th>
                                            <th>Nama Dokter</th>
                                            <th class="text-center">L/P</th>
                                            <th class="text-center">Alamat</th>
                                            <th class="text-center">No. Telepon</th>
                                            <th class="text-center">Poli</th>
                                            <th class="text-center">Spesialis</th>
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

        $('#datatable').DataTable({
            language: {
                "sEmptyTable":   "Tidak ada data yang tersedia pada tabel ini",
                "sProcessing":   "Sedang memproses...",
                "sLengthMenu":   "Menampilkan _MENU_ entri",
                "sZeroRecords":  "Tidak ditemukan data yang sesuai",
                "sInfo":         "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
                "sInfoEmpty":    "Menampilkan 0 sampai 0 dari 0 entri",
                "sInfoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
                "sInfoPostFix":  "",
                "sSearch":       "Cari:",
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
            ajax: "{{ route('tabel.dokter') }}",
            columns: [
                {data: 'DT_RowIndex', name: 'id'},
                {data: 'nama', name: 'nama', width:'20%'},
                {data: 'gender', name: 'gender', width:'5%', searchable:false},
                {data: 'alamat', name: 'alamat', width:'30%'},
                {data: 'no_telp', name: 'no_telp'},
                {data: 'nama_poli', name: 'nama_poli', searchable:false},
                {data: 'nama_spesialis', name: 'nama_spesialis', searchable:false, width:'10%'},
                {data: 'action', name: 'action', searchable:false}
            ],
            columnDefs: [
                {
                    "targets" : [0],
                    "visible" : false,
                    "searchable" : false
                },
            ]
        });

    </script>

    <script src="{{ asset('js/app.js') }}"></script>
@endpush