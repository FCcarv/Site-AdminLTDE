$(function () {
    //############## TINYMCE
    tinyMCE.init({
        selector: ".js_editor",
        language: 'pt_BR',
        menubar: false,
        theme: "modern",
        height: 200,
        skin: 'light',
        entity_encoding: "raw",
        theme_advanced_resizing: true,
        plugins: [
            "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
            "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
            "save table contextmenu directionality emoticons template paste textcolor media"
        ],
        toolbar: "styleselect | forecolor | backcolor | pastetext | removeformat |  bold | italic | underline | strikethrough | bullist | numlist | alignleft | aligncenter | alignright |  link | unlink | image | media |  outdent | indent | forecolor | fullscreen | preview | code",
        content_css: "tinymce/tinyMCE.css",
        style_formats: [
            {title: 'Normal', block: 'p'},
            {title: 'Titulo 3', block: 'h3'},
            {title: 'Titulo 4', block: 'h4'},
            {title: 'Titulo 5', block: 'h5'},
            {title: 'Código', block: 'pre', classes: 'brush: php;'}
        ],
        link_title: false,
        target_list: false,
        theme_advanced_blockformats: "h1,h2,h3,h4,h5,p,pre",
        media_dimensions: false,
        media_poster: false,
        media_alt_source: false,
        media_embed: false,
        //extended_valid_elements: "a[href|target=_blank|rel]",
        image_dimensions: false,
        relative_urls: false,
        remove_script_host: false,

        images_upload_url: 'post/sendImgTinymce ',

        // override default upload handler to simulate successful upload
        images_upload_handler: function (blobInfo, success, failure) {
            var xhr, formData;

            xhr = new XMLHttpRequest();
            xhr.withCredentials = false;
            xhr.open('POST', 'post/sendImgTinymce');

            xhr.onload = function() {
                var json;

                if (xhr.status != 200) {
                    failure('HTTP Error: ' + xhr.status);
                    return;
                }

                json = JSON.parse(xhr.responseText);

                if (!json || typeof json.location != 'string') {
                    failure('Invalid JSON: ' + xhr.responseText);
                    return;
                }

                success(json.location);
            };

            formData = new FormData();
            formData.append('file', blobInfo.blob(), blobInfo.filename());

            xhr.send(formData);
        },
    });


    //############## MASK INPUT
    $(".formDate").mask("99/99/9999");
    $(".formTime").mask("99/99/9999 99:99");
    $(".formCep").mask("99999-999");
    $(".formCpf").mask("999.999.999-99");

    $('.formPhone').focusout(function () {
        var phone, element;
        element = $(this);
        element.unmask();
        phone = element.val().replace(/\D/g, '');
        if (phone.length > 10) {
            element.mask("(99) 99999-999?9");
        } else {
            element.mask("(99) 9999-9999?9");
        }
    }).trigger('focusout');
});

