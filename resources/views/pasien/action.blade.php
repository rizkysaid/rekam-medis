<div class="pull-right">
	<a href="{{ $url_daftar }}" class="btn btn-info modal-show daftar" title="Daftarkan {{$model->nama}}">Daftarkan</a>
	<div class="d-flex justify-content-center" style="margin: 2px">
		<div style="margin: 2px">
			<a href="{{ $url_edit }}" class="btn btn-success btn-sm modal-show edit" title="Edit {{ $model->nama }}"><i class="fa fa-edit"></i></a>
		</div>
		<div style="margin: 2px">
			<a href="{{ $url_destroy }}" class="btn btn-danger btn-sm btn-delete" title="{{ $model->nama }}"><i class="fa fa-trash"></i></a>
		</div>
	</div>
</div>
	
