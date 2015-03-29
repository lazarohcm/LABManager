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
            $arrayLaboratorios = $facade->findAll();
        } catch (Exception $ex) {
            throw new Exception($ex->getMessage());
        }

        return $arrayLaboratorios;
    }
    
    public function buscarPorSigla($sigla){
        $facade = new LaboratorioFacade();
        try {
            $laboratorio = $facade->findOneBy(array('sigla'=>$sigla));
        } catch (Exception $ex) {
            throw new Exception($ex->getMessage());
        }
        return $laboratorio;
    }
    
    public function buscarTodosArray(){
        $facade = new LaboratorioFacade();
        try {
            $arrayLaboratorios = $facade->findAll();
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
            $laboratorio = $facade->findById($id);
        } catch (Exception $ex) {
            throw new Exception($ex->getMessage());
        }
        if($laboratorio == NULL){
            throw new Exception('Laboratório não encontrado');
        }else{
           $array = array('nome' => $laboratorio->getNome(), 'descricao' => $laboratorio->getDescricao(),
               'telefone' => $laboratorio->getTelefone(), 'capa' => stream_get_contents($laboratorio->getCapa()), 'sigla' => $laboratorio->getSigla()); 
        }  
        return $array;
    }

    public function salvar($arrayLaboratorio) {
        $facade = new LaboratorioFacade();
        $laboratorio = new Laboratorio();
        if(strlen($arrayLaboratorio['nome']) < 4){
            throw new Exception('O nome do laboraorio é muito pequeno');
        }
        
        $laboratorio->setNome($arrayLaboratorio['nome']);
        $laboratorio->setDescricao($arrayLaboratorio['descricao']);
        $laboratorio->setTelefone($arrayLaboratorio['telefone']);
        $laboratorio->setCapa($arrayLaboratorio['capa']);
        $laboratorio->setSigla($arrayLaboratorio['sigla']);
        try {
            $facade->save($laboratorio);
        } catch (Exception $ex) {
            throw new Exception($ex->getMessage());
        }
        return TRUE;
    }
    
    public function atualizar($arrayLaboratorio){
        $facade = new LaboratorioFacade();
        $laboratorio = new Laboratorio();
        $laboratorio = $facade->findById($arrayLaboratorio['id']);
        if($laboratorio != NULL){
            $laboratorio->setNome($arrayLaboratorio['nome']);
            $laboratorio->setDescricao($arrayLaboratorio['descricao']);
            $laboratorio->setTelefone($arrayLaboratorio['telefone']);
            $laboratorio->setCapa($arrayLaboratorio['capa']);
            $laboratorio->setSigla($arrayLaboratorio['sigla']);
            try{
                $facade->update($laboratorio);
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
            $lab = $facade->findById($idLaboratorio);
            $id = $facade->delete($lab);
        } catch (Exception $ex) {
            throw new Exception($ex->getMessage());
        }
        return $id;
    }

}
