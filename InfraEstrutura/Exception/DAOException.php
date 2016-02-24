<?php
/**
 * UFMA - LabManager 

 * @author Lázaro Henrique <lazarohcm@gmail.com>   
 * @version 1.0
 
 */

namespace InfraEstrutura\Exception;

use Exception;

/**
 * Pacote de Exceções
 *
 * @package InfraEstrutura\Exception
 */
class DAOException extends Exception {

	/**
	 * Inicialização dos paramentos da Exception
	 * @param $message 
	 * @param $code    
	 * @param $previous
	 */
    public function __construct($message, $code = NULL, $previous = NULL) {
        parent::__construct($message, $code, $previous);
    }

    /**
     * Print da classe
     * @return string
     */
    public function __toString() {
        return parent::__toString();
    }
}
