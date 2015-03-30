<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace LabManager\Negocio;

use LabManager\DAO\DAOGenericImpl;
use LabManager\Bean\Publicacao;
/**
 * Description of PublicacaoNegocio
 *
 * @author Lázaro Henrique <lazarohcm@gmail.com>
 * @version string
 */
class PublicacaoNegocio extends AbstractNegocio{
    
    function __construct() {
        parent::setDAO(new DAOGenericImpl());
        parent::setBeanNegocio(new Publicacao());
    }
    
    function validarObjeto($object) {
        return TRUE;
    }
    
    function attachEntity($object) {
        return $object;
    }
    
    public function salvar($publicacaoNeogcio){
        try{
            return $this->dao->save($publicacaoNeogcio);
        } catch (\Exception $ex) {
            throw new \Exception($ex->getMessage(), $ex->getCode(), $ex->getPrevious());
        }
    }
    
    public function buscarPorID($id){
        try{
            return $this->dao->findById(get_class(new Publicacao()), $id);
        } catch (\Exception $ex) {
            throw new \Exception($ex->getMessage(), $ex->getCode(), $ex->getPrevious());
        }
    }
    
    public function atualizar($publicacaoNeogcio){
        try{
            $this->dao->update($publicacaoNeogcio);
        } catch (\Exception $ex) {
            throw new \Exception($ex->getMessage(), $ex->getCode(), $ex->getPrevious());
        }
    }
    
    public function buscarTodos(){
        try{
            return $this->dao->findAll(get_class(new Publicacao()));
        } catch (\Exception $ex) {
            throw new \Exception($ex->getMessage(), $ex->getCode(), $ex->getPrevious());
        }
    }
    
    public function excluir($publicacaoNeogcio){
        try{
            $publicacaoNeogcioToRemove = $this->buscarPorID($publicacaoNeogcio->getId());
            $this->dao->delete($$publicacaoNeogcioToRemove);
        } catch (\Exception $ex) {
            throw new \Exception($ex->getMessage(), $ex->getCode(), $ex->getPrevious());
        }
    }
}
