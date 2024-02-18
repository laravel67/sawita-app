function previewImage(){
    const image      = document.querySelector('#image');
    const imgPreview = document.querySelector('#img-preview');
    // imgPreview.style.display ='block';
    const oFReader = new FileReader();
    oFReader.readAsDataURL(image.files[0])
    oFReader.onload = function(oFREvent){
        imgPreview.src = oFREvent.target.result;
    }
}

// Tombol Check box submit
$(document).ready(function(){
    $('#checkbox').change(function(){
        toggleSubmit();
    });
    function toggleSubmit() {
        var isChecked= $('#checkbox').prop('checked');
        $('#btn-submit').prop('disabled', !isChecked)
    }
});






