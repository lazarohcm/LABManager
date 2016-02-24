<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace LabManager\Negocio;

use LabManager\DAO\DAOGenericImpl;
use LabManager\Bean\MembroSala;
/**
 * Description of MembroSalaFacade
 *
 * @author Lázaro Henrique <lazarohcm@gmail.com>
 * @version string
 */
class MembroSalaNegocio {
    private $dao;
    
    function __construct() {
        $this->dao = new DAOGenericImpl();
    }
    
    public function salvar($membroSala){
        try{
            return $this->dao->save($membroSala);
        } catch (\Exception $ex) {
            throw new \Exception($ex->getMessage(), $ex->getCode(), $ex->getPrevious());
        }
    }
    
    public function buscarPorID($id){
        try{
            return $this->dao->findById(get_class(new MembroSala()), $id);
        } catch (\Exception $ex) {
            throw new \Exception($ex->getMessage(), $ex->getCode(), $ex->getPrevious());
        }
    }
    
    public function atualizar($membroSala){
        try{
            $this->dao->update($membroSala);
        } catch (\Exception $ex) {
            throw new \Exception($ex->getMessage(), $ex->getCode(), $ex->getPrevious());
        }
    }
    
    public function buscarTodos(){
        try{
            return $this->dao->findAll(get_class(new MembroSala()));
        } catch (\Exception $ex) {
            throw new \Exception($ex->getMessage(), $ex->getCode(), $ex->getPrevious());
        }
    }
    
    public function excluir($membroSala){
        try{
            $membroSalaToRemove = $this->buscarPorID($membroSala->getId());
            $this->dao->delete($membroSalaToRemove);
        } catch (\Exception $ex) {
            throw new \Exception($ex->getMessage(), $ex->getCode(), $ex->getPrevious());
        }
    }
}
