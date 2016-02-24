<?php

use LabManager\Facade\ProjetoFacade;
use LabManager\Bean\Projeto;

/**
 * Description of Projetosmodel
 *
 * @author Lázaro Henrique <lazarohcm@gmail.com>
 * @version string
 */
class Projetosmodel extends CI_Model {

    public function buscarTodos() {
        $facade = new ProjetoFacade();
        try {
            $arrayProjetos = $facade->findAll();
        } catch (Exception $ex) {
            throw new Exception($ex->getMessage());
        }
        return $arrayProjetos;
    }

    public function buscarTodosArray() {
        $facade = new ProjetoFacade();
        try {
            $arrayProjetos = $facade->findAll();
        } catch (Exception $ex) {
            throw new Exception($ex->getMessage());
        }
        $array = array();
        foreach ($arrayProjetos as $projeto) {
            $array[$projeto->getId()] = $projeto->getNome();
        }

        return $array;
    }

    public function buscarPorId($id) {
        $facade = new ProjetoFacade();
        try {
            $projeto = $facade->findById($id);
        } catch (Exception $ex) {
            throw new Exception($ex->getMessage());
        }
        return $projeto;
    }

    public function remover($id) {
        $facade = new ProjetoFacade();
        $projeto = $facade->findById($id);

        try {
            $facade->delete($projeto);
        } catch (Exception $ex) {
            throw new Exception($ex->getMessage());
        }
        return TRUE;
    }

    public function cadastrar($arrayProjeto) {
        $facedeProjeto = new ProjetoFacade();
        $projeto = new Projeto();
        if ($arrayProjeto['laboratorio'] == 0 || !isset($arrayProjeto['laboratorio'])) {
            throw new Exception('Selecione um Laboraótrio');
        }
        if ($arrayProjeto['coordenador'] == 0 || !isset($arrayProjeto['coordenador'])) {
            throw new Exception('Selecione um Coordenador');
        }
        $idLab = $arrayProjeto['laboratorio'];
        $idCoordenador = $arrayProjeto['coordenador'];
        if ($arrayProjeto['nome'] == NULL || !isset($arrayProjeto['nome'])) {
            throw new Exception('Dê um nome ao projeto');
        }
        $projeto->setNome($arrayProjeto['nome']);
        $projeto->setTexto($arrayProjeto['descricao']);
        $projeto->setImagem($arrayProjeto['capa']);
        if (isset($arrayProjeto['inicio']) && $arrayProjeto['inicio'] != NULL) {
            $projeto->setData_inicio(DateTime::createFromFormat('d/m/Y', $arrayProjeto['inicio']));
        }

        if (isset($arrayProjeto['termino']) && $arrayProjeto['inicio'] != NULL) {
            $projeto->setData_termino(DateTime::createFromFormat('d/m/Y', $arrayProjeto['termino']));
        }
        try {
            $retorno = $facedeProjeto->salvar(array('projeto' => $projeto, 'idLab' => $idLab, 'idCoordenador' => $idCoordenador));
        } catch (Exception $ex) {
            throw new Exception($ex->getMessage());
        }
        return $retorno;
    }

    public function atualizar($arrayProjeto) {
        $facedeProjeto = new ProjetoFacade();
        $projeto = $facedeProjeto->findById($arrayProjeto['id']);
        $projeto->setNome($arrayProjeto['nome']);
        $projeto->setTexto($arrayProjeto['descricao']);
        if (isset($arrayProjeto['inicio']) && $arrayProjeto['inicio'] != NULL) {
            $projeto->setData_inicio(DateTime::createFromFormat('d/m/Y', $arrayProjeto['inicio']));
        }
        if (isset($arrayProjeto['termino']) && $arrayProjeto['termino'] != NULL) {
            $projeto->setData_termino(DateTime::createFromFormat('d/m/Y', $arrayProjeto['termino']));
        }
        $projeto->setImagem($arrayProjeto['capa']);
        $idLab = $arrayProjeto['laboratorio'];
        $idCoordenador = $arrayProjeto['coordenador'];
        try {
            $facedeProjeto->atualizar(array('projeto' => $projeto, 'idLab' => $idLab, 'idCoordenador' => $idCoordenador));
        } catch (Exception $ex) {
            throw new Exception($ex->getMessage());
        }
        return TRUE;
    }

}
