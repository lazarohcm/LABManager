<?php
/**
 * UNA-SUS/UFMA - SigUSeguranca 
 * @copyright 2014 CTI UNA-SUS/UFMA
 * @author sit-unasus <lateds.unasus@gmail.com>   
 * @version 1.0
 * @link: http://www.unasus.ufma.br/sigu/
 */

namespace SigUSeguranca\InfraDatabase\InterfaceInfraDatabase;

/**
 * Camada InfraDatabase
 * A Interface Gerenciadora de Conexão irá manipular a conexão com o banco do dados
 * específico do domínio.  
 * @package SigUSeguranca\InfraDatabase\InterfaceInfraDatabase
 */
interface IGerenciadorConexaoDAO {
    
    /**
     * Abre a conexão de um domínio com banco de dados
     * Faz uso da Fábrica de Conexão e dependendo do domínio poderá
     * instanciar uma classe de conexão
     * 
     * @param Array $arrayConfig
     */
    function abrirConexao(array $arrayConfig);
    
    /**
     * Finaliza a conexão com um banco de dados
     */
    function fecharConexao();
    
    /**
     * Retorna o objeto de Conexao
     */
    function obterObjetoConexao();
    
    /**
     * Cria um objeto de conexão com base no retorno da classe
     * Dominio\ArrayDatabaseConfig;
     * 
     * @param $arrayConfig
     */
    function criarObjetoParametroConexao(array $arrayConfig);
    
    /**
     * Inicia um transação com o objeto de conexão     
     */
    function abrirTransacao();
    
    /**
     * Executa o comite no objeto de transação
     */
    function comitarTransacao();
    
    /**
     * Executa o rollback no objeto de transação
     */
    function rollbackTransacao();
}
