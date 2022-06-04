var description = CKEDITOR.replace('description', {
    language: 'en',
    extraPlugins: 'notification'
});

description.on('required', function(evt) {
    description.showNotification( 'This field is required.');
    evt.cancel();
});