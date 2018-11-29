<?php
/**
 * Description of CHECK
 *
 * @author francisco
 */
class Check {

    private static $String;
    private static $Limite;
    private static $Format;
    private static $Data;




    public static function limitWords($string, $limite, $terminarCom = null) {
        self::$String = strip_tags(trim($string));
        self::$Limite = (int) $limite;
        $ArrayPalavras = explode(' ', self::$String);
        $NumPalavras = count($ArrayPalavras);
        $NovasPalavras = implode(' ', array_slice($ArrayPalavras, 0, self::$Limite));
        $TerminarCom = (empty($terminarCom) ? '...' : ' ' . $terminarCom);
        $Resultado = (self::$Limite < $NumPalavras ? $NovasPalavras . $TerminarCom : self::$String);
        return $Resultado;
    }
    public static function limitChars($string, $limite, $terminarCom = null, $ocorrencia = "") {
        self::$String = strip_tags($string);
        self::$Limite = (int) $limite;
        if (strlen(self::$String) <= self::$Limite) {
            return self::$String;
        } elseif ($ocorrencia != "") {
            $caracteres = strrpos(mb_substr(self::$String, 0, self::$Limite), $ocorrencia);
            return mb_substr(self::$String, 0, $caracteres) . $terminarCom;
        } else {
            $caracteres = mb_substr(self::$String, 0, self::$Limite);
            return $caracteres . $terminarCom;
        }
    }
    public static function slug($string) {
        self::$String = (string) $string;
        self::$String = preg_replace('/[\t\n]/', ' ', self::$String);
        self::$String = preg_replace('/\s{2,}/', ' ', self::$String);
        $list = array(
            'Š' => 'S',
            'š' => 's',
            'Đ' => 'Dj',
            'đ' => 'dj',
            'Ž' => 'Z',
            'ž' => 'z',
            'Č' => 'C',
            'č' => 'c',
            'Ć' => 'C',
            'ć' => 'c',
            'À' => 'A',
            'Á' => 'A',
            'Â' => 'A',
            'Ã' => 'A',
            'Ä' => 'A',
            'Å' => 'A',
            'Æ' => 'A',
            'Ç' => 'C',
            'È' => 'E',
            'É' => 'E',
            'Ê' => 'E',
            'Ë' => 'E',
            'Ì' => 'I',
            'Í' => 'I',
            'Î' => 'I',
            'Ï' => 'I',
            'Ñ' => 'N',
            'Ò' => 'O',
            'Ó' => 'O',
            'Ô' => 'O',
            'Õ' => 'O',
            'Ö' => 'O',
            'Ø' => 'O',
            'Ù' => 'U',
            'Ú' => 'U',
            'Û' => 'U',
            'Ü' => 'U',
            'Ý' => 'Y',
            'Þ' => 'B',
            'ß' => 'Ss',
            'à' => 'a',
            'á' => 'a',
            'â' => 'a',
            'ã' => 'a',
            'ä' => 'a',
            'å' => 'a',
            'æ' => 'a',
            '@' => '-',
            'ç' => 'c',
            'è' => 'e',
            'é' => 'e',
            'ê' => 'e',
            'ë' => 'e',
            'ì' => 'i',
            'í' => 'i',
            'î' => 'i',
            'ï' => 'i',
            'ð' => 'o',
            'ñ' => 'n',
            'ò' => 'o',
            'ó' => 'o',
            'ô' => 'o',
            'õ' => 'o',
            'ö' => 'o',
            'ø' => 'o',
            'ù' => 'u',
            'ú' => 'u',
            'û' => 'u',
            'ý' => 'y',
            'ý' => 'y',
            'þ' => 'b',
            'ÿ' => 'y',
            'Ŕ' => 'R',
            'ŕ' => 'r',
            '#' => '-',
            '$' => '-',
            '%' => '-',
            '&' => '-',
            '*' => '-',
            '()' => '-',
            '(' => '-',
            ')' => '-',
            '_' => '-',
            '-' => '-',
            '+' => '-',
            '=' => '-',
            '*' => '-',
            '/' => '-',
            '\\' => '-',
            '"' => '-',
            '{}' => '-',
            '{' => '-',
            '}' => '-',
            '[]' => '-',
            '[' => '-',
            ']' => '-',
            '?' => '-',
            ';' => '-',
            '.' => '-',
            ',' => '-',
            '<>' => '-',
            '°' => '-',
            'º' => '-',
            'ª' => '-',
            ':' => '-',
            '!' => '-',
            '¨' => '-',
            ' ' => '-'
        );
        self::$String = strtr(self::$String, $list);
        self::$String = preg_replace('/-{2,}/', '-', self::$String);
        self::$String = mb_strtolower(self::$String);
        return self::$String;
    }
    public static function isMail($email) {
        self::$String = (string) $email;
        self::$Format = '/[a-z0-9_\.\-]+@[a-z0-9_\.\-]*[a-z0-9_\.\-]+\.[a-z]{2,4}$/';
        if (preg_match(self::$Format, self::$String)):
            return true;
        else:
            return false;
        endif;
    }


