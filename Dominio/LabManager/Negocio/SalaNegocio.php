<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace LabManager\Negocio;

use LabManager\DAO\DAOGenericImpl;
use LabManager\Bean\Sala;
/**
 * Description of SalaNegocio
 *
 * @author Lázaro Henrique <lazarohcm@gmail.com>
 * @version string
 */
class SalaNegocio {
    private $dao;
    
    function __construct() {
        $this->dao = new DAOGenericImpl();
    }
    
    public function salvar($sala){
        try{
            return $this->dao->save($sala);
        } catch (\Exception $ex) {
            throw new \Exception($ex->getMessage(), $ex->getCode(), $ex->getPrevious());
        }
    }
    
    public function buscarPorID($id){
        try{
            return $this->dao->findById(get_class(new Sala()), $id);
        } catch (\Exception $ex) {
            throw new \Exception($ex->getMessage(), $ex->getCode(), $ex->getPrevious());
        }
    }
    
    public function atualizar($sala){
        try{
            $this->dao->update($sala);
        } catch (\Exception $ex) {
            throw new \Exception($ex->getMessage(), $ex->getCode(), $ex->getPrevious());
        }
    }
    
    public function buscarTodos(){
        try{
            return $this->dao->findAll(get_class(new Sala()));
        } catch (\Exception $ex) {
            throw new \Exception($ex->getMessage(), $ex->getCode(), $ex->getPrevious());
        }
    }
    
    public function excluir($sala){
        try{
            $salaToRemove = $this->buscarPorID($sala->getId());
            $this->dao->delete($$salaToRemove);
        } catch (\Exception $ex) {
            throw new \Exception($ex->getMessage(), $ex->getCode(), $ex->getPrevious());
        }
    }
}
