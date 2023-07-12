

<script>
    $(document).ready(function() {
      var summernote = $('#description').summernote({
        height: 200,
        toolbar: [
          ['style', ['bold', 'italic', 'underline', 'strikethrough']],
          ['font', ['fontname', 'fontsize']],
          ['color', ['forecolor', 'backcolor']],
          ['para', ['paragraph']],
          ['insert', ['link']],
          ['table', ['table']],
          ['tools', ['undo', 'redo', 'fullscreen']],

        ]
      });
    });


    $(document).ready(function() {
      var summernote = $('#agenda').summernote({
        height: 200,
        toolbar: [
          ['style', ['bold', 'italic', 'underline', 'strikethrough']],
          ['font', ['fontname', 'fontsize']],
          ['color', ['forecolor', 'backcolor']],
          ['para', ['paragraph']],
          ['insert', ['link']],
          ['table', ['table']],
          ['tools', ['undo', 'redo', 'fullscreen']],
        ]
      });
    });


    function editDescription(editDesc, editAgen){
        $(document).ready(function() {
        var summernote = $(editDesc).summernote({
            height: 200,
            toolbar: [
            ['style', ['bold', 'italic', 'underline', 'strikethrough']],
            ['font', ['fontname', 'fontsize']],
            ['color', ['forecolor', 'backcolor']],
            ['para', ['paragraph']],
            ['insert', ['link']],
            ['table', ['table']],
            ['tools', ['undo', 'redo', 'fullscreen']],
            ]
        });
        });

        $(document).ready(function() {
        var summernote = $(editAgen).summernote({
            height: 200,
            toolbar: [
            ['style', ['bold', 'italic', 'underline', 'strikethrough']],
            ['font', ['fontname', 'fontsize']],
            ['color', ['forecolor', 'backcolor']],
            ['para', ['paragraph']],
            ['insert', ['link']],
            ['table', ['table']],
            ['tools', ['undo', 'redo', 'fullscreen']],
            ]
        });
        });
    }
    </script>


