<?php
/**
 * UFMA - LabManager 

 * @author Lázaro Henrique <lazarohcm@gmail.com>   
 * @version 1.0
 
 */

namespace InfraEstrutura\BancodeDados;

/**
 * Classe de domínio responsável por armazernar a configuração
 * de acesso do banco de dados.
 *
 * @package InfraEstrutura\BancodeDados
 */
abstract class AtributosConexao {

    /**
     * Propriedade privada
     * @var $host
     */
    private $host;

    /**
     * Propriedade privada
     * @var $user
     */
    private $user;

    /**
     * Propriedade privada
     * @var $password
     */
    private $password;

    /**
     * Propriedade privada
     * @var $dbname
     */
    private $dbname;

    /**
     * Propriedade privada
     * @var $charset
     */
    private $charset;
    
    /**
     * Inicializa os atributos de conexao da classe
     * @param string $host    
     * @param string $user    
     * @param string $password
     * @param string $dbname  
     * @param string $charset 
     */
    function __construct($host = "", $user = "", $password = "", $dbname = "", $charset = "") {
        $this->host = $host;
        $this->user = $user;
        $this->password = $password;
        $this->dbname = $dbname;
        $this->charset = $charset;
    }
    
    /**
     * retorna $host da classe
     * @return $host
     */
    public function getHost() {
        return $this->host;
    }

    /**
     * seta a propriedade $host da classe
     * @param $host
     */
    public function setHost($host) {
        $this->host = $host;
    }

    /**
     * retorna $user da classe
     * @return $user
     */
    public function getUser() {
        return $this->user;
    }

    /**
     * seta a propriedade $user da classe
     * @param $user
     */
    public function setUser($user) {
        $this->user = $user;
    }

    /**
     * retorna $password da classe
     * @return $password
     */
    public function getPassword() {
        return $this->password;
    }

    /**
     * seta a propriedade $password da classe
     * @param $password
     */
    public function setPassword($password) {
        $this->password = $password;
    }

    /**
     * retorna $dbname da classe
     * @return $dbname
     */
    public function getDbname() {
        return $this->dbname;
    }

    /**
     * seta a propriedade $dbname da classe
     * @param $dbname
     */
    public function setDbname($dbname) {
        $this->dbname = $dbname;
    }
    
    /**
     * retorna $charset da classe
     * @return $charset
     */
    public function getCharset() {
        return $this->charset;
    }

    /**
     * seta a propriedade $charset da classe
     * @param $charset
     */
    public function setCharset($charset) {
        $this->charset = $charset;
    }

}
