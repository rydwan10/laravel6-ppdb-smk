const action = $('.modal').find('form').attr('action');

// Mengembalikan action awal
function setBackAction(){
     $('.modal').find('form').attr('action', action);
}

// close modal button 
$('.close').on('click', function(event){
    setBackAction();
});

$('#btnBatal').on('click', function(event){
    setBackAction();
})


// Tambah data asal sekolah
$('#btnTambahData').on('click', function(event){
    event.preventDefault();

    let form = $('.modal').find('form');
    form.find('.form-control').removeClass('is-invalid');
    form.find('.error').remove();

    $('#btnSimpanEdit').attr('id', 'btnSimpan')
        .removeClass('btn-success')
        .addClass('btn-primary')
        .attr('href', '')
        .text('Simpan')

    $('#form-id').remove();
    $('.modal').find('form').trigger('reset');

  
    $('#btnSimpan').on('click', function(event){
        event.preventDefault();
        // Hapus pesan error ketika melakukan Ajax
        let form = $('.modal').find('form');
        form.find('.form-control').removeClass('is-invalid');
        form.find('.error').remove();
    
        
        let url = $('.modal').find('form').attr('action');
    
        $.ajax({
            url: url,
            method: 'post',
            data: form.serialize(),
            success: function(res){
                console.log(res);
                form.trigger('reset');
                Swal.fire({
                    type: 'success',
                    title: 'Data tersimpan!',
                    text: 'Data Asal sekolah berhasil tersimpan',
                  
                })
                $('.modal').modal('hide');
                $('#datatable').DataTable().ajax.reload();     
            },
            error: function(xhr){
                let res = xhr.responseJSON;
    
                if(!$.isEmptyObject(res)){
                    $.each(res.errors, function(key, value){
                        $('.form-group #'+key)
                            .addClass('is-invalid')
                            .after('<span class="error invalid-feedback">'+value+'</span>')
                    })
                }
            }
        });
    });
})

// Hapus data asal sekolah
$('body').on('click', '#btnHapus', function(event){
    event.preventDefault();
    Swal.fire({
        type: 'warning',
        title: 'Hapus data Asal Sekolah ini?',
        text: 'Data yang telah dihapus tidak bisa dikembalikan!',
        showConfirmButton: true,
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya',
        cancelButtonText: 'Batal'
    }).then( result => {
        if(result.value){
            let id = $(this).data('id');
            let token = $("meta[name='csrf-token']").attr('content');
            
            $.ajax({
                type: "DELETE",
                url: "/asal_sekolah/"+id,
                data: {
                    _token: token,
                    id: id
                },
                success: function(res){
                    $('#datatable').DataTable().ajax.reload();     
                    Swal.fire({
                        type: 'success',
                        title: 'Sukses Dihapus!',
                        text: 'Data asal sekolah berhasil terhapus'
                    })
                    setBackAction();
                },
                error: function(xhr){
                    Swal.fire({
                        type: 'error',
                        title: 'Oopss...',
                        text: xhr.statusText
                    })
                    console.log(xhr.statusCode)
                }
            })
        }
    })
});

// Edit data asal sekolah
$('body').on('click', '#btnEdit', function(event){
    event.preventDefault();

    let form = $('.modal').find('form');
    form.find('.form-control').removeClass('is-invalid');
    form.find('.error').remove();
    // Hapus data sebelumnya
    $('#form-id').remove();
    
    let id = $(this).data('id');
    let pastURL = $('.modal').find('form').attr('action');

    $('.modal').modal('show');
    $('.modal').find('.modal-title').text('Edit data Asal Sekolah')
    $('.modal').find('#btnSimpan').text('Simpan Perubahan')
        .attr('id', 'btnSimpanEdit')
        .removeClass('btn-primary')
        .addClass('btn-success')
        .attr('href', '/asal_sekolah/'+id)

    $('.modal').find('form').attr('action', `${pastURL}/${id}`);

    $('.modal').find('form').attr('method', 'PUT');
    $('.modal-body').prepend(`
        <div id="form-id" class="form-group">
            <label for="id">ID</label>
            <input type="text" name="id" id="id" class="form-control col-md-4" value="${id}">
        </div>
    `)
    
    $.ajax({
        url: '/asal_sekolah/'+id,
        method: 'GET',
        success: function(res){
            let form = $('.modal').find('form');
            $.each(res, function(key, value){
                $('.form-group #'+key).val(value)
            });
        },
        error: function(err){
            console.log(err);
        }
    });
    
})


$('body').on('click', '#btnSimpanEdit', function(event){
    event.preventDefault();
    let id = $('#id').val();
    let url = $('.modal').find('form').attr('action');
    let form = $('.modal').find('form');

   
    $.ajax({
        url: url,
        method: 'PUT',
        data: form.serialize(),
        success: function(res){
            Swal.fire({
                type: 'success',
                title: 'Sukses diperbaharui!',
                text: res.message
            });
            $('.modal').modal('hide');
            $('#datatable').DataTable().ajax.reload();
            setBackAction();
        },
        error: function(err){
            console.log(err);
        }
    })
});

