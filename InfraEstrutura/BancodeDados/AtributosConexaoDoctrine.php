<?php
/**
 * UFMA - LabManager 

 * @author Lázaro Henrique <lazarohcm@gmail.com>   
 * @version 1.0
 
 */

namespace InfraEstrutura\BancodeDados;

/**
 * Classe de domínio responsável por armazernar a configuração
 * de acesso do banco de dados (Doctrine2).
 *
 * Sobre o 'dbdriver'
 * Valores disponível conforme abaixo:
 * 
 *      pdo_mysql: A MySQL driver that uses the pdo_mysql PDO extension.
 *      pdo_sqlite: An SQLite driver that uses the pdo_sqlite PDO extension.
 *      pdo_pgsql: A PostgreSQL driver that uses the pdo_pgsql PDO extension.
 *      pdo_oci: An Oracle driver that uses the pdo_oci PDO extension. Note that this 
 *               driver caused problems in our tests. 
 *               Prefer the oci8 driver if possible.
 *      pdo_sqlsrv: A Microsoft SQL Server driver that uses pdo_sqlsrv PDO
 *      oci8: An Oracle driver that uses the oci8 PHP extension.
 *  Doctrine-2 Documentation
 *
 * @package InfraEstrutura\BancodeDados
 */
class AtributosConexaoDoctrine extends AtributosConexao {

    /**
     * Propriedade privada
     * @var $dbdriver
     */
    private $dbdriver;

    /**
     * Propriedade privada
     * @var $path_model
     */
    private $path_model;    
    
    /**
     * Construtor
     * 
     * @param string $host          Host para acesso ao banco de dados
     * @param string $user          Usuário para acesso ao banco de dados
     * @param string $password      Senha para acesso ao banco de dados
     * @param string $dbname        Nome do banco de dados
     * @param string $charset       Charset do banco de dados
     * @param string $dbdriver      Driver para o acesso ao banco de dados pdo_mysql, pdo_sqlite, pdo_pgsql, pdo_oci, pdo_sqlsrv, oci8
     * @param string $path_model
     */
    function __construct($host = "", $user = "", $password = "", $dbname = "", $charset = "", $dbdriver = "", $path_model = "") {
        parent::__construct($host, $user, $password, $dbname, $charset);
        $this->dbdriver = $dbdriver;
        $this->path_model = $path_model;
    }
    
    /**
     * retorna $dbdriver da classe
     * @return $dbdriver
     */
    public function getDbdriver() {
        return $this->dbdriver;
    }

    /**
     * seta a propriedade $dbdriver da classe
     * @param $dbdriver
     */
    public function setDbdriver($dbdriver) {
        $this->dbdriver = $dbdriver;
    }

    /**
     * retorna $path_model da classe
     * @return $path_model
     */
    public function getPath_model() {
        return $this->path_model;
    }

    /**
     * seta a propriedade $path_model da classe
     * @param $path_model
     */
    public function setPath_model($path_model) {
        $this->path_model = $path_model;
    }
}