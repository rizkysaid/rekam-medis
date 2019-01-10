<div class="row">
	<div class="col-sm-5">
		<div class="card">
			<div class="card-header" style="line-height: 1">
				<p style="font-size: 14pt;"><strong>{{$pasien->nama}}</strong></p>
				<p style="font-size: 14pt;"><strong>{{$pasien->no_rm}}</strong></p>
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
	<div class="col-sm-7">
		<div >
			{!!
				Form::model($pasien, [
					'route' => 'pendaftaran.store',
					'method' => 'POST'
				])
			!!}
				<input type="hidden" name="id_pasien" value="{{ $pasien->id }}">
				<div class="form-group row col-sm-12">
					<label class="col-sm-3">Tanggal</label>
					<div class="col-sm-9 input-group">
						<input type="text" name="tgl_daftar" class="form-control" id="tgl_daftar" value="{{ date('d-m-Y', strtotime(now())) }}">
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
				<!-- <div class="form-group row col-sm-12">
					<label class="col-sm-3">No BPJS</label>
					<div class="col-sm-9">
						<input type="text" name="no_bpjs" class="form-control bpjs" value="{{ $pasien->no_bpjs }}">
					</div>
				</div> -->
			{!! Form::close() !!}
		</div>
	</div>
</div>