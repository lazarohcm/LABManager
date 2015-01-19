<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

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
            $arrayProjetos = $facade->buscarTodos();
        } catch (Exception $ex) {
            throw new Exception($ex->getMessage());
        }
        return $arrayProjetos;
    }

    public function cadastrar($arrayProjeto) {
        $facedeProjeto = new ProjetoFacade();
        $projeto = new Projeto();
        $projeto->setNome($arrayProjeto['nome']);
        $projeto->setTexto($arrayProjeto['descricao']);
        $projeto->setData_inicio(DateTime::createFromFormat('d/m/Y', $arrayProjeto['inicio']));
        if (isset($arrayProjeto['termino'])) {
            $projeto->setData_termino(DateTime::createFromFormat('d/m/Y', $arrayProjeto['termino']));
        }
        $projeto->setImagem($arrayProjeto['capa']);
        $idLab = $arrayProjeto['laboratorio'];
        $idCoordenador = $arrayProjeto['coordenador'];
        try {
            $retorno = $facedeProjeto->salvar(array('projeto' => $projeto, 'idLab' => $idLab, 'idCoordenador' => $idCoordenador));
        } catch (Exception $ex) {
            throw new Exception($ex->getMessage());
        }
        return $retorno;
    }

}
