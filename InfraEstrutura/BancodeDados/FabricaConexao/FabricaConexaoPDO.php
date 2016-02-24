<?php
/**
 * UFMA - LabManager 

 * @author Lázaro Henrique <lazarohcm@gmail.com>   
 * @version 1.0
 
 */

namespace InfraEstrutura\BancodeDados\FabricaConexao;
  
use \InfraEstrutura\BancodeDados\FabricaConexao\AbstractFabricaConexao;
use \InfraEstrutura\Exception\InfraEstruturaException;
use \InfraEstrutura\BancodeDados\AtributosConexao;

/**
 * InfraEstrutura
 * Fabrica conexão do tipo PDO
 * 
 * @package InfraEstrutura\BancodeDados\FabricaConexao
 */
class FabricaConexaoPDO extends AbstractFabricaConexao {
    
    /**
     * Cria instância de objeto PDO
     * @param AtributosConexao $configuracoes
     * @return PDO
     */
    protected function criarConexao(AtributosConexao $configuracoes) {
        try {
            $conexaoPDO = new \PDO($configuracoes->getDsn(), $configuracoes->getUser(), $configuracoes->getPassword());            
            $conexaoPDO->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $exc) {
            throw new InfraEstruturaException($exc->getMessage(), $exc->getCode(), $exc->getPrevious());
        } catch (\Exception $exc) {
            throw new InfraEstruturaException($exc->getMessage(), $exc->getCode(), $exc->getPrevious());
        }

        return $conexaoPDO;        
    }
}
