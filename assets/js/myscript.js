const flashError = $('.flash-data').data('flashdata');
if (flashError) {
    swal({
        title: 'Oops..',
        text: flashError,
        icon: 'error',
    });
}