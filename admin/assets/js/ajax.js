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
                    $('.alert').removeClass(value);
                });
                $(".fa").addClass("fa-spinner fa-spin");  
                     /*$.each(alerts, function(key, value) {
                    $('.icones').removeClass(value);
                });*/
                
               
            },
            success: function(data) {
                $(".fa").removeClass("fa-spinner fa-spin");
                
                  if (data.retorno) {
                    $('.alert').addClass(data.retorno[0]);
                    $('.result').html(data.retorno[1]);
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













