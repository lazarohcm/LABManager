<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace LabManager\Negocio;

use LabManager\DAO\DAOGenericImpl;
use LabManager\Bean\Membro;
use LabManager\Negocio\LaboratorioNegocio;

/**
 * Description of MembroNegocio
 *
 * @author Lázaro Henrique <lazarohcm@gmail.com>
 * @version string
 */
class MembroNegocio {
    private $dao;
    
    private $labNegocio;
    function __construct() {
        $this->dao = new DAOGenericImpl();
        $this->labNegocio = new LaboratorioNegocio();
    }
    
    public function salvar($membroData){
        $lab = $this->labNegocio->buscarPorID($membroData['idLab']);
        $membro = $membroData['membro'];
        $membro->setLaboratorio($lab);
        $membro->setBiografia('...');
        $membro->setLattes('...');
        $membro->setData_saida($membro->getData_entrada());
        $tipo = (int)$membroData['tipo'];
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
        try{
            return $this->dao->save($membro);
        } catch (\Exception $ex) {
            throw new \Exception($ex->getMessage(), $ex->getCode(), $ex->getPrevious());
        }
    }
    
    public function buscarPorID($id){
        try{
            return $this->dao->findById(get_class(new Membro()), $id);
        } catch (\Exception $ex) {
            throw new \Exception($ex->getMessage(), $ex->getCode(), $ex->getPrevious());
        }
    }
    
    public function atualizar($membro){
        try{
            $this->dao->update($membro);
        } catch (\Exception $ex) {
            throw new \Exception($ex->getMessage(), $ex->getCode(), $ex->getPrevious());
        }
    }
    
    public function buscarTodos(){
        try{
            return $this->dao->findAll(get_class(new Membro()));
        } catch (\Exception $ex) {
            throw new \Exception($ex->getMessage(), $ex->getCode(), $ex->getPrevious());
        }
    }
    
    public function buscarPorUsuario($usuario){
        $query = "SELECT membro FROM LabManager\Bean\Membro membro WHERE membro.usuario = :usuario";
        try{
            $membro = $this->dao->findByParam($query, array('usuario' => $usuario));
        } catch (\Exception $ex) {
            throw new \Exception($ex->getMessage(), $ex->getCode(), $ex->getPrevious());
        }
        return $membro;
    }
    
    public function excluir($id){
        try{
            $membroToRemove = $this->buscarPorID($id);
            $this->dao->delete($membroToRemove);
        } catch (\Exception $ex) {
            throw new \Exception($ex->getMessage(), $ex->getCode(), $ex->getPrevious());
        }
        return TRUE;
    }
}
