<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace LabManager\Negocio;

use LabManager\DAO\DAOGenericImpl;
use LabManager\Bean\Projeto;
use LabManager\Negocio\LaboratorioNegocio;
use LabManager\Negocio\MembroNegocio;
/**
 * Description of ProjetoNegocio
 *
 * @author Lázaro Henrique <lazarohcm@gmail.com>
 * @version string
 */
class ProjetoNegocio {
    private $dao;
    private $labNegocio;
    private $membroNegocio;
    
    function __construct() {
        $this->dao = new DAOGenericImpl();
        $this->labNegocio = new LaboratorioNegocio();
        $this->membroNegocio = new MembroNegocio();
    }
    
    public function salvar($projetoData){
        $lab = $this->labNegocio->buscarPorID($projetoData['idLab']);
        $coordenador = $this->membroNegocio->buscarPorID($projetoData['idCoordenador']);
        $projeto = $projetoData['projeto'];
        $projeto->setLaboratorio($lab);
        $projeto->setCoordenador($coordenador);
        try{
            return $this->dao->save($projeto);
        } catch (\Exception $ex) {
            throw new \Exception($ex->getMessage(), $ex->getCode(), $ex->getPrevious());
        }
    }
    
    public function buscarPorID($id){
        try{
            return $this->dao->findById(get_class(new Projeto()), $id);
        } catch (\Exception $ex) {
            throw new \Exception($ex->getMessage(), $ex->getCode(), $ex->getPrevious());
        }
    }
    
    public function atualizar($projetoData){
        $lab = $this->labNegocio->buscarPorID($projetoData['idLab']);
        $coordenador = $this->membroNegocio->buscarPorID($projetoData['idCoordenador']);
        $projeto = $projetoData['projeto'];
        $projeto->setLaboratorio($lab);
        $projeto->setCoordenador($coordenador);
        try{
            $this->dao->update($projeto);
        } catch (\Exception $ex) {
            throw new \Exception($ex->getMessage(), $ex->getCode(), $ex->getPrevious());
        }
    }
    
    public function buscarTodos(){
        try{
            return $this->dao->findAll(get_class(new Projeto()));
        } catch (\Exception $ex) {
            throw new \Exception($ex->getMessage(), $ex->getCode(), $ex->getPrevious());
        }
    }
    
    public function excluir($projeto){
        try{
            $labToRemove = $this->buscarPorID($projeto->getId());
            $this->dao->delete($labToRemove);
        } catch (\Exception $ex) {
            throw new \Exception($ex->getMessage(), $ex->getCode(), $ex->getPrevious());
        }
    }
}
