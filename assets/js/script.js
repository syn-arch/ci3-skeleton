
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

        // user
        var table_user = $('#table-user').DataTable({ 
          "processing": true,
          "serverSide": true,
          "order": [],
          "ajax": {
            "url": base_url + "user/get_user_json",
            "type": "POST"
          },
          "columns": [
          {"data" : "id_user"},
          {"data": "nama_petugas"},
          {"data": "email"},
          {"data": "telepon"},
          {"data": "nama_role"},
          {
            "data": "id_user",
            "render" : function(data, type, row) {
              return `<a class="btn btn-warning ubah_user" href="#modal-user" data-toggle="modal" data-id="${data}"><i class="fa fa-edit"></i></a>
              <a class="btn btn-danger hapus_user" data-href="${base_url}user/hapus_user/${data}"><i class="fa fa-trash"></i></a>`
            }
          }
          ],
        });

        table_user.on('order.dt search.dt draw.dt', function () {
            var start = table_user.page.info().start;
            var info = table_user.page.info();
            table_user.column(0, {order:'applied'}).nodes().each( function (cell, i) {
                cell.innerHTML = start+i+1;
            } );
        } ).draw();

        $(document).on('click', '.hapus_user', function(){
        	hapus($(this).data('href'))
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
        var table_jurusan = $('#table-jurusan').DataTable({ 
          "processing": true,
          "serverSide": true,
          "order": [],
          "ajax": {
            "url": base_url + "master/get_jurusan_json",
            "type": "POST"
          },
          "columns": [
          {"data" : "id_jurusan"},
          {"data": "nama_jurusan"},
          {"data": "singkatan"},
          {
            "data": "id_jurusan",
            "render" : function(data, type, row) {
              return `<a class="btn btn-warning ubah_jurusan" href="${base_url}master/ubah_jurusan/${data}"><i class="fa fa-edit"></i></a>
              <a class="btn btn-danger hapus_jurusan" data-href="${base_url}jurusan/hapus_user/${data}"><i class="fa fa-trash"></i></a>`
            }
          }
          ],
        });

        table_jurusan.on('order.dt search.dt draw.dt', function () {
            var start = table_jurusan.page.info().start;
            var info = table_jurusan.page.info();
            table_jurusan.column(0, {order:'applied'}).nodes().each( function (cell, i) {
                cell.innerHTML = start+i+1;
            } );
        } ).draw();


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
       var table_calon_siswa = $('#table-calon-siswa').DataTable({ 
          "processing": true,
          "serverSide": true,
          "order": [],
          "ajax": {
            "url": base_url + "ppdb/get_calon_siswa_json",
            "type": "POST"
          },
          "columns": [
          {"data" : "id_siswa"},
          {"data": "no_pendaftaran"},
          {"data": "nama_siswa"},
          {"data": "jk"},
          {"data": "telepon_hp"},
          {"data": "asal_sekolah"},
          {
            "data": "id_siswa",
            "render" : function(data, type, row) {
              return `<a class="btn btn-warning ubah_calon_siswa" href="${base_url}ppdb/ubah_calon_siswa/${data}"><i class="fa fa-edit"></i></a>
              <a class="btn btn-danger hapus_calon_siswa" data-href="${base_url}ppdb/hapus_calon_siswa/${data}"><i class="fa fa-trash"></i></a>`
            }
          }
          ],
        });

        table_calon_siswa.on('order.dt search.dt draw.dt', function () {
            var start = table_calon_siswa.page.info().start;
            var info = table_calon_siswa.page.info();
            table_calon_siswa.column(0, {order:'applied'}).nodes().each( function (cell, i) {
                cell.innerHTML = start+i+1;
            } );
        } ).draw();

        $(document).on('click', '.hapus_calon_siswa', function(){
          hapus($(this).data('href'))
        })

        $(document).on('click', '.hapus_slider', function(){
          hapus($(this).data('href'))
        })

        $(document).on('click', '.hapus_kontak', function(){
          hapus($(this).data('href'))
        })

        // berita
        var table_berita = $('#table-berita').DataTable({ 
          "processing": true,
          "serverSide": true,
          "order": [],
          "ajax": {
            "url": base_url + "konten/get_berita_json",
            "type": "POST"
          },
          "columns": [
          {"data" : "id_berita"},
          {"data": "tgl"},
          {"data": "nama_petugas"},
          {"data": "judul"},
          {"data": "status"},
          {
            "data": "id_berita",
            "render" : function(data, type, row) {
              return `<a class="btn btn-warning ubah_berita" href="${base_url}konten/ubah_berita/${data}"><i class="fa fa-edit"></i></a>
              <a class="btn btn-danger hapus_berita" data-href="${base_url}konten/hapus_berita/${data}"><i class="fa fa-trash"></i></a>`
            }
          }
          ],
        });

        table_berita.on('order.dt search.dt draw.dt', function () {
            var start = table_berita.page.info().start;
            var info = table_berita.page.info();
            table_berita.column(0, {order:'applied'}).nodes().each( function (cell, i) {
                cell.innerHTML = start+i+1;
            } );
        } ).draw();

        $(document).on('click', '.hapus_berita', function(){
          hapus($(this).data('href'))
        })


      });