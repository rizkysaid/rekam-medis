{!!
    Form::model($model, [
        'route' => ['pendaftaran.update', $model->id],
        'method' => 'PUT'
    ])
!!}
    <div class="form-group row col-sm-12">
        <label class="col-sm-3">Tanggal</label>
        <div class="col-sm-9 input-group">
            <input type="text" name="tgl_daftar" class="form-control" id="tgl_daftar" value="{{ date('d-m-Y', strtotime($model->tgl_daftar)) }}">
            <div class="input-group-append">
              <span class="input-group-text fa fa-calendar"></span>
            </div>
        </div>
    </div>
    <div class="form-group row col-sm-12">
        <label class="col-sm-3">Poli</label>
        <div class="col-sm-9">
            {!! Form::select('id_poli', $poli, null, ['class' => 'form-control required', 'id'=>'id_poli', 'placeholder' => 'Pilih Poli...', 'autofocus'=>'true']); !!}
        </div>
    </div>
    <div class="form-group row col-sm-12">
        <label class="col-sm-3">BPJS/Umum</label>
        <div class="col-sm-9">
            {!! Form::select('id_pasien_tp', $pasien_tp, null, ['class' => 'form-control bpjs', 'id'=>'id_pasien_tp', 'placeholder' => 'Pilih tipe...', 'autofocus'=>'true']); !!}
        </div>
    </div>
{!! Form::close() !!}