document.addEventListener("DOMContentLoaded", function () {
    tinymce.init({
        selector: '.richTextBox', // Використовуйте richTextBox замість .rich-editor
        plugins: 'lists link image table code',
        toolbar: 'undo redo | bold italic underline | bullist numlist outdent indent | link image | code',
        menubar: false,
        height: 500,
    });
});


