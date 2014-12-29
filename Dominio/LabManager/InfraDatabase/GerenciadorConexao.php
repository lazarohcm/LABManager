<?php
/**
 * UFMA - LabManager 

 * @author Lázaro Henrique <lazarohcm@gmail.com>   
 * @version 1.0
 
 */

namespace LabManager\InfraDatabase;

use LabManager\InfraDatabase\InterfaceInfraDatabase\IGerenciadorConexaoDAO;
use LabManager\DAO\DAOGenericImpl;
use InfraEstrutura\BancodeDados\AtributosConexaoDoctrine;
use InfraEstrutura\BancodeDados\FabricaConexao\AbstractFabricaConexao;
use InfraEstrutura\BancodeDados\EnumTipoConexao;
use InfraEstrutura\Exception\DaoException;

/**
 * Camada InfraDatabase
 * Classe que irá gerenciar a conexão com o banco de dados específico do domínio
 * @author sit-unasus   
 * @version 1.0
 * @package SigUSeguranca\InfraDatabase
 */
class GerenciadorConexao implements IGerenciadorConexaoDAO {
    
    /**
     * gerenciador de entidade
     * @var $entityManager
     */
    private $entityManager;
    
    /**
     * Abre a conexão com o banco de dados dependendo do domínio
     * @param DatabaseConfig $arrayConfig     
     * @return EntityManager (Doctrine)
     * @throws InfraEstrutura\Exception\InfraestruturaException
     */
    public function abrirConexao(array $arrayConfig){
        $this->entityManager = AbstractFabricaConexao::factory(EnumTipoConexao::__DOCTRINE2, $this->criarObjetoParametroConexao($arrayConfig[MODO_DESENVOLVIMENTO_DOMINIO]));
        DAOGenericImpl::setDefaultConnectionDataBase($this->entityManager);
        return $this->obterObjetoConexao();

    }
    
    /**
     * Inicia um transação com o objeto de conexão        
     */
    public function abrirTransacao() {
        $this->entityManager->getConnection()->beginTransaction();
    }

    /**
     * Executa o commit no objeto de transação
     */
    public function comitarTransacao() {
        $this->entityManager->getConnection()->commit();
    }

    /**
     * Cria um objeto de conexão com base no retorno da classe Dominio\ArrayDatabaseConfig;
     * @param Array $arrayConfig
     * @return InfraEstrutura\BancodeDados\AtributosConexaoDoctrine
     */    
    public function criarObjetoParametroConexao(array $arrayConfig) {
        $atributoConexaoDoctrine = new AtributosConexaoDoctrine;

        $atributoConexaoDoctrine->setDbdriver($arrayConfig['dbdriver']);
        $atributoConexaoDoctrine->setDbname($arrayConfig['database']);
        $atributoConexaoDoctrine->setHost($arrayConfig['hostname']);
        $atributoConexaoDoctrine->setUser($arrayConfig['username']);
        $atributoConexaoDoctrine->setPassword($arrayConfig['password']);
        $atributoConexaoDoctrine->setPath_model(CAMINHO_APLICACAO_DOMINIO);
        $atributoConexaoDoctrine->setCharset($arrayConfig['charset']);

        return $atributoConexaoDoctrine;        
    }

    /**
     * Finaliza a conexão com um banco de dados
     */
    public function fecharConexao() {
        $this->entityManager = AbstractFabricaConexao::destroy();
    }
    
    /**
     * Retorna o objeto de Conexao
     *      
     * @return EntityManager (Doctrine)
     * @throws InfraEstrutura\Exception\DaoException
     */
    public function obterObjetoConexao() {
        if ($this->entityManager === NULL){
            throw new DaoException("Objeto de conexão não iniciado", 0, NULL);            
        }
        return $this->entityManager;
    }
    
    /**
     * Executa o rollback no objeto de transação
     */
    public function rollbackTransacao() {
        $this->entityManager->getConnection()->rollback();
    }    
}
