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
class MembroNegocio extends AbstractNegocio{    
    private $labNegocio;
    function __construct() {
        parent::setDAO(new DAOGenericImpl());
        parent::setBeanNegocio(new Membro());
         $this->labNegocio = new LaboratorioNegocio();
    }
    
    function validarObjeto($object) {
        return TRUE;
    }
    
    function attachEntity($object) {
        return $object;
    }   
    
    
    public function salvar($membroData){
        $lab = $this->labNegocio->findById($membroData['idLab']);
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
    
    public function atualizar($membroData){
         $membro = $membroData['membro'];
        if(isset($membroData['idLab'])){
            $lab = $this->labNegocio->findById($membroData['idLab']);
            $membro->setLaboratorio($lab);
        }
        
        try{
            $this->dao->update($membro);
        } catch (\Exception $ex) {
            throw new \Exception($ex->getMessage(), $ex->getCode(), $ex->getPrevious());
        }
        return TRUE;
    }
    
    public function buscarTodos(){
        try{
            return $this->dao->findAll(get_class(new Membro()));
        } catch (\Exception $ex) {
            throw new \Exception($ex->getMessage(), $ex->getCode(), $ex->getPrevious());
        }
    }
    
    public function buscarPorUsuario($usuario){
        $query = "SELECT membro FROM LabManager\Bean\Membro membro WHERE membro.email = :usuario";
        try{
            $membro = $this->dao->findByParam($query, array('usuario' => $usuario));
        } catch (\Exception $ex) {
            throw new \Exception($ex->getMessage(), $ex->getCode(), $ex->getPrevious());
        }
        return $membro;
    }
    
    public function buscarCoordenadores($usuario){
        $query = "SELECT membro FROM LabManager\Bean\Membro membro WHERE membro.tipo = 'Professor' OR membro.tipo = 'Pesquisador'";
        try{
            $membro = $this->dao->findByParam($query);
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
