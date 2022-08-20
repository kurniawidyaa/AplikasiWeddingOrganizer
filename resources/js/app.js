require('./bootstrap');

$(function(){
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-right',
        iconColor: 'white',
        customClass: {
          popup: 'colored-toast'
        },
        showConfirmButton: false,
        timer: 1500,
        timerProgressBar: true
      });

    $('.swalDefaultSuccess').on('click', '#swalDefaultSuccess', function() {
        await Toast.fire({
            icon: 'success',
            title: 'Success'
          })
    });
    $('.swalDefaultInfo').click(function() {
        await Toast.fire({
            icon: 'info',
            title: 'Info'
          })
    });
    $('.swalDefaultError').click(function() {
        
          await Toast.fire({
            icon: 'error',
            title: 'Error'
          })
    });
    $('.swalDefaultWarning').click(function() {
        await Toast.fire({
            icon: 'warning',
            title: 'Warning'
          })
    });
});
