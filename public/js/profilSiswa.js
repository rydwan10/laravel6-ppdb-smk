// Hapus
$('body').on('click', '#btnHapus', function(event){
    event.preventDefault();
  
    Swal.fire({
        type: 'warning',
        title: 'Hapus data pendaftar ini?',
        text: 'Data yang telah dihapus tidak bisa dikembalikan!',
        showConfirmButton: true,
        showCancelButton: true,
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya',
        cancelButtonText: 'Batal'
    }).then(result => {
        if(result.value) {
            let id = $(this).data('id');
            let token = $("meta[name='csrf-token']").attr('content');
            let url = $(this).attr('href');

            $.ajax({
                type: 'DELETE',
                url : url,
                data: {
                    _token: token,
                    id: id
                },
                success: function(res){
                    Swal.fire({
                        type: 'success',
                        title: 'Sukses Dihapus!',
                        text: res.message
                    }).then(result => {
                        if(result.value){
                            window.location = '/ppdb'
                        }
                    })

                },
                error: function(xhr) {
                    Swal.fire({
                        type: 'error',
                        title: 'Oppss...',
                        text: 'Terjadi sebuah kesalahan!'
                    })
                    console.log(xhr.responseJSON)
                }
            })
        }
    })
})

// Cetak
$('body').on('click', '#btnCetak', function(event){
    event.preventDefault();
    let target = $(this).attr('href');
    window.open(`${target}`);


})