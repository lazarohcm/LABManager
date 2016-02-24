<?php
/**
 * UFMA - LabManager 

 * @author Lázaro Henrique <lazarohcm@gmail.com>   
 * @version 1.0
 
 */

namespace InfraEstrutura\BancodeDados\FabricaConexao;

use InfraEstrutura\BancodeDados\AtributosConexao;
use InfraEstrutura\BancodeDados\EnumTipoConexao;
use InfraEstrutura\BancodeDados\FabricaConexao\FabricaConexaoPDO;
use InfraEstrutura\BancodeDados\FabricaConexao\FabricaConexaoDoctrine;

/**
 * Classe abstrata para criação do objeto Fabrica
 *
 * @package InfraEstrutura\BancodeDados\FabricaConexao
 */
abstract class AbstractFabricaConexao {    
    /**
     * Funcao que retorna null
     * @return NULL
     */
    public static function destroy(){
        return NULL;
    }
    
    /**
     * Fabrica que cria conexão com banco de dados
     * 
     * Possibilita a criação de 3 tipos de conexão:
     * Doctrine2: Framework na de ORM
     * Mysqli: Extensão PHP
     * PDO: PHP Data Object
     * 
     * @param \InfraEstrutura\BancodeDados\EnumTipoConexao $tipoConexao
     * @param \InfraEstrutura\BancodeDados\AtributosConexao $configuracoes
     * @return Object
     * @throws Exception
     */    
    public static function factory($tipoConexao, AtributosConexao $configuracoes){
        $objetoFabrica = NULL;
        
        switch ($tipoConexao) {
            case EnumTipoConexao::__DOCTRINE2:
                $objetoFabrica = new FabricaConexaoDoctrine();
                
                break;    
            case EnumTipoConexao::__PDO:
                $objetoFabrica = new FabricaConexaoPDO();                

                break;
            default:
                $objetoFabrica = new FabricaConexaoPDO();
                
                break;
        }
        
        return $objetoFabrica->criarConexao($configuracoes);
    }    
    
    /**
     * Fabrica que cria conexao com banco de dados
     * @param  InfraEstrutura\BancodeDados\AtributosConexao $configuracoes
     */
    abstract protected function criarConexao(AtributosConexao $configuracoes);
}

?>
