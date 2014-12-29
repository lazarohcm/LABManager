<?php
/**
 * UFMA - LabManager 

 * @author Lázaro Henrique <lazarohcm@gmail.com>   
 * @version 1.0
 
 */

namespace InfraEstrutura\Utils;

/**
 * Funções de Data
 *
 * @package InfraEstrutura\Utils
 */
class DateUtils {
    
    const __FORMAT_DATE_DATABASE = "Y-m-d",
          __FORMAT_DATE_BR = "d/m/Y",
          __FORMAT_DATE_US = "m/d/Y",
          __FORMAT_DATETIME_DATABASE = "Y-m-d H:i:s",
          __FORMAT_DATETIME_BR = "d/m/Y H:i:s",
          __FORMAT_DATETIME_US = "m/d/Y H:i:s";    
    
    /**
     * Retorna a data corrente conforme uma mascara.
     * 
     * @param date $format_ENUM __FORMAT_DATE_DATABASE, __FORMAT_DATE_BR, __FORMAT_DATE_US, __FORMAT_TIME_DATABASE, __FORMAT_TIME_BR, __FORMAT_TIME_US
     * @return date Retorna a data de hoje 
     */
    public static function hoje($format_ENUM = NULL){
        $dateFormat = new \Zend\I18n\View\Helper\DateFormat;
        
        $data = new \DateTime(null, new \DateTimeZone($dateFormat->getTimezone()));        
        return $data->format(( $format_ENUM == NULL ? self::__FORMAT_DATE_DATABASE : $format_ENUM ));
    }
    
    /**
     * Formato de data
     * @param string $date Data em formato String
     * @param string $format_ENUM __FORMAT_DATE_DATABASE, __FORMAT_DATE_BR, __FORMAT_DATE_US, __FORMAT_TIME_DATABASE, __FORMAT_TIME_BR, __FORMAT_TIME_US
     * 
     * @return date Retorna data formatada
     */    
    public static function dateFormat($date, $format_ENUM){
        try {
            $date = new \DateTime($date);
            return $date->format($format_ENUM);
        } catch (\Exception $exc) {
            throw new \InfraEstrutura\Exception\InfraEstruturaException($exc->getMessage(), $exc->getCode());
        }                    
    }
}
