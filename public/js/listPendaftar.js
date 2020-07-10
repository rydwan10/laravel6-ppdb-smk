$('body').on('click', '#btnHapus', function(event){
    event.preventDefault();
    Swal.fire({

        type: 'warning',
        title: 'Hapus data pendaftar ini?',
        text: 'Data yang telah dihapus tidak bisa dikembalikan!',
        showConfirmButton: true,
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya',
        cancelButtonText: 'Batal'

    }).then ((result) => {
        if(result.value){

            // let url = event.target.href;
            let id = $(this).data('id');
            let token = $("meta[name='csrf-token']").attr('content');
            
            $.ajax({
                type: "DELETE",
                url: "/ppdb/"+id,
                data: {
                    _token: token,
                    id: id
                },
                success: function (res) {       
                    $('#datatable').DataTable().ajax.reload();     
                    Swal.fire({
                        type: 'success',
                        title: 'Sukses Dihapus!',
                        text: res.message
                    })
                },
                error: function(err){
                    Swal.fire({
                        type: 'error',
                        title: 'Oopss...',
                        text: err
                    })
                }
            });

        }
    })
})