@extends('layouts.master')

@section('title')
    <title>Pendaftaran</title>
@endsection

@push('css')
    tfoot {
        display: table-header-group;
    }
@endpush

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

                                <table id="datatable" class="table table-hover table-striped display nowrap" style="width:100%">
                                    <thead class="bg-info">
                                        <tr>
                                            <th>#</th>
                                            <th>No RM</th>
                                            <th>Nama Pasien</th>
                                            <th>Poli</th>
                                            <th>Tanggal Daftar</th>
                                            <th>Jaminan</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tfoot>
                                        <tr>
                                            <th>#</th>
                                            <th>No RM</th>
                                            <th>Nama Pasien</th>
                                            <th>Poli</th>
                                            <th>Tanggal Daftar</th>
                                            <th>Jaminan</th>
                                        </tr>
                                    </tfoot>

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
                "sLengthMenu":   "Menampilkan _MENU_ pasien",
                "sZeroRecords":  "Tidak ditemukan data yang sesuai",
                "sInfo":         "Menampilkan _START_ sampai _END_ dari _TOTAL_ pasien",
                "sInfoEmpty":    "Menampilkan 0 sampai 0 dari 0 pasien",
                "sInfoFiltered": "(disaring dari _MAX_ pasien keseluruhan)",
                "sInfoPostFix":  "",
                "sSearch":       "Cari Pasien : ",
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
            ajax: "{{ route('tabel.pendaftaran') }}",
            columns: [
                {data: 'id', name: 'id'},
                {data: 'no_rm', name: 'pasien.no_rm'},
                {data: 'nama', name: 'pasien.nama'},
                {data: 'poli', name: 'poli.nama'},
                {data: 'tgl_daftar', name: 'tgl_daftar'},
                {data: 'tipe', name: 'pasien_tp.nama'},
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
                    "className" : 'dt-body-center'
                },
                {
                    //tgl_lahir
                    "targets" : [4],
                    render: $.fn.dataTable.render.moment('DD-MM-YYYY' )  
                }
            ]



        });

        $('#datatable tfoot th').each( function () {
        var title = $(this).text();
        if (title === "Tanggal Daftar") {
            $(this).html( '<input type="text" id="tgl_cari" placeholder="Cari '+title+'" class="form-control"/>' );
            }
            else {
                $(this).html( '<input type="text" placeholder="Cari '+title+'" class="form-control"/>' );
            }
        });
     
        // DataTable
        var table = $('#datatable').DataTable();
     
        // Apply the search
        table.columns().every( function () {
            var that = this;
     
            $( 'input', this.footer() ).on( 'keyup change', function () {
                if ( that.search() !== this.value ) {
                    that
                        .search( this.value )
                        .draw();
                }
            });
        });
     
    </script>

    <script src="{{ asset('js/app.js') }}"></script>

@endpush