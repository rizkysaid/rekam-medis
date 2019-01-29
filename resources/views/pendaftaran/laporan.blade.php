<html>
<head>
    <title>Laporan Kunjungan Pasien</title>
    <link rel="stylesheet" href="{{ asset('plugins/bootstrap/css/bootstrap.css') }}">
    <style type="text/css">
      body{
        font-size: 9pt;
      }
      #ket{
        margin-top: 10px;
        margin-bottom: 10px;
      }
    </style>
</head>
<body>
<div class="panel panel default">
   <div class="panel-heading">
        <h3 align="center">Laporan Kunjungan Pasien</h3>
  </div>
  <div class="panel-body">

    <div class="row" id="ket">
      <div class="col-md-12">
          <table>
            <tbody>
              <tr>
                <td width="70px">Poli</td>
                <td width="10px">:</td>
                <td>Nama Poli</td>
              </tr>
              <tr>
                <td>Bulan</td>
                <td>:</td>
                <td>Tanggal Berapa</td>
              </tr>
            </tbody>
          </table>
      </div>
    </div>

    <table class="table">
      <thead>
         <tr>
           <th>No</th>
           <th>Tanggal</th>
           <th>No RM</th> 
           <th>Nama Pasien</th>
           <th>Alamat</th>
           <th>Poli</th>
           <th>Tipe Pasien</th>
        </tr>
      </thead>
      <tbody>
        <?php $no = 1; ?>
        @foreach ($pendaftaran as $data)
        <tr>
          <td>{{ $no++ }}</td>
          <td>{{ date('d M Y', strtotime($data->tgl)) }}</td>
          <td>{{ $data->no_rm }}</td> 
          <td>{{ $data->nama }}</td> 
          <td>{{ $data->almt }}</td>
          <td>{{ $data->poli }}</td>
          <td>{{ $data->tipe }}</td> 
        </tr> 
        @endforeach
        </tbody>
    </table>
   
  </div>
</div>
</body>
</html>