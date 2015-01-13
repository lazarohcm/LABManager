<?php

use Test\TestCRUD\TestCRUDGenerics;
use Test\Providers;
use LabManager\Facade\MembroFacade;
use LabManager\InfraDatabase\ArrayDatabaseConfig;
use LabManager\InfraDatabase\GerenciadorConexao;
/**
 * Description of LaboratorioTest
 *
 * @author Lázaro Henrique <lazarohcm@gmail.com>
 * @version string
 */
class MembroTest extends TestCRUDGenerics{
    public function setUP(){
        $provider = new Providers();
        $membro = $provider->membroProvider();
        $this->beanObject = $membro;
        $this->facadeObject = new MembroFacade();
        $this->updateMethod = array(array('setNome', 'Lukas'));
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
