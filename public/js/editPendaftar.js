// Check combo box punya kip atau tidak. Jika punya form akan enabled
$('#punya_kip').on('change', function(){
    if($(this).val() === 'Tidak'){
        $('#no_kip').prop('disabled', true);
        $('#nama_pada_kip').prop('disabled', true);
    }else{
        $('#no_kip').prop('disabled', false);
        $('#nama_pada_kip').prop('disabled', false);
    }
});

$('body').on('click', '#btnEdit', function(event){
    event.preventDefault();

    Swal.fire({
        type: 'warning',
        title: 'Apakah Anda yakin untuk mengubah data ini?',
        text: `Klik 'Ya' untuk melanjutkan`,
        showConfirmButton: true,
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if(result.value){
           let url = $(this).attr('href'),
               form = $('#form-edit');
            
            form.find('.form-control').removeClass('is-invalid');
            form.find('.error').remove();

            // console.log(url);
            $.ajax({
                url: url,
                method: 'put',
                data: form.serialize(),
                success: function(res){
                    Swal.fire({
                        type: 'success',
                        title: 'Sukses Diubah!',
                        text: res.message
                    }).then(result => {
                        window.location = url;
                    });
                },
                error: function(xhr){
                    Swal.fire({
                        type: 'error',
                        title: 'Ooppss!',
                        text: 'Sepertinya ada kesalahan...'
                    })
                    let res = xhr.responseJSON;

                    if($.isEmptyObject(res) == false){
                        $.each(res.errors, function(key, value){
                            // Server Side form validation
                            console.log(value);
                            $('.form-group #'+key)
                            .addClass('is-invalid')
                            .after('<span class="error invalid-feedback">'+value+'</span>')
                        })
                    }
                   
                }
            })
        }
    })
})