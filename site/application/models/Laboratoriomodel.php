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
