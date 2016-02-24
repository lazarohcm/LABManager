<?php
/**
 * UFMA - LabManager 

 * @author Lázaro Henrique <lazarohcm@gmail.com>   
 * @version 1.0
 
 */

namespace InfraEstrutura\Utils;

/**
 * Utilidades para manipulacao de array
 * @package InfraEstrutura\Utils
 */
class ArrayUtil {

    /**
     * Converte um array para uma lista html
     * @param  array  $array
     * @return HTML lista <ul>
     */
    public static function toListArrayHtml(array $array) {
        $out = "<ul>";
        
        foreach ($array as $var) {
            if (is_array($var)) {
                $out .= '<ul>' . self::toListArrayHtml($var) . '</ul>';
            } else {
                $out .= "<li>" . $var . "</li>";
            }
        }
        
        return $out . "</ul>";
    }
    
}
