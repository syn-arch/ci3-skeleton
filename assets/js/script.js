
$(document).ready(function(){

  var base_url = $('meta[name="BASE_URL"]').attr('content')

  $('.sebutkan_jarak_tempuh').hide()
  $('.jurusan-petugas').hide()


  $('.jarak_tempuh').change(function(){
    var data = $(this).val()
    if(data == 'Lebih dari 1 KM'){
      $('.sebutkan_jarak_tempuh').show()
    }else{
      $('.sebutkan_jarak_tempuh').hide()
    }
  })

  $('.petugas').change(function(){
    var data = $(this).val()
    if(data == '1'){
      $('.jurusan-petugas').show()
    }else{
      $('.jurusan-petugas').hide()
    }
  })

  $('.tables').DataTable()
  $('.textarea').summernote()
  $('.smartwizard').smartWizard({
    theme : "arrows"
  });

  bsCustomFileInput.init();

  var alert = $('.alert-message').text(), error = $('.alert-message-error').text()

  if (alert != '') {
    swal({
      title: "Berhasil!",
      text: "Data berhasil " + alert,
      icon: "success",
      timer : 1500,
      buttons : false
    })
  }

  if (error != '') {
   swal({
    title: "Gagal!",
    text: error,
    icon: "error",
    timer : 1500
  })
 }

 function hapus(href){
   swal({
    title: "Apakah anda yakin?",
    text: "Data yang dihapus tidak dapat dikembalikan!",
    icon: "warning",
    buttons: true,
    dangerMode: true,
  }).then((willDelete) => {
    if (willDelete) {
      window.location = href
    }
  });
}

        // sub menu
        $('.form-menu').click(function() {

          var id_menu = $(this).data('id_menu');
          var id_role = $(this).data('id_role');

          $.ajax({
            url: base_url + "role/ubah_akses_menu",
            type : 'post',
            data : {
              id_menu : id_menu,
              id_role : id_role
            },
            success: function() {
              swal('Berhasil', 'Data berhasil diubah', 'success')
            }

          });
        });

        // sub menu
        $('.form-sub').click(function() {

          var id_submenu = $(this).data('id_submenu');
          var id_role = $(this).data('id_role');

          $.ajax({
            url: base_url + "role/ubah_akses_submenu",
            type : 'post',
            data : {
              id_submenu : id_submenu,
              id_role : id_role
            },
            success: function() {
              swal('Berhasil', 'Data berhasil diubah', 'success')
            }

          });
        });

        $.fn.dataTableExt.oApi.fnPagingInfo = function(oSettings)
        {
        	return {
        		"iStart": oSettings._iDisplayStart,
        		"iEnd": oSettings.fnDisplayEnd(),
        		"iLength": oSettings._iDisplayLength,
        		"iTotal": oSettings.fnRecordsTotal(),
        		"iFilteredTotal": oSettings.fnRecordsDisplay(),
        		"iPage": Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength),
        		"iTotalPages": Math.ceil(oSettings.fnRecordsDisplay() / oSettings._iDisplayLength)
        	};
        };

        // role
        $("#table-user").dataTable({
        	initComplete: function() {
        		var api = this.api();
        		$('#mytable_filter input')
        		.off('.DT')
        		.on('input.DT', function() {
        			api.search(this.value).draw();
        		});
        	},
        	oLanguage: {
        		sProcessing: "loading..."
        	},
        	processing: true,
        	serverSide: true,
        	ajax: {"url": base_url + "user/get_user_json", "type": "POST"},
        	columns: [
          {"data" : null},
          {"data": "nama_petugas"},
          {"data": "email"},
          {"data": "telepon"},
          {"data": "nama_role"},
          {"data": "id_user",
          "render": function(data, type, row) {
           return `<a class="btn btn-warning ubah_user" href="#modal-user" data-toggle="modal" data-id='${data}'><i class="fa fa-edit"></i></a>
           <a class="btn btn-danger hapus_user" data-href="${base_url}user/hapus/${data}"><i class="fa fa-trash"></i></a>`;
         }
       }
       ],
       order: [[1, 'asc']],
       rowCallback: function(row, data, iDisplayIndex) {
        var info = this.fnPagingInfo();
        var page = info.iPage;
        var length = info.iLength;
        var index = page * length + (iDisplayIndex + 1);
        $('td:eq(0)', row).html(index);
      }

    });

        $(document).on('click', '.hapus_user', function(){
        	hapus($this.data('href'))
        })

        $('.tambah-user').click(function(){
        	$('.modal-title').text('Tambah User')
        	$('.form-user').attr('action', base_url + "user/simpan")
        	$('.nama_petugas').val('')
          $('.telepon').val('')
          $('.alamat').val('')
          $('.jk').val('pilih_jk')
          $('.petugas_img').hide()
          $('.password').val('')
          $('.email').val('')
          $('.username').prop('disabled', false)
          $('.id_role').val('pilih_role')
          $('.id_jurusan').val('pilih_jurusan')
          $('.pw1').show()
          $('.pw2').show()
        })

        $(document).on('click', '.ubah_user', function(){
        	var id = $(this).data('id')
        	$.get(base_url + "user/get_user/" + id, function(datas){
        		var data = JSON.parse(datas)
        		$('.modal-title').text('Ubah User')
        		$('.form-user').attr('action', base_url + "user/ubah/" + data.id_user + '/' + data.id_petugas)
        		$('.nama_petugas').val(data.nama_petugas)
            $('.alamat').val(data.alamat)
            $('.telepon').val(data.telepon)
            $('.jk').val(data.jk)
            $('.petugas').val(data.petugas)
            if (data.petugas == 1) {
              $('.jurusan-petugas').show()
              $('.id_jurusan').val(data.id_jurusan)
            }
            $('.email').val(data.email)
            $('.username').prop('disabled', true)
            $('.password').attr('')
            $('.petugas_img').show()
            $('.petugas_img').attr('src', base_url + "assets/img/petugas/" + data.gambar)
            $('.id_role').val(data.id_role)
            $('.pw1').hide()
            $('.pw2').hide()
          })
        })


        // Role
        $(document).on('click', '.hapus_role', function(){
          hapus($(this).data('href'))
        })

        // jurusan
        $("#table-jurusan").dataTable({
          initComplete: function() {
            var api = this.api();
            $('#mytable_filter input')
            .off('.DT')
            .on('input.DT', function() {
              api.search(this.value).draw();
            });
          },
          oLanguage: {
            sProcessing: "loading..."
          },
          processing: true,
          serverSide: true,
          ajax: {"url": base_url + 'master/get_jurusan_json', "type": "POST"},
          columns: [
          {"data" : null},
          {"data": "nama_jurusan"},
          {"data": "singkatan"},
          {"data": "id_jurusan",
          "render": function(data, type, row) {
           return `<a class="btn btn-warning" href="${base_url}master/ubah_jurusan/${data}"><i class="fa fa-edit"></i></a>
           <a class="btn btn-danger hapus_jurusan" data-href="${base_url}master/hapus_jurusan/${data}"><i class="fa fa-trash"></i></a>`;
         }
       }
       ],
       order: [[1, 'asc']],
       rowCallback: function(row, data, iDisplayIndex) {
        var info = this.fnPagingInfo();
        var page = info.iPage;
        var length = info.iLength;
        var index = page * length + (iDisplayIndex + 1);
        $('td:eq(0)', row).html(index);
      }

    });

        $(document).on('click', '.hapus_jurusan', function(){
          hapus($(this).data('href'))
        })

        // tahun akademik
        $(document).on('click', '.hapus_tahun_akademik', function(){
          hapus($(this).data('href'))
        })

        // gelombang pendaftaran
        $(document).on('click', '.hapus_gelombang_pendaftaran', function(){
          hapus($(this).data('href'))
        })

        // kuota pendaftaran
        $(document).on('click', '.hapus_kuota_pendaftaran', function(){
          hapus($(this).data('href'))
        })

        // jalur pendaftaran
        $(document).on('click', '.hapus_jalur_pendaftaran', function(){
          hapus($(this).data('href'))
        })

        // calon siswa
        $("#table-calon-siswa").dataTable({
          initComplete: function() {
            var api = this.api();
            $('#mytable_filter input')
            .off('.DT')
            .on('input.DT', function() {
              api.search(this.value).draw();
            });
          },
          oLanguage: {
            sProcessing: "loading..."
          },
          processing: true,
          serverSide: true,
          ajax: {"url": base_url + 'ppdb/get_calon_siswa_json', "type": "POST"},
          columns: [
          {"data" : null},
          {"data": "no_pendaftaran"},
          {"data": "nama_siswa"},
          {"data": "jk"},
          {"data": "telepon_hp"},
          {"data": "asal_sekolah"},
          {"data": "id_siswa",
          "render": function(data, type, row) {
            return `<a class="btn btn-warning" href="${base_url}ppdb/ubah_calon_siswa/${data}"><i class="fa fa-edit"></i></a>
            <a class="btn btn-danger hapus_calon_siswa" data-href="${base_url}ppdb/hapus_calon_siswa/${data}"><i class="fa fa-trash"></i></a>`;
          }
        }
        ],
        order: [[1, 'asc']],
        rowCallback: function(row, data, iDisplayIndex) {
          var info = this.fnPagingInfo();
          var page = info.iPage;
          var length = info.iLength;
          var index = page * length + (iDisplayIndex + 1);
          $('td:eq(0)', row).html(index);
        }

      });

        $(document).on('click', '.hapus_calon_siswa', function(){
          hapus($(this).data('href'))
        })

        $(document).on('click', '.hapus_slider', function(){
          hapus($(this).data('href'))
        })

        $(document).on('click', '.hapus_kontak', function(){
          hapus($(this).data('href'))
        })

        $(document).on('click', '.hapus_berita', function(){
          hapus($(this).data('href'))
        })


      });