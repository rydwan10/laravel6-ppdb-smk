    // Cek combo box punya kip atau tidak. Jika punya, form akan enabled
    $('#punya_kip').on('change', function(){
        if($(this).val() === 'Tidak'){
            $('#no_kip').prop('disabled', true);
            $('#nama_pada_kip').prop('disabled', true);
        }else{
            $('#no_kip').prop('disabled', false);
            $('#nama_pada_kip').prop('disabled', false);
        }
    });

    $('#btnSimpan').on('click', function(event){
        event.preventDefault();
        let url = $(this).attr('href'),
            form = $('#form-tambah');

        form.find('.form-control').removeClass('is-invalid');
        form.find('.error').remove();
        // console.log(url);
        $.ajax({
            url: url,
            method: 'post',
            data: form.serialize(),
            success: function(response){
                console.log(response);
                form.trigger('reset');
                Swal.fire({
                    type: 'success',
                    title: 'Data calon siswa berhasil tersimpan!',
                    showConfirmButton: false,
                    timer: 1500
                })
            },
            error: function(xhr){
                let res = xhr.responseJSON;
            
                if($.isEmptyObject(res) == false){
                    $.each(res.errors, function(key, value){
                        
                        // Server Side form validation
                        $('.form-group #'+key)
                            .addClass('is-invalid')
                            .after('<span class="error invalid-feedback">'+value+'</span>')
                        
                    })
                }
            }
        });
    
    });

    // Pilih Jurusan dari modal
    $('body').on('click', '#btnPilih', function(event){
        event.preventDefault();
        $('#id_asal_sekolah').val($(this).data('id'));
        $('#nama_asal_sekolah').val($(this).data('nama-sekolah'));
        $('#modalListAsalSekolah').modal('hide');
    })


    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    })
    
    $('#btnTambahData').click(function(event){
        event.preventDefault();
        $('#asalSekolahForm').trigger('reset');
        $('#modalTitle').html('Tambah Data Asal Sekolah');
        $('#btnSimpanAsalSekolah').val('simpan-data').removeClass('btn-danger').addClass('btn-primary').text('Simpan');
        $('#form-id').remove();
        $('#modalAsalSekolah').modal('show');
    
        // hapus pesan error sebelumnya
        let form = $('#modalAsalSekolah').find('form');
            form.find('.form-control').removeClass('is-invalid');
            form.find('.error').remove();
    });
    
    $('body').on('click', '#btnEdit', function(event){
        event.preventDefault();
        
        $('#form-id').remove();
    
        let id = $(this).data('id');
    
        let form = $('#modalAsalSekolah').find('form');
        form.find('.form-control').removeClass('is-invalid');
        form.find('.error').remove();
        
        $('#modalAsalSekolah').modal('show');
        $('#modalTitle').html('Edit Data Asal Sekolah');
        $('#btnSimpanAsalSekolah').val('simpan-perubahan').removeClass('btn-primary').addClass('btn-danger').text('Simpan Perubahan');
    
        $('#modalAsalSekolah .modal-body').prepend(`
        <div id="form-id" class="form-group">
            <input type="hidden" name="id" id="id" class="form-control col-md-4" value="${id}">
        </div>
        `)
    
        
        // GET data sesuai dengan id
        $.ajax({
            url: '/asal_sekolah/'+id,
            method: 'GET',
            success: function(response){
                // let form = $('#modalAsalSekolah').find('form');
                // $.each(response, function(key, value){
                //     $('.form-group #'+key).val(value);
                // })
                $('.form-group #id').val(response.id);
                $('.form-group #npsn').val(response.npsn);
                $('.form-group #nama_sekolah').val(response.nama_sekolah);
                $('.form-group #alamat_asal_sekolah').val(response.alamat);
            },
            error: function(error){
                console.log(error);
            }
        })
        
    });
    
    $('#btnSimpanAsalSekolah').click(function(event){
        event.preventDefault();
    
        if( $(this).val() === 'simpan-data'){
            // Jalankan ajax untuk menyimpan data baru
            let form = $('#modalAsalSekolah').find('form');
            form.find('.form-control').removeClass('is-invalid');
            form.find('.error').remove();
    
            $.ajax({
                url: '/asal_sekolah',
                method: 'POST',
                data: form.serialize(),
                success: function(response){
                   // console.log(response);
                    form.trigger('reset');
                    Swal.fire({
                        type: 'success',
                        title: 'Data Tersimpan!',
                        text: response.message,
                    })
                    $('#modalAsalSekolah').modal('hide');
                    $('#datatable').DataTable().ajax.reload();
                },
                error: function(error){
                    let res = error.responseJSON;
                    if(!$.isEmptyObject(res)){
                        $.each(res.errors, function(key, value){
                            $('.form-group #'+key).addClass('is-invalid')
                            .after('<span class="error invalid-feedback">'+ value +'</span>')
                        })
                    }
                }
            });
        }else if( $(this).val() === 'simpan-perubahan'){
            // Jalankan ajax untuk menyimpan perubahan data sesuai dengan id
            let form = $('#modalAsalSekolah').find('form');
            form.find('.form-control').removeClass('is-invalid');
            form.find('.error').remove();
    
            let id = $('#id').val();  
    
            $.ajax({
                url: '/asal_sekolah/' + id,
                method: 'PUT',
                data: form.serialize(),
                success: function(response){
                    Swal.fire({
                        type: 'success',
                        title: 'Berhasil Diperbaharui!',
                        text: response.message
                    });
                    $('#modalAsalSekolah').modal('hide');
                    $('#datatable').DataTable().ajax.reload();
                },
                error: function(error){
                    let res = error.responseJSON;
                    if(!$.isEmptyObject(res)){
                        $.each(res.errors, function(key, value){
                            $('.form-group #'+key)
                                .addClass('is-invalid')
                                .after('<span class="error invalid-feedback">'+value+'</span>')
                        })
                    }
                }
            })
        }
    });
    
    $('body').on('click', '#btnHapus', function(event){
        event.preventDefault();
        Swal.fire({
            type: 'warning',
            title: 'Hapus Data Asal Sekolah ini?',
            text: 'Data yang telah dihapus tidak bisa dikembalikan!',
            showConfirmButton: true,
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya',
            cancelButtonText: 'Batal'
        }).then(result => {
            if(result.value){
                let id = $(this).data('id');
    
                $.ajax({
                    type: "DELETE",
                    url: "/asal_sekolah/" + id,
                    data: {
                        id: id
                    },
                    success: function(res){
                        $('#datatable').DataTable().ajax.reload();     
                        Swal.fire({
                            type: 'success',
                            title: 'Sukses Dihapus!',
                            text: res.message
                        })
                    },
                    error: function(xhr){
                        Swal.fire({
                            type: 'error',
                            title: 'Oopss...',
                            text: xhr.statusText,
                            footer: 'Data ini sepertinya berelasi dengan data lainnya.'
                        })
                        console.log(xhr)
                    }
                })
            }
        })
    });