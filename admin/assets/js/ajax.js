$(function(){
     
    var alerts = ["alert", "alert-info", "alert-success", "alert-danger", "alert-warning"];
    var icones = ["fa fa-ban", "fa fa-info", "fa fa-warning", "fa fa-check"];

    $(".form").submit(function() {
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
            beforeSend: function(data) {
                 
                $.each(alerts, function(key, value) {
                    $('.alerta').removeClass(value);
                });
                
                $.each(icones,function(key, value) {
                    $('.icones').removeClass(value);
                });

                $(".fa").addClass("fa-spinner fa-spin");  
               
            },
            success:function(data){
                $(".fa").removeClass("fa-spinner fa-spin");
                
                  if (data.retorno) {
                    $('.alerta').addClass(data.retorno[0]);
                    $('.icones').addClass(data.retorno[1]);//icone tem que passar no indice 1
                    $('.titulo').html(data.retorno[2]);//Titulo no indice 2
                    $('.result').html(data.retorno[3]);//Mensagem de retorno no indice 3
                }
                  
                /*Redirecionar*/
                if (data.redirect) {
                    window.setTimeout(function() {
                        window.location.href = BASE + data.redirect[0];
                    }, data.redirect[1]);
                }
                
                
            }
        });
        return false;
    });
    /*Fim do motor AJAX*/
});













