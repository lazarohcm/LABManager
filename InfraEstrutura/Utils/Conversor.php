<?php
/**
 * UFMA - LabManager 

 * @author Lázaro Henrique <lazarohcm@gmail.com>   
 * @version 1.0
 
 */

namespace InfraEstrutura\Utils;

/**
 * Funções de conversões.
 *
 * @package InfraEstrutura\Utils
 */
class Conversor {

	/**
	 * Wrapper para MD5
	 * @param  string $palavra
	 * @return string hash MD5
	 */
    public static function convertMD5($palavra){
        return md5(trim($palavra));
    }
    
    /**
	 * Wrapper para SHA1
	 * @param  string $palavra
	 * @return string hash SHA1
	 */
    public static function convertSHA1($palavra){
        return sha1($palavra);
    }
}
