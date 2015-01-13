<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

use LabManager\Facade\MembroFacade;
use LabManager\Bean\Membro;

/**
 * Description of membrosmodel
 *
 * @author Lázaro Henrique <lazarohcm@gmail.com>
 * @version string
 */
class MembrosModel extends CI_Model {

    public function cadastrar($arrayMembro) {
        $facedeMembro = new MembroFacade();
        $membro = new Membro();
        $membro->setNome($arrayMembro['nome']);
        $membro->setUsuario($arrayMembro['usuario']);
        $membro->setEmail($arrayMembro['email']);
        $membro->setSenha(md5('123456'));
        $membro->setData_entrada(new \DateTime($arrayMembro['entrada']));
        $membro->setAtivo($arrayMembro['ativo'] === 'true' ? true : false);
        $membro->setAdmin($arrayMembro['admin'] === 'true' ? true : false);
        $membro->setFoto($arrayMembro['foto']);
        $idLab = $arrayMembro['laboratorio'];
        $tipo = $arrayMembro['tipo'];
        try {
            $retorno = $facedeMembro->salvar(array('membro' => $membro, 'idLab' => $idLab, 'tipo' => $tipo));
        } catch (Exception $ex) {
            throw new Exception($ex->getMessage());
        }
        return $retorno;
    }

    public function buscarPorId($id) {
        $facade = new MembroFacade();
        try {
            $arrayMembros = $facade->buscarPorId($id);
        } catch (Exception $ex) {
            throw new Exception($ex->getMessage());
        }

        return $arrayMembros;
    }

    public function buscarTodos() {
        $facade = new MembroFacade();
        try {
            $arrayMembros = $facade->buscarTodos();
        } catch (Exception $ex) {
            throw new Exception($ex->getMessage());
        }

        return $arrayMembros;
    }
    
    public function remover($id){
        $facade = new MembroFacade();
        try {
            $retorno = $facade->excluir($id);
        } catch (Exception $ex) {
            throw new Exception($ex->getMessage());
        }
        return $retorno;
    }

}
