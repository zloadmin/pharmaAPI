function confirmButton() {
    $('.confirm_button').submit(function (e) {
        return confirm( $(this).attr('data-confirm-text') ? $(this).attr('data-confirm-text') : 'Delete?');
    });
}
