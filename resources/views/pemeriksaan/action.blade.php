<div>
	<div class="d-flex justify-content-center" style="margin: 2px">
		<div style="margin: 2px">
			<a href="{{ $url_periksa }}" class="btn btn-sm btn-info periksa" title="Proses {{$model->nama}}"><i class="fa fa-stethoscope"></i></a>
		</div>
		<div style="margin: 2px">
			<a href="{{ $url_edit }}" class="btn btn-sm btn-success modal-show edit" title="Edit {{ $model->nama }}"><i class="fa fa-edit"></i></a>
		</div>
		<div style="margin: 2px">
			<a href="{{ $url_destroy }}" class="btn btn-sm btn-danger cancel" title="{{ $model->nama }}"><i class="fa fa-times"></i></a>
		</div>
	</div>
</div>