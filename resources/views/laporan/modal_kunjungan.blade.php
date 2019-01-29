<div class="modal fade" id="modal-laporan" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info" id="modal-header">
                <h4 class="modal-title" id="modal-title">Cetak Laporan</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" title="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            
            <form action="{{ route('print.kunjungan') }}">    
                <div class="modal-body" id="modal-body">
                        <div class="form-group row">
                            {!! Form::label('poli', 'Poli', ['class' => 'control-label col-sm-3 col-form-label']) !!}
                            <div class="col-sm-9">
                                {!! Form::select('poli', array('1'=>'Umum', '2'=>'Gigi', '3'=>'KIA - KB', '4'=>'Gizi', '5'=>'UGD', '6'=>'Lainnya'), null, ['class' => 'form-control select2 required', 'id'=>'id_poli', 'placeholder' => 'Pilih Poli...']); !!}
                            </div>
                        </div>

                        <div class="form-group row">
                            {!! Form::label('periode', 'Periode', ['class' => 'control-label col-sm-3 col-form-label']) !!}
                            <div class="col-sm-9">  
                                {!! Form::text('periode', null, ['class' => 'form-control', 'id'=>'periode', 'autocomplete'=>'off']) !!}    
                            </div>
                        </div>
                </div>
                
                <div class="modal-footer" id="modal-footer">
                    <div class="col-sm-6">
                        <button type="submit" class="btn btn-primary pull-right" id="modal-btn-print"><i class="fa fa-print"> Print</i></button>
                    </div>    
                </div>

            </form>

        </div>
    </div>
</div> 

