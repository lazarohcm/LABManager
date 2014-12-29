<?php
/**
 * UFMA - LabManager 

 * @author Lázaro Henrique <lazarohcm@gmail.com>   
 * @version 1.0
 
 */

namespace InfraEstrutura\Log;

/**
 * Classe para gerenciamento de log da aplicacao
 *
 * @package InfraEstrutura\Log
 */
class Log {    

    /**
     * Propriedade Privada
     * @var \Zend\Log\Logger $logger
     */
    private static $logger;
    
    /**
     * Cria o log
     */
    private static function createLogger() {
        self::$logger = new \Zend\Log\Logger();
    }
    
    /**
     * Retira ponteiro da propriedade $logger     
     */
    public static function destroyLogger() {
        self::$logger = NULL;
    }
    
    /**
     * Log de erro
     * @param  string $pathLog caminho do erro
     * @param  string $message mensagem de erro
     * @return boolean
     */
    public static function err($pathLog, $message) {
        self::createLogger();
        self::$logger->addWriter(new \Zend\Log\Writer\Stream($pathLog . DIRECTORY_SEPARATOR . "err.log"));
        self::$logger->err($message);
        self::destroyLogger();
        return TRUE;
    }

    /**
     * Log de info
     * @param  string $pathLog caminho do erro
     * @param  string $message mensagem de erro
     * @return boolean
     */
    public static function info($pathLog, $message) {
        self::createLogger();
        self::$logger->addWriter(new \Zend\Log\Writer\Stream($pathLog . DIRECTORY_SEPARATOR . "info.log"));
        self::$logger->info($message);
        self::destroyLogger();
        return TRUE;
    }

    /**
     * Log de notice
     * @param  string $pathLog caminho do erro
     * @param  string $message mensagem de erro
     * @return boolean
     */
    public static function notice($pathLog, $message) {
        self::createLogger();
        self::$logger->addWriter(new \Zend\Log\Writer\Stream($pathLog . DIRECTORY_SEPARATOR . "notice.log"));
        self::$logger->notice($message);
        self::destroyLogger();
        return TRUE;
    }

    /**
     * Log de warn
     * @param  string $pathLog caminho do erro
     * @param  string $message mensagem de erro
     * @return boolean
     */
    public static function warn($pathLog, $message) {
        self::createLogger();
        self::$logger->addWriter(new \Zend\Log\Writer\Stream($pathLog . DIRECTORY_SEPARATOR . "warn.log"));
        self::$logger->warn($message);
        self::destroyLogger();
        return TRUE;
    }

}
