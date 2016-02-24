<?php

namespace Test\TestCRUD;

use InfraEstrutura\Exception\FacadeException;

class TestCRUDGenerics extends \PHPUnit_Framework_TestCase {

    protected $facadeObject;
    protected $beanObject;
    protected $updateMethod;

    /**
     * @test
     */
    public function deveSalvarBean() {
        try {
            $this->assertTrue($this->facadeObject->salvar($this->beanObject));
        } catch (FacadeException $ex) {
            $this->Fail($ex->getMessage());
        }
    }

    /**
     * @test
     */
    public function deveConsultarBean() {
        try {
            $beanObjectDatabase = $this->facadeObject->buscarPorID(1);
            $this->assertTrue($this->beanObject->__toString() == $beanObjectDatabase->__toString());
        } catch (FacadeException $ex) {
            $this->Fail($ex->getMessage());
        }
    }

    /**
     * @test
     */
    public function deveAtualizarBean() {
        $beanObjectDatabase = $this->facadeObject->buscarPorID(1);
        
        if(isset($this->updateMethod)){
           foreach ($this->updateMethod as $value) {
                if (method_exists($beanObjectDatabase, $value[0])) {
                    call_user_func(array($beanObjectDatabase, $value[0]), $value[1]);
                }
            } 
        }
        
        $this->facadeObject->atualizar($beanObjectDatabase);
        
        $beanObjectDatabaseAtualizado = $this->facadeObject->buscarPorID(1);
        
        $this->assertTrue($beanObjectDatabase->__toString() == $beanObjectDatabaseAtualizado->__toString());
    }
    
    /**
     * @test
     */
    public function deveConsultarTodos(){
        try {
            $arrayObjetos = $this->facadeObject->buscarTodos();
            $this->assertEquals(count($arrayObjetos), 1);
        } catch (FacadeException $ex) {
            $this->Fail($ex->getMessage());
        }
    }

    /**
     * @test
     */
    public function deveExcluirBean() {
        try {
            $beanObjectDatabase = $this->facadeObject->buscarPorID(1);
            
            $this->facadeObject->excluir($beanObjectDatabase);

            $beanObjectDatabase = $this->facadeObject->buscarPorID(1);
            $this->assertTrue(count($beanObjectDatabase) == 0);
        } catch (FacadeException $ex) {
            $this->Fail($ex->getMessage());
        }
    }
    
    
}