    public static function Words($String, $Limite, $Pointer = null) {
        self::$Data = strip_tags(trim($String));
        self::$Format = (int) $Limite;

        $ArrWords = explode(' ', self::$Data);
        $NumWords = count($ArrWords);                                       //implode(' ', array_slice($array, $offset, $length));
        $NewWords = implode(' ', array_slice($ArrWords, 0, self::$Format)); //$ArrWords =variavel
        //$offset = inicialização do contador.
        $Pointer = (empty($Pointer) ? '...' : ' ' . $Pointer);  //$Length = delimitador, do limite de palavras
        $Result = (self::$Format < $NumWords ? $NewWords . $Pointer : self::$Data);
        return $Result;
        //array_slice — Extrai uma parcela de um array
        //implode — Junta elementos de uma matriz em uma string
        //count — Conta o número de elementos de uma variável, ou propriedades de um objeto
        //explode — Divide uma string em strings
    }
    /**
     * <b>Tranforma URL:</b> Tranforma uma string no formato de URL amigável e retorna o a string convertida!
     * @param STRING $Name = Uma string qualquer
     * @return STRING = $Data = Uma URL amigável válida
     */
    public static function Name($Name) {
        self::$Format = array();
        self::$Format['a'] = 'ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜüÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûýýþÿRr"!@#$%&*()_-+={[}]/?;:.,\\\'<>°ºª';
        self::$Format['b'] = 'aaaaaaaceeeeiiiidnoooooouuuuuybsaaaaaaaceeeeiiiidnoooooouuuyybyRr                                 ';

        self::$Data = strtr(utf8_decode($Name), utf8_decode(self::$Format['a']), self::$Format['b']);
        self::$Data = strip_tags(trim(self::$Data));
        self::$Data = str_replace(' ', '-', self::$Data);
        self::$Data = str_replace(array('-----', '----', '---', '--'), '-', self::$Data);

        return strtolower(utf8_encode(self::$Data));
    }

    public static function Redirect($page = null){
        if($page != null){
            header("Location: ".BASE.$page);
            exit();
        }
        header("Location: ".BASE);
        exit();
    }

    /**
     * <b>Tranforma Data:</b> Transforma uma data no formato DD/MM/YY em uma data no formato TIMESTAMP!
     * @param STRING $Name = Data em (d/m/Y) ou (d/m/Y H:i:s)
     * @return STRING = $Data = Data no formato timestamp!
     */
    public static function Data($Data) {
        echo $Data;exit;

        self::$Format = explode(' ', $Data);
        self::$Data = explode('/', self::$Format[0]);

        if (empty(self::$Format[1])):
            self::$Format[1] = date('H:i:s');
        endif;

        self::$Data = self::$Data[2] . '-' . self::$Data[1] . '-' . self::$Data[0] . ' ' . self::$Format[1];
        return self::$Data;
    }

    /**
     * <b>Imagem Upload:</b> Ao executar este HELPER, ele automaticamente verifica a existencia da imagem na pasta
     * uploads. Se existir retorna a imagem redimensionada!
     * @return HTML = imagem redimencionada!
     */
    public static function Image($ImageUrl, $ImageDesc, $ImageW = null, $ImageH = null) {

        self::$Data = 'uploads/' . $ImageUrl;

        if (file_exists(self::$Data) && !is_dir(self::$Data)):
            $patch = HOME;
            $imagem = self::$Data;
            return "<img src=\"{$patch}/tim.php?src={$patch}/{$imagem}&w={$ImageW}&h={$ImageH}\" alt=\"{$ImageDesc}\" title=\"{$ImageDesc}\"/>";
        else:
            return false;
        endif;
    }

}