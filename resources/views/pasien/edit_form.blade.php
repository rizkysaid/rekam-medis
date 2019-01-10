{!! Form::model($model, [
        'route' => $model->exists ? ['pasien.update', $model->id] : 'pasien.store',
        'method' => $model->exists ? 'PUT' : 'POST'
    ]) 
!!}

<div class="row">
    <div class="col-md-6">
        <div class="form-group row">
            {!! Form::label('no_rm', 'No RM', ['class' => 'control-label col-sm-3 col-form-label']) !!}
            <div class="col-sm-9">
            {!! Form::number('no_rm', null, ['class' => 'form-control', 'id' => 'no_rm', 'readonly']) !!}
            </div>
        </div>
        <div class="form-group row">
            {!! Form::label('nama', 'Nama Pasien', ['class' => 'control-label col-sm-3 col-form-label']) !!}
            <div class="col-sm-9">
            {!! Form::text('nama', null, ['class' => 'form-control', 'id' => 'nama', 'autofocus'=>'autofocus']) !!}
            </div>
        </div>
        <div class="form-group row">
            {!! Form::label('jk', 'Jenis Kelamin', ['class' => 'control-label col-sm-3 col-form-label']) !!}
            <div class="col-sm-9">
                {!! Form::select('id_gender', $jk, null, ['class' => 'form-control select2 required', 'id'=>'id_gender', 'placeholder'=>'Pilih Jenis Kelamin..']); !!}
            </div>
        </div>
        <div class="form-group row">
            {!! Form::label('tgl_lahir', 'Tanggal Lahir', ['class' => 'control-label col-sm-3 col-form-label']) !!}
            <div class="col-sm-9">  
                {!! Form::text('tgl_lahir', date('d-m-Y', strtotime($model->tgl_lahir)), ['class' => 'form-control', 'id'=>'tgl_lahir', 'data-inputmask' => "'alias':'dd/mm/yyyy'", 'data-mask']) !!}    
            </div>
        </div>  
        <div class="form-group row">
            {!! Form::label('alamat', 'Alamat', ['class' => 'control-label col-sm-3 col-form-label']) !!}
            <div class="col-sm-9">
            {!! Form::textarea('alamat', null, ['class' => 'form-control', 'id' => 'alamat', 'cols' => '5', 'rows' => '3']) !!}
            </div>
        </div>
         <div class="form-group row">
                {!! Form::label('st_kawin', 'Status Kawin', ['class' => 'control-label col-sm-3 col-form-label']) !!}
                <div class="col-sm-9">
                    {!! Form::select('id_status_kawin', $st_kawin, null, ['class' => 'form-control select2 required', 'id'=>'id_status_kawin', 'placeholder'=>'Pilih Status..']); !!}                
                </div>
            </div>
    </div>
    <div class="col-md-6">
        <div class="form-group row">
            {!! Form::label('pekerjaan', 'Pekerjaan', ['class' => 'control-label col-sm-3 col-form-label']) !!}
            <div class="col-sm-9">
                {!! Form::select('id_pekerjaan', $pekerjaan, null, ['class' => 'form-control select2 required', 'id'=>'id_pekerjaan', 'placeholder'=>'Pilih Pekerjaan..']); !!}
            </div>
        </div>
        <div class="form-group row">
            {!! Form::label('pendidikan', 'Pendidikan', ['class' => 'control-label col-sm-3 col-form-label']) !!}
            <div class="col-sm-9">
                {!! Form::select('id_pendidikan', $pendidikan, null, ['class' => 'form-control select2 required', 'id'=>'id_pendidikan', 'placeholder'=>'Pilih Pendidikan..']); !!}
            </div>
        </div>
        
        <div class="form-group row">
            {!! Form::label('nm_wali', 'Nama Wali', ['class' => 'control-label col-sm-3 col-form-label']) !!}
            <div class="col-sm-9">
            {!! Form::text('nm_wali', null, ['class' => 'form-control', 'id' => 'nm_wali']) !!}
            </div>
        </div>
                
       
        <div class="form-group row">
            {!! Form::label('no_telp', 'No. telepon', ['class' => 'control-label col-sm-3 col-form-label']) !!}
            <div class="col-sm-9">
            {!! Form::number('no_telp', null, ['class' => 'form-control', 'id' => 'no_telp']) !!}
            </div>
        </div>
                
        <div class="form-group row">
            {!! Form::label('pasien_tp', 'Tipe Pasien', ['class' => 'control-label col-sm-3 col-form-label']) !!}
            <div class="col-sm-9">
                {!! Form::select('id_pasien_tp', $pasien_tp, null, ['class' => 'form-control select2 required', 'id'=>'id_pasien_tp', 'placeholder'=>'Pilih Tipe Pasien..']); !!}
            </div>
        </div>
                
        <div class="form-group row">
            {!! Form::label('bpjs', 'No. BPJS', ['class' => 'control-label col-sm-3 col-form-label']) !!}
            <div class="col-sm-9">
            {!! Form::number('no_bpjs', null, ['class' => 'form-control', 'id' => 'no_bpjs']) !!}
            </div>
        </div>
                
        <div class="form-group row">
            {!! Form::label('ktp', 'No. KTP', ['class' => 'control-label col-sm-3 col-form-label']) !!}
            <div class="col-sm-9">
            {!! Form::number('no_ktp', null, ['class' => 'form-control', 'id' => 'no_ktp']) !!}
            </div>
        </div>
    </div>      
</div>

{!! Form::close() !!}

