<?php
/**
 * UFMA - LabManager 

 * @author Lázaro Henrique <lazarohcm@gmail.com>   
 * @version 1.0
 
 */

namespace LabManager\Facade;

use LabManager\InfraDatabase\GerenciadorConexao;
use LabManager\InfraDatabase\ArrayDatabaseConfig;
use InfraEstrutura\Exception\InfraEstruturaException;
use InfraEstrutura\Exception\FacadeException;
use InfraEstrutura\Exception\NegocioException;
use InfraEstrutura\Exception\MethodNotImplementException;

/**
 * Camada Facade
 *
 * @package SigUSeguranca\DAO
 */
abstract class AbstractFacade {
    
    /**
     * objeto do negocio
     * @var $negocio
     */
    private $negocio;

    /**
     * gerenciador de conexao
     * @var $gerenciadorConexao
     */
    private $gerenciadorConexao;
    
    /**
     * Construtor - instancia os objetos que serão usados internamente     
     */
    public function __construct() {
        $this->gerenciadorConexao = new GerenciadorConexao();
    } 
    
    /**
     * Chama uma função $name de um objeto $negocio (função setNegocio) passando $arguments
     * @param  $name nome da função
     * @param  $arguments argumentos da função
     * @return retorno da função $name chamada
     */
    public function __call($name, $arguments) {
        if (!method_exists($this->negocio, $name)) {
            throw new MethodNotImplementException('O método solicitado ao negócio não foi implementado.');
        }
                
        try {
            $this->gerenciadorConexao->abrirConexao(ArrayDatabaseConfig::obterDatabaseConfig());
        } catch (InfraEstruturaException $ex) {
            throw new FacadeException($ex->getMessage(), $ex->getCode(), $ex->getPrevious());
        }

        try {
            $parametro = (count($arguments) == 0 ? NULL : $arguments[0]);
            
            $this->gerenciadorConexao->abrirTransacao();

            $retorno = call_user_func(array($this->negocio, $name), $parametro);

            $this->gerenciadorConexao->comitarTransacao();
        } catch (InfraEstruturaException $ex) {
            $this->gerenciadorConexao->rollbackTransacao();
            throw new FacadeException($ex->getMessage(), $ex->getCode(), $ex->getPrevious());
        } catch (NegocioException $ex) {
            $this->gerenciadorConexao->rollbackTransacao();
            throw new FacadeException($ex->getMessage(), $ex->getCode(), $ex->getPrevious());
        }

        $this->gerenciadorConexao->fecharConexao();

        return $retorno;
    }
    
    /**
     * Define o negocio para toda classe
     * @param $negocio object
     */
    public function setNegocio($negocio) {
        $this->negocio = $negocio;
    }
    
}
