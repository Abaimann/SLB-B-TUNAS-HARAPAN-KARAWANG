$(document).ready(function() {
    $('#summernote').summernote({
        placeholder: 'Tulis konten berita...',
        height: 350,
        toolbar: [
            ['style', ['bold', 'italic', 'underline', 'clear']],
            ['font', ['fontsize', 'color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['insert', ['link', 'picture', 'video']],
            ['view', ['codeview']]
        ],
        callbacks: {
            onPaste: function (e) {
                let text = ((e.originalEvent || e).clipboardData).getData('text/plain');
                e.preventDefault();
                document.execCommand('insertText', false, text);
            }
        }
    });
});
