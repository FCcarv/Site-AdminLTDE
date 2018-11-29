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

/*funçaõ de mater ou não o titulo do post*/
    $(".title_post").blur(function(){
        var post_title = $(this).val();
        var ctr = $(this).attr('data-controller');


        $.ajax({
            url: BASE + ctr,
            data:{post_title: post_title},
            type:"Post",
            dataType: 'json',
            success:function(data){

                if (data.retorno) {
                    $('.alerta').addClass(data.retorno[0]);
                    $('.icones').addClass(data.retorno[1]);//icone tem que passar no indice 1
                    $('.titulo').html(data.retorno[2]);//Titulo no indice 2
                    $('.result').html(data.retorno[3]);//Mensagem de retorno no indice 3
                }

                if(data.postExist == true){
                    $(".title_exist").val(1);
                }else{
                    $(".title_exist").val(0);
                }

            }

        });
    });


        $(document).on('click', ".mudarTitlePost", function(){
            $(".title_post").focus();
            removeBox();
        });

        $(document).on('click', ".manterTitlePost", function(){
            $(".title_exist").val(0);
            removeBox();
        });


//essa função apenas retira a box de  mensagem apos  ser concluída a ação
function removeBox(){
    $.each(alerts, function (key, value) {
        $('.alerta').removeClass(value);
    });

    $.each(icones, function (key, value) {
        $('.icones').removeClass(value);
    });

    $('.titulo').html('');//Titulo no indice 2
    $('.result').html('');//Mensagem de retorno no indice 3
}
//botão cancelar exclusão de usuarios
    $(document).on('click', ".cancel", function(){
        $('.alerta').removeClass('alert alert-danger');
        $('.icones').removeClass('fa fa-danger');
        $('.titulo').html('');//Titulo no indice 2
        $('.result').html('');//Mensagem de retorno no indice 3
    });

//botao excluir com msg o usuario
    $(document).on('click', ".esc", function(){
        $(this).fadeOut('3000', function () {
            $('.alerta').remove();
        });
    });


//botao excluir com msg usuario
   $(".deleteConfirm").click( function () {
        var deletar_id = $(this).attr('id');
        var controller = $(this).attr('data-controller');

            $('.alerta').addClass('alert alert-danger');
            $('.icones').addClass('fa fa-danger');
            $('.titulo').html('Deseja realmente excluir esse usuário?');
            $('.result').html('<p><button class="btn btn-warning exclui esc" data-controller="'+controller+'" id="'+deletar_id+'"><i class="glyphicon glyphicon-ban-circle"></i>Excluir</button><button class="btn btn-info pull-right cancel"><i class="fa fa-sign-out"></i>Cancelar</button></p>');

    });

    //excluir usuario
    $(document).on('click', ".exclui", function(){
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

                /*Redirecionar*/
                if (data.redirect) {
                    window.setTimeout(function () {
                        window.location.href = BASE + data.redirect[0];
                    }, data.redirect[1]);
                }
            }

        });
    });
});












