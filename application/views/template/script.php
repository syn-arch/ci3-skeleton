<script>

	$(document).ready(function(){

        $('.tables').DataTable()

        bsCustomFileInput.init();

        var alert = $('.alert-message').text(), error = $('.alert-message-error').text()

        if (alert != '') {
            swal({
              title: "Berhasil!",
              text: "Data berhasil " + alert,
              icon: "success",
              timer : 1500
          })
        }

        if (error != '') {
           swal({
            title: "Gagal!",
              text: alert,
              icon: "error",
              timer : 1500
          })
       }

        // sub menu
        $('.form-menu').click(function() {

            var id_menu = $(this).data('id_menu');
            var id_role = $(this).data('id_role');

            $.ajax({
                url: "<?= base_url('role/ubah_akses_menu') ?>",
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
                url: "<?= base_url('role/ubah_akses_submenu') ?>",
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
        	ajax: {"url": "<?php echo base_url().'user/get_user_json'?>", "type": "POST"},
        	columns: [
          {"data" : null},
          {"data": "username"},
          {"data": "nama_role"},
          {"data": "id_user",
          "render": function(data, type, row) {
             return `<a class="btn btn-warning ubah_user" href="#modal-user" data-toggle="modal" data-id='${data}'><i class="fa fa-edit"></i></a>
             <a class="btn btn-danger hapus_user" data-href="<?php echo base_url('user/hapus/') ?>${data}"><i class="fa fa-trash"></i></a>`;
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
        	swal({
        		title: "Apakah anda yakin?",
        		text: "Data yang dihapus tidak dapat dikembalikan!",
        		icon: "warning",
        		buttons: true,
        		dangerMode: true,
        	}).then((willDelete) => {
        		if (willDelete) {
        			window.location = $(this).data('href')
        		}
        	});
        })

        $('.tambah-user').click(function(){
        	$('.modal-title').text('Tambah User')
        	$('.form-user').attr('action', '<?php echo base_url("user/simpan") ?>')
        	$('.username').val('')
        	$('.password').val('')
            $('.username').prop('disabled', false)
            $('.id_role').val('pilih_role')
        })

        $(document).on('click', '.ubah_user', function(){
        	var id = $(this).data('id')
        	$.get("<?php echo base_url('user/get_user/') ?>" + id, function(datas){
        		var data = JSON.parse(datas)
        		$('.modal-title').text('Ubah User')
        		$('.form-user').attr('action', '<?php echo base_url("user/ubah/") ?>' + data.id_user)
        		$('.username').val(data.username)
        		$('.username').prop('disabled', true)
        		$('.password').attr('')
        		$('.id_role').val(data.id_role)
        	})
        })


        // Role
        $(document).on('click', '.hapus_role', function(){
            swal({
                title: "Apakah anda yakin?",
                text: "Data yang dihapus tidak dapat dikembalikan!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    window.location = $(this).data('href')
                }
            });
        })


    });

</script>