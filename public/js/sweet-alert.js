$('.btn-delete').on('click', function(e){
    e.preventDefault();
    const form = $('#delete-form')
    Swal.fire({
    title: 'Yakin ?',
    text: "Tindakan ini akan menghapus data secara permanen",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Ya, Hapus',
    cancelButtonText: 'Batal'
}).then((result) => {
    if (result.isConfirmed) {
        form.submit();
    }
})
});