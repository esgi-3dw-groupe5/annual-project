      function initTinymce(){
        tinymce.init({
            selector: "textarea#at_content",
            elements : "at_content",
            width : 1000,
            height : 500,
            plugins: "textcolor media preview image",
            toolbar: [
            "undo redo | styleselect | bold italic | link image | forecolor | backcolor | preview",
            "alignleft aligncenter alignright"
            ]
        });

        tinymce.init({
            selector: "textarea#co_content",
            elements : "at_content",
            width : 500,
            height : 150,
            menubar : false,
            toolbar: [
            "undo redo | bold italic | alignleft aligncenter alignright "
            ]
        });
    }