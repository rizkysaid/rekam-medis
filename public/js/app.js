
/*Tombol tambah*/
$('body').on('click', '.modal-show', function(event){
    event.preventDefault();

    //menentukan elemen yang diklik
    //menyimpan isi attribut href & title
    //dari elemen yang diklik
    var me = $(this),
        url = me.attr('href'),
        title = me.attr('title');

    //menerapkan isi attribut title pada elemen id=modal-title 
    $('#modal-title').text(title);
    //mengubah tulisan pada button id=modal-btn-save
    //menjadi tulisan Create
    $('#modal-btn-save').text(me.hasClass('edit') ? 'Update' : 'Tambah');

    $.ajax({
        url: url,
        dataType: 'html',
        success: function (response) {
            //menerapkan response (tag form)
            //pada id=modal-body
            $('#modal-body').html(response);
        }
    });
    //tampilkan modal
    $('#modal').modal('show');
});


/*Tombol simpan*/
$('#modal-btn-save').click(function (event) {
    event.preventDefault();

    var form = $('#modal-body form');
    	url = form.attr('action');
    	method = $('input[name=_method]').val() == undefined ? 'POST' : 'PUT';

    form.find('.invalid-feedback').remove();
    form.find('.form-control').removeClass('is-invalid');

    $.ajax({
    	url: url,
    	method: method,
    	data: form.serialize(),
    	success: function(response){
    		form.trigger('reset');
    		$('#modal').modal('hide');
    		$('#datatable').DataTable().ajax.reload();

	    	swal({
	    		icon: 'success',
	    		title: 'Success!',
	    		text: 'Data berhasil disimpan!'
	    	});
    	},
    	error: function(xhr){
    		var res = xhr.responseJSON;
    		if($.isEmptyObject(res) == false){
    			$.each(res.errors, function(key, value){
    				$('#' + key).addClass('is-invalid')
    				.closest('.col-sm-9').append('<span class="invalid-feedback"> ' + value + ' </span>');
    			});
    		}

    	}
    })
});

$('body').on('click', '.btn-delete', function(event){
	event.preventDefault();

	var me = $(this),
		url = me.attr('href');
		title = me.attr('title');
		csrf_token = $('meta[name="csrf-token"]').attr('content');

	swal({
		title: 'Apakah anda ingin menghapus ' + title + ' ?',
		text: 'Anda tidak bisa mengembalikannya lagi!',
		icon: 'warning',
		buttons: {
		  cancel: {
		  	text: "Cancel",
		  	value: false,
		  	visible: true
		  },
		  confirm: {
		    text: "Ya, Hapus data ini!",
		    value: true,
		    visible: true,
		    className: "",
		    closeModal: true
		  }
		},
	}).then((result) => {
        if(result){
            $.ajax({
                url: url,
                type: 'POST',
                data: {
                    '_method': 'DELETE',
                    '_token': csrf_token
                },
                success: function(response){
                    $('#datatable').DataTable().ajax.reload();
                    swal({
                        icon: 'success',
                        title: 'Success!',
                        text: 'Data berhasil dihapus!'
                    });
                },
                error: function(xhr){
                    swal({
                        icon: 'error',
                        title: 'Whoops.. Terjadi kesalahan!',
                        text: 'Data tidak terhapus!'
                    });
                }
            });
        }
    });
});