$(function () {

    var alerts = ["alert", "alert-info", "alert-success", "alert-danger", "alert-warning"];
    var icones = ["fa fa-ban", "fa fa-info", "fa fa-warning", "fa fa-check"];

    var button = $(':button');
    button.click(function () {
        if (this.id === 'idcad') {
            $('.status').each(function () {
                var input = $(this);
                input.val(1);
            });
        } else if (this.id === 'idcad2') {
            $('.status').each(function () {
                var input = $(this);
                input.val(0);
            });
        }
    });


    //seleciona junto com select o id da categoria e joga no value do input
    $('.select_pai').change(function() {
        var id_pai = $(this).find(':selected').attr('data-p');
        $('.cat_pai').val(id_pai);
    });

    $(".form").submit(function () {
        var form = $(this);
        var controller = form.attr('id');
        var dados = new FormData($(this)[0]);

         $.ajax({
            url: BASE + controller,
            data: dados,
            type: "POST",
            dataType: 'json',
            processData: false,
            contentType: false,
            beforeSend: function (data) {

                $.each(alerts, function (key, value) {
                    $('.alerta').removeClass(value);
                });

                $.each(icones, function (key, value) {
                    $('.icones').removeClass(value);
                });

                $(".fa").addClass("fa-spinner fa-spin");

            },

            success: function (data) {
                $(".fa").removeClass("fa-spinner fa-spin");

                if (data.retorno) {
                    $('.alerta').addClass(data.retorno[0]);
                    $('.icones').addClass(data.retorno[1]);//icone tem que passar no indice 1
                    $('.titulo').html(data.retorno[2]);//Titulo no indice 2
                    $('.result').html(data.retorno[3]);//Mensagem de retorno no indice 3
                }

                /*Redirecionar*/
                if (data.redirect) {
                    window.setTimeout(function () {
                        window.location.href = BASE + data.redirect[0];
                    }, data.redirect[1]);
                }


            }
        });
        return false;
    });/*Fim do motor AJAX*/

    //excluir categoria
    $('.del').click(function () {
        var id= $(this).attr('id');
        var cap = $(this).attr('data-controller');
        $.ajax({
            url: BASE + cap,
            data: {id: id},
            type: "POST",
            dataType: 'json',
            beforeSend: function (data) {
                $.each(alerts, function (key, value) {
                    $('.alert').removeClass(value);
                });
            },
            success: function (data) {
                if (data.retorno) {
                    $('.alerta').addClass(data.retorno[0]);
                    $('.icones').addClass(data.retorno[1]);//icone tem que passar no indice 1
                    $('.titulo').html(data.retorno[2]);//Titulo no indice 2
                    $('.result').html(data.retorno[3]);//Mensagem de retorno no indice 3
                }
            }

        });
    });
    //############# POSTS
    /*//CAPA VIEW
    $('.loadimage').change(function () {
        var input = $(this);
        var target = $('.' + input.attr('name'));
        var fileDefault = target.attr('default');

        if (!input.val()) {
            target.fadeOut('fast', function () {
                $(this).attr('src', fileDefault).fadeIn('slow');
            });
            return false;
        }

        if (this.files && this.files[0].type.match('image.*')) {
            var reader = new FileReader();
            reader.onload = function (e) {
                target.fadeOut('fast', function () {
                    $(this).attr('src', e.target.result).width('100%').height('100%').fadeIn('fast');
                });
            };
            reader.readAsDataURL(this.files[0]);
        } else {
            Trigger('<div class="trigger trigger_alert trigger_ajax"><b class="icon-warning">ERRO AO SELECIONAR:</b> O arquivo <b>' + this.files[0].name + '</b> não é válido! <b>Selecione uma imagem JPG ou PNG!</b></div>');
            target.fadeOut('fast', function () {
                $(this).attr('src', fileDefault).fadeIn('slow');
            });
            input.val('');
            return false;
        }
    });*/

/*
//MODAL UPLOAD
    $('.Control_imageupload_close').click(function () {
        $("div#" + $(this).attr("id")).fadeOut("fast");
    });*/

    //GALLERY IMAGE REMOVE
    $('.remove').click(function () {
        var imgDef = $(this);
        var imgDel = $(this).attr('id');
        var cap = $(this).attr('rel');
        var url = BASE + cap;
        var Delete = confirm('Deseja DELETAR essa imagem?');
        if (Delete === true) {
            $.post(url, {id:imgDel}, function () {
                imgDef.fadeOut('fast', function () {
                    $(this).remove();
                });
            },"json");
        }
    });

    //seleciona junto com select o id da categoria e joga no value do input
    $('.select_img').change(function() {
        var id_img = $(this).find(':selected').attr('data-p');
               $('.albImg').val(id_img);
          });

    $(".imgForm").submit(function () {
        var form = $(this);
        var controller = form.attr('id');
        var dados = new FormData($(this)[0]);

        $.ajax({
            url: BASE + controller,
            data: dados,
            type: "POST",
            dataType: 'json',
            processData: false,
            contentType: false,
            beforeSend: function (data) {

                $.each(alerts, function (key, value) {
                    $('.alerta').removeClass(value);
                });

                $.each(icones, function (key, value) {
                    $('.icones').removeClass(value);
                });

                $(".fa").addClass("fa-spinner fa-spin");

            },

            success: function (data) {
                $(".fa").removeClass("fa-spinner fa-spin");

                if (data.retorno) {
                    $('.alerta').addClass(data.retorno[0]);
                    $('.icones').addClass(data.retorno[1]);//icone tem que passar no indice 1
                    $('.titulo').html(data.retorno[2]);//Titulo no indice 2
                    $('.result').html(data.retorno[3]);//Mensagem de retorno no indice 3
                }

                /*Redirecionar*/
                if (data.redirect) {
                    window.setTimeout(function () {
                        window.location.href = BASE + data.redirect[0];
                    }, data.redirect[1]);
                }


            }
        });
        return false;
    });/*Fim do motor AJAX*/


    //remover imagens da galerias de fotos
    $('.removeFt').click(function () {
        var imgDef = $(this);
        var imgDel = $(this).attr('id');
        var cap = $(this).attr('data-ctr');
        var url = BASE + cap;

        var Delete = confirm('Deseja DELETAR essa imagem?');
        if (Delete === true) {
            $.post(url, {id:imgDel}, function () {
                imgDef.fadeOut('fast', function () {
                    $(this).remove();
                });
            },"json");
        }
    });
/*testes*/

    $(".title_post").blur(function(){


        $.ajax({
            url: "http://localhost/Portal-News/admin/galImages/formGalTeste",
            //data:dados,
            type:"Post",
            dataType: 'json',
            success:function(data){
                if(data.postExist == true){
                    $(".title_exist").val(1);
                }else{
                    $(".title_exist").val(0);
                }
            }

        });
    });
        $(document).on('click', ".mudarTitlePost", function(){
            $(".title_post").focus(alert("teste"));
        });

        $(document).on('click', ".manterTitlePost", function(){
            $(".title_exist").val(0);
        });


});












