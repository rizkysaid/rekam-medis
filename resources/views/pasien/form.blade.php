{!! Form::model( [
        'route' => 'pasien.store',
        'method' => 'POST'
    ]) 
!!}

<div class="row">
    <div class="col-md-6">
        <div class="form-group row">
            {!! Form::label('no_rm', 'No RM', ['class' => 'control-label col-sm-4 col-form-label']) !!}
            <div class="col-sm-8">
            <?php $new_rm = $latestnorm+1 ?>
            {!! Form::number('no_rm', $new_rm, ['class' => 'form-control', 'id' => 'no_rm', 'disabled']) !!}
            </div>
            <p class="text-danger">{{ $errors->first('code') }}</p>
        </div>
        <div class="form-group row">
            {!! Form::label('nama', 'Nama Pasien', ['class' => 'control-label col-sm-4 col-form-label']) !!}
            <div class="col-sm-8">
            {!! Form::text('nama', null, ['class' => 'form-control', 'id' => 'nama', 'required']) !!}
            </div>
            <p class="text-danger">{{ $errors->first('nama') }}</p>
        </div>
        <div class="form-group row">
            {!! Form::label('sex', 'Jenis Kelamin', ['class' => 'control-label col-sm-4 col-form-label']) !!}
            <div class="col-sm-8">
                {!! Form::select('sex', $sex, null, ['class' => 'form-control select2']); !!}
            </div>
        </div>
        <div class="form-group row">
            {!! Form::label('tgl_lahir', 'Tanggal Lahir', ['class' => 'control-label col-sm-4 col-form-label']) !!}
            <div class="col-sm-8">  
                {!! Form::text('tgl_lahir', null, ['class' => 'form-control input-group datepicker', 'data-provide' => 'datepicker']) !!}
                <div class="input-group-addon">
                    <span class="glyphicon glyphicon-th"></span>
                </div>
            </div>
            <p class="text-danger">{{ $errors->first('date') }}</p>
        </div>  
        <div class="form-group row">
            {!! Form::label('alamat', 'Alamat', ['class' => 'control-label col-sm-4 col-form-label']) !!}
            <div class="col-sm-8">
            {!! Form::textarea('description', null, ['class' => 'form-control', 'id' => 'description', 'cols' => '5', 'rows' => '3']) !!}
            </div>
            <p class="text-danger">{{ $errors->first('alamat') }}</p>
        </div>
         <div class="form-group row">
                {!! Form::label('st_kawin', 'Status Kawin', ['class' => 'control-label col-sm-4 col-form-label']) !!}
                <div class="col-sm-8">
                    {!! Form::select('st_kawin', $st_kawin, null, ['class' => 'form-control select2']); !!}                
                </div>
            </div>

    </div>
    <div class="col-md-6">
        <div class="form-group row">
            {!! Form::label('pekerjaan', 'Pekerjaan', ['class' => 'control-label col-sm-4 col-form-label']) !!}
            <div class="col-sm-8">
                {!! Form::select('pekerjaan', $pekerjaan, null, ['class' => 'form-control select2']); !!}
            </div>
        </div>
        <div class="form-group row">
            {!! Form::label('pendidikan', 'Pendidikan', ['class' => 'control-label col-sm-4 col-form-label']) !!}
            <div class="col-sm-8">
                {!! Form::select('pendidikan', $pendidikan, null, ['class' => 'form-control select2']); !!}
            </div>
        </div>
        
        <div class="form-group row">
            {!! Form::label('wali', 'Nama Wali', ['class' => 'control-label col-sm-4 col-form-label']) !!}
            <div class="col-sm-8">
            {!! Form::text('wali', null, ['class' => 'form-control', 'id' => 'wali']) !!}
            </div>
            <p class="text-danger">{{ $errors->first('wali') }}</p>
        </div>
                
       
        <div class="form-group row">
            {!! Form::label('telp', 'No. telepon', ['class' => 'control-label col-sm-4 col-form-label']) !!}
            <div class="col-sm-8">
            {!! Form::number('telp', null, ['class' => 'form-control', 'id' => 'telp']) !!}
            </div>
            <p class="text-danger">{{ $errors->first('telp') }}</p>
        </div>
                
        <div class="form-group row">
            {!! Form::label('pasien_tp', 'Tipe Pasien', ['class' => 'control-label col-sm-4 col-form-label']) !!}
            <div class="col-sm-8">
                {!! Form::select('pasien_tp', $pasien_tp, null, ['class' => 'form-control select2']); !!}
            </div>
        </div>
                
        <div class="form-group row">
            {!! Form::label('bpjs', 'No. BPJS', ['class' => 'control-label col-sm-4 col-form-label']) !!}
            <div class="col-sm-8">
            {!! Form::number('bpjs', null, ['class' => 'form-control', 'id' => 'bpjs']) !!}
            </div>
        </div>
                
        <div class="form-group row">
            {!! Form::label('ktp', 'No. KTP', ['class' => 'control-label col-sm-4 col-form-label']) !!}
            <div class="col-sm-8">
            {!! Form::number('ktp', null, ['class' => 'form-control', 'id' => 'ktp']) !!}
            </div>
        </div>
    </div>      
</div>
        

{!! Form::close() !!}
