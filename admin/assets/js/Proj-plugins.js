$(function () {
    //############## TINYMCE
    tinymce.init({
        /* replace textarea having class .tinymce with tinymce editor */
        selector: "textarea.myTexarea",
        language:'pt_BR',   height: 350,
        theme: "modern",
        skin: "lightgray",
        menubar: false,

        /* plugin */
        plugins: [
            "advlist autolink link image charmap print preview hr anchor pagebreak spellchecker",
            "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
            "save table contextmenu directionality emoticons template paste textcolor media lists"
        ],

        toolbar: "styleselect | forecolor | backcolor | pastetext | removeformat |  bold | italic | underline | strikethrough | bullist | numlist | alignleft | aligncenter | alignright |  link | unlink | link image | media |  outdent | indent | forecolor | fullscreen | preview | code",

        style_formats: [
            {title: 'Normal', block: 'p'},
            {title: 'Titulo 3', block: 'h3'},
            {title: 'Titulo 4', block: 'h4'},
            {title: 'Titulo 5', block: 'h5'},
        ],
        convert_urls: false,
        automatic_uploads : false,
        document_base_url: 'http://localhost/Portal-News/admin/',
        link_title: false,
        target_list: false,
        theme_advanced_blockformats: "h1,h2,h3,h4,h5,p,pre",
        images_upload_url: 'post/sendImgTinymce',
        image_caption: true,
        statusbar: false,

        // Upload  de imagens do tinymce
        images_upload_handler: function (blobInfo, success, failure) {
            var xhr, formData;

            xhr = new XMLHttpRequest();
            xhr.withCredentials = false;
            xhr.open('POST', 'http://localhost/Portal-News/admin/post/sendImgTinymce');

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

    //############## CHECKBOX
// Ativar o plugin iCheck para caixas de seleção
    // iCheck para checkbox e entradas de rádio
    $('.check-inp').iCheck({
        checkboxClass: 'icheckbox_flat-blue',
        radioClass: 'iradio_flat-blue'
    });

    //Enable check and uncheck all functionality
    $(".checkbox-toggle").click(function () {
        var clicks = $(this).data('clicks');
        if (clicks) {
            //Uncheck all checkboxes
            $(".check-inp").iCheck("uncheck");
            $(".fa", this).removeClass("fa-check-square-o").addClass('fa-square-o');
        } else {
            //Check all checkboxes
            $(".check-inp").iCheck("check");
            $(".fa", this).removeClass("fa-square-o").addClass('fa-check-square-o');
        }
        $(this).data("clicks", !clicks);
    });


    Shadowbox.init({
        modal: true,
        language: 'pt',
        handleOversize:"resize",
        player: ['img','html','swf'],
        width:500,
        height:800
    });
});

