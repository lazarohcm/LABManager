<?php
/**
 * UFMA - LabManager 

 * @author Lázaro Henrique <lazarohcm@gmail.com>   
 * @version 1.0
 
 */

namespace InfraEstrutura\BancodeDados;

use InfraEstrutura\BancodeDados\AtributosConexao;
use \InfraEstrutura\BancodeDados\DBDriver;

/**
 * Classe de domínio responsável por armazernar a configuração
 * de acesso do banco de dados (PDO).
 *
 * @package InfraEstrutura\BancodeDados
 */
class AtributosConexaoPDO extends AtributosConexao {

    /**
     * Fonte de dados
     * @var $dsn
     */
    private $dsn;

    /**
     * Porta de acesso ao serviço do banco
     * @var $port
     */
    private $port;

    /**
     * Inicializacao das informações para criar gerar um DSN
     * @param $dbDriver
     * @param $host    
     * @param $user    
     * @param $password
     * @param $dbname  
     * @param $port    
     * @param $charset 
     */
    public function __construct($dbDriver, $host, $user, $password, $dbname, $port, $charset) {
        parent::__construct($host, $user, $password, $dbname, $charset);

        $this->port = $port;
        $this->dsn = $this->gerarDsn($dbDriver);
    }

    /**
     * Recuperar informação do DSN
     * @return propriedade $dsn da classe
     */
    public function getDsn() {
        return $this->dsn;
    }

    /**
     * Define um valor para o DSN
     * @param $dsn
     */
    public function setDsn($dsn) {
        $this->dsn = $dsn;
    }

    /**
     * Recuperar informação da porta de conexao do serviço
     * @return propriedade $port da classe
     */
    public function getPort() {
        return $this->port;
    }

    /**
     * Define uma porta para conexao ao serviço de banco de dados
     * @param $port
     */
    public function setPort($port) {
        $this->port = $port;
    }

    /**
     * Retorna uma string de conexao (DSN)
     * @param  string $dbDriver Driver do BD
     * @return DSN string de conexao
     */
    public function gerarDsn($dbDriver) {
        switch ($dbDriver) {
            case DBDriver::PDO_Mysql:
                return "mysql:host=" . parent::getHost() . ";port=" . $this->port . ";dbname=" . parent::getDbname() . ';charset=' . parent::getCharset();
                break;
            case DBDriver::PDO_PGsql:

                break;
            default:
                return "mysql:host=" . parent::getHost() . ";port=" . $this->port . ";dbname=" . parent::getDbname(). ';charset=' . parent::getCharset();
                break;
        }
    }

}
