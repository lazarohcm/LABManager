<?php

use LabManager\Facade\LaboratorioFacade;
use LabManager\Bean\Laboratorio;

/**
 * Description of LaboratoriosModel
 *
 * @author lateds
 */
class Laboratoriomodel extends CI_Model {

    public function buscarTodos() {
        $facade = new LaboratorioFacade();
        try {
            $arrayLaboratorios = $facade->buscarTodos();
        } catch (Exception $ex) {
            throw new Exception($ex->getMessage());
        }

        return $arrayLaboratorios;
    }
    
    public function buscarPorNome($nome){
        $facade = new LaboratorioFacade();
        try {
            $laboratorio = $facade->buscarPorNome($nome);
        } catch (Exception $ex) {
            throw new Exception($ex->getMessage());
        }
        return isset($laboratorio[0]) ? $laboratorio[0] : NULL;
    }
    
    public function buscarTodosArray(){
        $facade = new LaboratorioFacade();
        try {
            $arrayLaboratorios = $facade->buscarTodos();
        } catch (Exception $ex) {
            throw new Exception($ex->getMessage());
        }
        $array = array();
        foreach ($arrayLaboratorios as $laboratorio){
            $array[$laboratorio->getId()] = $laboratorio->getNome();
        }

        return $array;
    }
    
    public function buscarPorId($id){
        $facade = new LaboratorioFacade();
        try {
            $laboratorio = $facade->buscarPorID($id);
        } catch (Exception $ex) {
            throw new Exception($ex->getMessage());
        }
        if($laboratorio == NULL){
            throw new Exception('Laboratório não encontrado');
        }else{
           $array = array('nome' => $laboratorio->getNome(), 'descricao' => $laboratorio->getDescricao(),
               'telefone' => $laboratorio->getTelefone(), 'capa' => $laboratorio->getCapa()); 
        }  
        return $array;
    }

    public function salvar($arrayLaboratorio) {
        $facade = new LaboratorioFacade();
        $laboratorio = new Laboratorio();
        $laboratorio->setNome($arrayLaboratorio['nome']);
        $laboratorio->setDescricao($arrayLaboratorio['descricao']);
        $laboratorio->setTelefone($arrayLaboratorio['telefone']);
        try {
            $lab = $facade->salvar($laboratorio);
        } catch (Exception $ex) {
            throw new Exception($ex->getMessage());
        }
        return array('nome'=> $lab->getNome(), 'descricao'=> $lab->getDescricao(), 'telefone'=> $lab->getTelefone(), 'id' => $lab->getId());
    }
    
    public function atualizar($arrayLaboratorio){
        $facade = new LaboratorioFacade();
        $laboratorio = new Laboratorio();
        $laboratorio = $facade->buscarPorID($arrayLaboratorio['id']);
        if($laboratorio != NULL){
            $laboratorio->setNome($arrayLaboratorio['nome']);
            $laboratorio->setDescricao($arrayLaboratorio['descricao']);
            $laboratorio->setTelefone($arrayLaboratorio['telefone']);
            $laboratorio->setCapa($arrayLaboratorio['capa']);
            try{
                $facade->atualizar($laboratorio);
            } catch (Exception $ex) {
                throw new Exception($ex->getMessage());
            }
        }else{
            throw new Exception('Laboratório não encontrado');
        }
    }
    
    public function remover($idLaboratorio){
        $facade = new LaboratorioFacade();
        try {
            $lab = $facade->buscarPorId($idLaboratorio);
            $id = $facade->excluir($lab);
        } catch (Exception $ex) {
            throw new Exception($ex->getMessage());
        }
        return $id;
    }

}
