<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace LabManager\Negocio;

use LabManager\DAO\DAOGenericImpl;
use LabManager\Bean\Noticia;
/**
 * Description of NoticiaNegocio
 *
 * @author Lázaro Henrique <lazarohcm@gmail.com>
 * @version string
 */
class NoticiaNegocio {
    private $dao;
    
    function __construct() {
        $this->dao = new DAOGenericImpl();
    }
    
    public function salvar($noticia){
        try{
            return $this->dao->save($noticia);
        } catch (\Exception $ex) {
            throw new \Exception($ex->getMessage(), $ex->getCode(), $ex->getPrevious());
        }
    }
    
    public function buscarPorID($id){
        try{
            return $this->dao->findById(get_class(new Noticia()), $id);
        } catch (\Exception $ex) {
            throw new \Exception($ex->getMessage(), $ex->getCode(), $ex->getPrevious());
        }
    }
    
    public function atualizar($noticia){
        try{
            $this->dao->update($noticia);
        } catch (\Exception $ex) {
            throw new \Exception($ex->getMessage(), $ex->getCode(), $ex->getPrevious());
        }
    }
    
    public function buscarTodos(){
        try{
            return $this->dao->findAll(get_class(new Noticia()));
        } catch (\Exception $ex) {
            throw new \Exception($ex->getMessage(), $ex->getCode(), $ex->getPrevious());
        }
    }
    
    public function excluir($noticia){
        try{
            $noticiaToRemove = $this->buscarPorID($noticia->getId());
            $this->dao->delete($noticiaToRemove);
        } catch (\Exception $ex) {
            throw new \Exception($ex->getMessage(), $ex->getCode(), $ex->getPrevious());
        }
    }
}
