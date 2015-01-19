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
        $membro->setData_entrada(DateTime::createFromFormat('d/m/Y', $arrayMembro['entrada']));

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

    public function autentica($usuario, $senha) {
        $facade = new MembroFacade();
        try {
            $membro = $facade->buscarPorUsuario($usuario);
            if (isset($membro[0])) {
                if (md5($senha) == $membro[0]->getSenha()) {
                    $dadosSessao['id'] = $membro[0]->getId();
                    $dadosSessao['usuario'] = $membro[0]->getUsuario();
                    $dadosSessao['admin'] = $membro[0]->getAdmin();
                    $dadosSessao['nome'] = $membro[0]->getNome();
                    $this->sessioncontrol->setVarSession('id_user_labmanager', $dadosSessao);
                    return TRUE;
                }
            }
        } catch (Exception $ex) {
            throw new Exception($ex->getMessage());
        }
        return FALSE;
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
    
    public function buscarCoordenadores() {
        $facade = new MembroFacade();
        try {
            $arrayMembros = $facade->buscarCoordenadores();
        } catch (Exception $ex) {
            throw new Exception($ex->getMessage());
        }
        
        $array = array();
        foreach ($arrayMembros as $membro){
            $array[$membro->getId()] = $membro->getNome();
        }

        return $array;
    }
    
    public function atualizar($arrayMembro){
        $facedeMembro = new MembroFacade();
        $membro = $facedeMembro->buscarPorId($arrayMembro['id']);
        $membro->setNome($arrayMembro['nome']);
        $membro->setUsuario($arrayMembro['usuario']);
        $membro->setEmail($arrayMembro['email']);
        $membro->setData_entrada(DateTime::createFromFormat('d/m/Y', $arrayMembro['entrada']));
        $membro->setAtivo($arrayMembro['ativo'] === 'true' ? true : false);
        $membro->setAdmin($arrayMembro['admin'] === 'true' ? true : false);
        $membro->setFoto($arrayMembro['foto']);
        $idLab = $arrayMembro['laboratorio'];
        $tipo = (int)$arrayMembro['tipo'];
        
        switch ($tipo){
            case 1:
                $membro->setTipo('Professor');
                break;
            case 2:
                $membro->setTipo('Pesquisador');
                break;
            case 3:
                $membro->setTipo('Doutoranto');
                break;
            case 4:
                $membro->setTipo('Mestrando');
                break;
            case 5:
                $membro->setTipo('Graduando');
                break;
            default :
                throw new \Exception('O tipo selecionado é inválido');
        }
        
        if($arrayMembro['saida'] != null && $arrayMembro['saida'] != ''){
            $membro->setData_saida(DateTime::createFromFormat('d/m/Y', $arrayMembro['saida']));
        }else{
            $membro->setData_saida(NULL);
        }
        
        if(!isset($arrayMembro['biografia']) && $arrayMembro['biografia'] == ''){
            $membro->setBiografia('...');
        }else{
            $membro->setBiografia($arrayMembro['biografia']);
        }
        
        if(!isset($arrayMembro['lattes']) && $arrayMembro['lattes'] == ''){
            $membro->setLattes('...');
        }else{
            $membro->setLattes($arrayMembro['lattes']);
        }
        
        try {
            $retorno = $facedeMembro->atualizar(array('membro' => $membro, 'idLab' => $idLab, 'tipo' => $tipo));
        } catch (Exception $ex) {
            throw new Exception($ex->getMessage());
        }
        return $retorno;
    }

    public function remover($id) {
        $facade = new MembroFacade();
        try {
            $retorno = $facade->excluir($id);
        } catch (Exception $ex) {
            throw new Exception($ex->getMessage());
        }
        return $retorno;
    }

}
