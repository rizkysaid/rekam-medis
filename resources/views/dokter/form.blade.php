{!!
	Form::model($model, [
		'route' => $model->exists ? ['dokter.update', $model->id] : 'dokter.store',
		'method' => $model->exists ? 'PUT' : 'POST'
	])
!!}	
	<div class="form-group row">
        {!! Form::label('nama', 'Nama Dokter', ['class' => 'control-label col-sm-3 col-form-label']) !!}
        <div class="col-sm-9">
        {!! Form::text('nama', null, ['class' => 'form-control', 'id' => 'nama']) !!}
        </div>
    </div>

    <div class="form-group row">
        {!! Form::label('alamat', 'Alamat', ['class' => 'control-label col-sm-3 col-form-label']) !!}
        <div class="col-sm-9">
        {!! Form::text('alamat', null, ['class' => 'form-control', 'id' => 'alamat']) !!}
        </div>
    </div>

    <div class="form-group row">
        {!! Form::label('no_telp', 'No. Telepon', ['class' => 'control-label col-sm-3 col-form-label']) !!}
        <div class="col-sm-9">
        {!! Form::text('no_telp', null, ['class' => 'form-control', 'id' => 'no_telp']) !!}
        </div>
    </div>

    <div class="form-group row">
        {!! Form::label('poli', 'Poli', ['class' => 'control-label col-sm-3 col-form-label']) !!}
        <div class="col-sm-9">
            {!! Form::select('id_poli', $poli, null, ['class' => 'form-control select2', 'id'=>'id_poli', 'placeholder' => 'Pilih Poli...']); !!}
        </div>
    </div>

    <div class="form-group row">
        {!! Form::label('spesialis', 'Spesialis', ['class' => 'control-label col-sm-3 col-form-label']) !!}
        <div class="col-sm-9">
            {!! Form::select('id_spesialis', $spesialis, null, ['class' => 'form-control select2', 'id'=>'id_spesialis', 'placeholder' => 'Pilih Spesialisasi...']); !!}
        </div>
    </div>

{!! Form::close() !!}