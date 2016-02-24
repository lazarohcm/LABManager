<?php
namespace Test\TestCrud\Generic;

use SigUSeguranca\InfraDatabase\ArrayDatabaseConfig;
use SigUSeguranca\InfraDatabase\GerenciadorConexao;

/**
 * Description of ClearBase
 *
 * @author Lázaro Henrique
 */
class ClearBase extends \PHPUnit_Framework_TestCase{
    
    /**
     * @test
     */
    public function limparBancoDeDados() {
        $gerenciadorConexao = new GerenciadorConexao();
        $gerenciadorConexao->abrirConexao(ArrayDatabaseConfig::obterDatabaseConfig());
        
        $entityManager = $gerenciadorConexao->obterObjetoConexao();
        $entityManager->getConnection()->query('START TRANSACTION; SET FOREIGN_KEY_CHECKS=0; TRUNCATE SE_009_PROJETO; TRUNCATE SE_006_LOTACAO; TRUNCATE SE_007_SETOR; '
                . 'TRUNCATE SE_002_PAIS; TRUNCATE SE_003_ESTADO; TRUNCATE SE_004_CIDADE; TRUNCATE SE_001_PESSOA; TRUNCATE RE_005_FUNCIONARIO; TRUNCATE SE_014_PERFIL_ACESSO;'
                . 'TRUNCATE SE_008_EMPRESA; TRUNCATE SE_010_MODULO_; TRUNCATE SE_011_FUNCIONALIDADE;TRUNCATE SE_012_MODULO_DISPONIVEL;TRUNCATE SE_013_PERFIL_FUNCIONALIDADE;'
                . 'TRUNCATE SE_015_MODULO_PERFIL;TRUNCATE SE_016_ACESSO; TRUNCATE SE_017_SESSAO; SET FOREIGN_KEY_CHECKS=1; COMMIT;');
    }
}
