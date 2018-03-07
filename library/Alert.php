<?php

/*
 * Essa classe é usada apenas para alertas do sistema e pode usar um parametro  ou dois pararametros como disse o segundo parmaetro é opcional.
 * Parq usdar somente um parametro , dessa forma por exemplo o titulo ja erxiste como informação ou sucesso  etc .
 * Da mesma forma pode colocar um titulo diferente que seja esses padrãó, assim é só colocar o outro parametro.
 * Por exemplo ->$dados['retorno'] = Alert::AjaxWarning("alerta senha com mais de 8 digitos","Presta atenção");
 */

/**
 * Description of Alert
 *
 * @author francisco
 */
class Alert 
{
      public static function AjaxInfo($msg, $titulo = "")
    {
        if ($titulo != ''){
            return ["alert alert-info", "fa fa-info", $titulo, $msg];
        }
            return ["alert alert-info", "fa fa-info", "Informação!", $msg]; 
        
    }
     public static function AjaxSuccess($msg, $titulo = "")
    {
        if ($titulo != ''){
            return ["alert alert-success","fa fa-check", $titulo, $msg];
        }
            return ["alert alert-success", "fa fa-check", "Sucesso!", $msg];  

    }
    
       public static function AjaxWarning($msg, $titulo = "")
    {
        if ($titulo != ''){
            return ["alert alert-warning","fa fa-warning", $titulo, $msg];
        }
            return ["alert alert-warning", "fa fa-warning", "Atenção!", $msg];  

    }
    
       public static function AjaxDanger($msg, $titulo = "")
    {
        if ($titulo != ''){
            return ["alert alert-danger","fa fa-ban", $titulo, $msg];
        }
            return ["alert alert-danger", "fa fa-ban", "Error!", $msg];  

    }
    
        public static function AjaxRedirect($praOnde, $tempo = null)
    {
        if ($tempo != null):
            return [$praOnde, $tempo];
        else:
            return [$praOnde, 3200];
        endif;
    }
}
