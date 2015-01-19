<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

use LabManager\Facade\ProjetoFacade;
use Test\Providers;
use Test\TestCRUD\TestCRUDGenerics;
use LabManager\InfraDatabase\ArrayDatabaseConfig;
use LabManager\InfraDatabase\GerenciadorConexao;
/**
 * Description of ProjetoTest
 *
 * @author Lázaro Henrique <lazarohcm@gmail.com>
 * @version string
 */
class ProjetoTest extends TestCRUDGenerics {
    public function setUP(){
        $provider = new Providers();
        $projeto = $provider->ProjetoProvider();
        $this->beanObject = $projeto;
        $this->facadeObject = new ProjetoFacade();
        $this->updateMethod = array(array('setNome', 'Autoria'));
    }
    

    /**
     * @test
     */
    public function limparBancoDeDados() {
        $gerenciadorConexao = new GerenciadorConexao();
        $gerenciadorConexao->abrirConexao(ArrayDatabaseConfig::obterDatabaseConfig());

        $entityManager = $gerenciadorConexao->obterObjetoConexao();
        $entityManager->getConnection()->query('START TRANSACTION; SET FOREIGN_KEY_CHECKS=0; TRUNCATE PROJETO; SET FOREIGN_KEY_CHECKS=1; COMMIT;');
    }

}
