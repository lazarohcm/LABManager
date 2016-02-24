<?php

use Test\TestCRUD\TestCRUDGenerics;
use Test\Providers;
use LabManager\Facade\LaboratorioFacade;
use LabManager\InfraDatabase\ArrayDatabaseConfig;
use LabManager\InfraDatabase\GerenciadorConexao;
/**
 * Description of LaboratorioTest
 *
 * @author Lázaro Henrique <lazarohcm@gmail.com>
 * @version string
 */
class LaboratorioTest extends TestCRUDGenerics{
    public function setUP(){
        $provider = new Providers();
        $laboratorio = $provider->laboratorioProvider();
        $this->beanObject = $laboratorio;
        $this->facadeObject = new LaboratorioFacade();
        $this->updateMethod = array(array('setNome', 'Novo Lab'));
    }
    
    /**
     * @test
     */
    public function limparBancoDeDados() {
        $gerenciadorConexao = new GerenciadorConexao();
        $gerenciadorConexao->abrirConexao(ArrayDatabaseConfig::obterDatabaseConfig());
        
        $entityManager = $gerenciadorConexao->obterObjetoConexao();
        $entityManager->getConnection()->query('START TRANSACTION; SET FOREIGN_KEY_CHECKS=0; TRUNCATE LABORATORIO; SET FOREIGN_KEY_CHECKS=1; COMMIT;');
    }
}
