/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 0);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/assets/js/app.js":
/*!************************************!*\
  !*** ./resources/assets/js/app.js ***!
  \************************************/
/*! no static exports found */
/***/ (function(module, exports) {

//focus kolom cari pada datatable
var table = $('#myTable').DataTable();
$('div.dataTables_filter input', table.table().container()).focus();
/*Tombol tambah*/

$('body').on('click', '.modal-show', function (event) {
  event.preventDefault(); //menentukan elemen yang diklik
  //menyimpan isi attribut href & title
  //dari elemen yang diklik

  var me = $(this),
      url = me.attr('href'),
      title = me.attr('title'); //menerapkan isi attribut title pada elemen id=modal-title 

  $('#modal-title').text(title); //mengubah tulisan pada button id=modal-btn-save
  //menjadi tulisan Create
  //$('#modal-btn-save').text(me.hasClass('edit') ? 'Update' : 'Tambah');

  if (me.hasClass('edit')) {
    $('#modal-btn-save').text('Update');
  } else if (me.hasClass('daftar')) {
    $('#modal-btn-save').text('Daftarkan');
  } else if (me.hasClass('periksa')) {
    $('#modal-btn-save').text('Selesai');
  } else {
    $('#modal-btn-save').text('Tambah');
  }

  $.ajax({
    url: url,
    dataType: 'html',
    success: function success(response) {
      //menerapkan response (tag form)
      //pada id=modal-body
      $('#modal-body').html(response);
    }
  }); //tampilkan modal

  $('#modal').modal('show');
});
/*Tombol simpan*/

$('#modal-btn-save').click(function (event) {
  var me = $(this);

  if (me.text() == "Selesai") {
    event.preventDefault();
    $('#modal').modal('hide');
  } else {
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
      success: function success(response) {
        form.trigger('reset');
        $('#modal').modal('hide');
        $('#datatable').DataTable().ajax.reload();
        swal({
          icon: 'success',
          title: 'Success!',
          text: 'Data berhasil disimpan!'
        }).then(function () {
          location.reload();
        });
      },
      error: function error(xhr) {
        var res = xhr.responseJSON;

        if ($.isEmptyObject(res) == false) {
          $.each(res.errors, function (key, value) {
            $('#' + key).addClass('is-invalid').closest('.col-sm-9').append('<span class="invalid-feedback"> ' + value + ' </span>');
          });
        }
      }
    });
  }
}); //hapus

$('body').on('click', '.btn-delete', function (event) {
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
    }
  }).then(function (result) {
    if (result) {
      $.ajax({
        url: url,
        type: 'POST',
        data: {
          '_method': 'DELETE',
          '_token': csrf_token
        },
        success: function success(response) {
          $('#datatable').DataTable().ajax.reload();
          swal({
            icon: 'success',
            title: 'Success!',
            text: 'Data berhasil dihapus!'
          });
        },
        error: function error(xhr) {
          swal({
            icon: 'error',
            title: 'Whoops.. Terjadi kesalahan!',
            text: 'Data tidak terhapus!'
          });
        }
      });
    }
  });
}); //cancel

$('body').on('click', '.cancel', function (event) {
  event.preventDefault();
  var me = $(this),
      url = me.attr('href');
  title = me.attr('title');
  csrf_token = $('meta[name="csrf-token"]').attr('content');
  swal({
    title: 'Apakah anda ingin membatalkan ' + title + ' ?',
    text: 'Anda tidak bisa mengembalikannya lagi!',
    icon: 'warning',
    buttons: {
      cancel: {
        text: "Cancel",
        value: false,
        visible: true
      },
      confirm: {
        text: "Ya, batalkan pasien ini!",
        value: true,
        visible: true,
        className: "",
        closeModal: true
      }
    }
  }).then(function (result) {
    if (result) {
      $.ajax({
        url: url,
        type: 'POST',
        data: {
          '_method': 'DELETE',
          '_token': csrf_token
        },
        success: function success(response) {
          $('#datatable').DataTable().ajax.reload();
          swal({
            icon: 'success',
            title: 'Success!',
            text: 'Pasien batal berobat!'
          });
        },
        error: function error(xhr) {
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
/*modal periksa*/

$('body').on('click', '.modal-periksa', function (event) {
  event.preventDefault();
  var me = $(this),
      url = me.attr('href'),
      title = me.attr('title');
  $('#modal-title').text(title);

  if (me.hasClass('periksa')) {
    $('#modal-btn-periksa').text('Selesai');
  }

  $.ajax({
    url: url,
    dataType: 'html',
    success: function success(response) {
      $('#modal-body').html(response);
    }
  });
  $('#modal_periksa').modal('show');
});
$('#modal-btn-periksa').click(function (event) {
  event.preventDefault();
  $('#modal_periksa').modal('hide');
});
/*Tombol save diagnosa*/

$('#btn-save-diagnosa').click(function (event) {
  event.preventDefault();
  var form = $('#form-diagnosa form');
  url = form.attr('action');
  method = form.attr('method');
  form.find('.invalid-feedback').remove();
  form.find('.form-control').removeClass('is-invalid');
  $.ajax({
    url: url,
    method: method,
    data: form.serialize(),
    success: function success(response) {
      form.trigger('reset');
      $('#tabel_diagnosa').DataTable().ajax.reload();
      swal({
        icon: 'success',
        title: 'Success!',
        text: 'Data berhasil disimpan!'
      });
    },
    error: function error(xhr) {
      var res = xhr.responseJSON;

      if ($.isEmptyObject(res) == false) {
        $.each(res.errors, function (key, value) {
          $('#' + key).addClass('is-invalid');
        });
      } //console.log(res);

    }
  });
});

/***/ }),

/***/ 0:
/*!******************************************!*\
  !*** multi ./resources/assets/js/app.js ***!
  \******************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! C:\xampp\htdocs\sirm\resources\assets\js\app.js */"./resources/assets/js/app.js");


/***/ })

/******/ });