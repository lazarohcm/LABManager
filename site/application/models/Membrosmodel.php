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
        if ($arrayMembro['nome'] == NULL || strlen($arrayMembro['nome']) < 6) {
            throw new Exception('O nome dado é muito pequeno');
        }
        if (!filter_var($arrayMembro['email'], FILTER_VALIDATE_EMAIL)) {
            throw new Exception('O email fornecido é inválido');
        }
        if ($arrayMembro['laboratorio'] == NULL || $arrayMembro['laboratorio'] == 0) {
            throw new Exception('Selecione um laboratório');
        }
        if ($arrayMembro['tipo'] == NULL || $arrayMembro['tipo'] == 0) {
            throw new Exception('Selecione um tipo');
        }
        if (isset($arrayMembro['entrada']) && $arrayMembro['entrada'] != '') {
            $membro->setData_entrada(DateTime::createFromFormat('d/m/Y', $arrayMembro['entrada']));
        }
        if (isset($arrayMembro['saida']) && $arrayMembro['saida'] != '') {
            $membro->setData_saida(DateTime::createFromFormat('d/m/Y', $arrayMembro['saida']));
        }

        $membro->setEmail($arrayMembro['email']);
        $membro->setSenha(md5('123456'));


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
            $arrayMembros = $facade->findById($id);
        } catch (Exception $ex) {
            throw new Exception($ex->getMessage());
        }

        return $arrayMembros;
    }

    public function autentica($usuario, $senha) {
        $facade = new MembroFacade();
        try {
            $membro = $facade->buscarPorUsuario($usuario);
            if (isset($membro[0]) && md5($senha) == $membro[0]->getSenha()) {

                $dadosSessao['id'] = $membro[0]->getId();
                $dadosSessao['email'] = $membro[0]->getEmail();
                $dadosSessao['admin'] = $membro[0]->getAdmin();
                $dadosSessao['nome'] = $membro[0]->getNome();
                $this->sessioncontrol->setVarSession('id_user_labmanager', $dadosSessao);
                return TRUE;
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
        foreach ($arrayMembros as $membro) {
            $array[$membro->getId()] = $membro->getNome();
        }

        return $array;
    }

    public function atualizar($arrayMembro) {
        $facedeMembro = new MembroFacade();
        $membro = $facedeMembro->findById($arrayMembro['id']);
        $membro->setNome($arrayMembro['nome']);
        $membro->setEmail($arrayMembro['email']);
        if (isset($arrayMembro['entrada']) && $arrayMembro['entrada'] != '') {
            $membro->setData_entrada(DateTime::createFromFormat('d/m/Y', $arrayMembro['entrada']));
        }
        $membro->setAtivo($arrayMembro['ativo'] === 'true' ? true : false);
        $membro->setAdmin($arrayMembro['admin'] === 'true' ? true : false);
        $membro->setFoto($arrayMembro['foto']);
        $idLab = $arrayMembro['laboratorio'];
        $tipo = (int) $arrayMembro['tipo'];

        switch ($tipo) {
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

        if ($arrayMembro['saida'] != null && $arrayMembro['saida'] != '') {
            $membro->setData_saida(DateTime::createFromFormat('d/m/Y', $arrayMembro['saida']));
        } else {
            $membro->setData_saida(NULL);
        }

        if (!isset($arrayMembro['biografia']) || $arrayMembro['biografia'] == '') {
            $membro->setBiografia('...');
        } else {
            $membro->setBiografia($arrayMembro['biografia']);
        }

        if (!isset($arrayMembro['lattes']) || $arrayMembro['lattes'] == '') {
            $membro->setLattes('...');
        } else {
            $membro->setLattes($arrayMembro['lattes']);
        }

        try {
            $retorno = $facedeMembro->atualizar(array('membro' => $membro, 'idLab' => $idLab, 'tipo' => $tipo));
        } catch (Exception $ex) {
            throw new Exception($ex->getMessage());
        }
        return $retorno;
    }

    public function atualizarPerfil($arrayMembro) {
        $facedeMembro = new MembroFacade();
        $membro = new Membro();
        $membro = $facedeMembro->buscarPorId($arrayMembro['id']);
        $membro->setNome($arrayMembro['nome']);
        $membro->setEmail($arrayMembro['email']);
        $membro->setFoto($arrayMembro['foto']);
        (isset($arrayMembro['lattes']) && $arrayMembro['lattes'] != NULL) ? $membro->setLattes($arrayMembro['lattes']) : NULL;
        (isset($arrayMembro['areas']) && $arrayMembro['areas'] != NULL) ? $membro->setArea_interesse($arrayMembro['areas']) : NULL;
        (isset($arrayMembro['facebook']) && $arrayMembro['facebook'] != NULL) ? $membro->setFacebook($arrayMembro['facebook']) : NULL;
        (isset($arrayMembro['twitter']) && $arrayMembro['twitter'] != NULL) ? $membro->setTwitter($arrayMembro['twitter']) : NULL;
        (isset($arrayMembro['linkdin']) && $arrayMembro['linkdin'] != NULL) ? $membro->setLinkdl($arrayMembro['linkdin']) : NULL;
        (isset($arrayMembro['sobre']) && $arrayMembro['sobre'] != NULL) ? $membro->setBiografia($arrayMembro['sobre']) : NULL;
        (isset($arrayMembro['telefone']) && $arrayMembro['telefone'] != NULL) ? $membro->setTelefone($arrayMembro['telefone']) : NULL;

        try {
            $retorno = $facedeMembro->atualizar(array('membro' => $membro));
        } catch (Exception $ex) {
            throw new Exception($ex->getMessage());
        }
        return $retorno;
    }

    public function atualizarSenha($arrayMembro) {
        $facedeMembro = new MembroFacade();
        $membro = new Membro();
        $membro = $facedeMembro->buscarPorId($arrayMembro['id']);
        $senha = md5($arrayMembro['senhaAtual']);
        if ($membro->getSenha() == $senha) {
            $membro->setSenha(md5($arrayMembro['novaSenha']));
        } else {
            return array('sucesso' => false, 'msg' => 'A senha atual não confere');
        }

        try {
            $retorno = $facedeMembro->atualizar(array('membro' => $membro));
        } catch (Exception $ex) {
            throw new Exception($ex->getMessage());
        }
        return array('sucesso' => true, 'membro' => $retorno);
    }

    public function remover($id) {
        $facade = new MembroFacade();
        $membro = $facade->findById($id);
        try {
            $retorno = $facade->delete($membro);
        } catch (Exception $ex) {
            throw new Exception($ex->getMessage());
        }
        return $retorno;
    }

}
