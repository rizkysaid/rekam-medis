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
                        <h1 class="m-0 text-dark">Manajemen Pasien</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><i class="fa fa-home"></i><a href="./"> Home</a></li>
                            <li class="breadcrumb-item active">pasien</li>
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
                                        <h3 class="card-title">List pasien</h3>
                                    </div>
                                    <div class="col-sm-6">
                                        <a href="{{ route('pasien.create') }}" class="btn btn-sm btn-info pull-right modal-show" title="Tambah pasien"><i class="fa fa-plus"></i> Tambah</a>
                                    </div>
                                        
                                </div>
                            </div>
                            <div class="card-body">

                                <table id="datatable" class="table table-hover table-striped" style="width:100%">
                                    <thead class="bg-info">
                                        <tr>
                                            <th>#</th>
                                            <th>No RM</th>
                                            <th>Nama Lengkap</th>
                                            <th>L/P</th>
                                            <th class="text-center">TTL</th>
                                            <th>Usia</th>
                                            <th class="text-center">Alamat</th>
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
            ajax: "{{ route('tabel.pasien') }}",
            columns: [
                {data: 'id', name: 'id'},
                {data: 'no_rm', name: 'no_rm', width: '10%'},
                {data: 'nama', name: 'nama', width: '20%'},
                {data: 'jk', name: 'jk', width:'5%'},
                {data: 'tgl_lahir', name: 'tgl_lahir', width: '15%'},
                {data: 'usia', name: 'usia', width:'5%'},
                {data: 'alamat', name: 'alamat'},
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
                    //jk
                    "targets" : [3],
                    "searchable" : false,
                    "className" : 'dt-body-center'
                },
                {
                    //tgl_lahir
                    "targets" : [4],
                    render: $.fn.dataTable.render.moment('DD-MM-YYYY' )  
                },
                {
                    //alamat
                    "targets" : [6],
                    "width"   : '40%'
                }
            ]
        });

        var table = $('#datatable').DataTable();

        $('#datatable tbody').on('dblclick', 'tr', function(){
            selectedIndex = table.row(this).data()[0];
            alert(selectedIndex);
        });


    </script>

    <script src="{{ asset('js/app.js') }}"></script>

@endpush