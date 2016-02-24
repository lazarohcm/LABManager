<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace LabManager\Negocio;

use LabManager\DAO\DAOGenericImpl;
use LabManager\Bean\NoticiaPublicacao;
/**
 * Description of NoticiaPubblicacaoNegocio
 *
 * @author Lázaro Henrique <lazarohcm@gmail.com>
 * @version string
 */
class NoticiaPubblicacaoNegocio {
    private $dao;
    
    function __construct() {
        $this->dao = new DAOGenericImpl();
    }
    
    public function salvar($noticiaPublicacao){
        try{
            return $this->dao->save($noticiaPublicacao);
        } catch (\Exception $ex) {
            throw new \Exception($ex->getMessage(), $ex->getCode(), $ex->getPrevious());
        }
    }
    
    public function buscarPorID($id){
        try{
            return $this->dao->findById(get_class(new NoticiaPublicacao()), $id);
        } catch (\Exception $ex) {
            throw new \Exception($ex->getMessage(), $ex->getCode(), $ex->getPrevious());
        }
    }
    
    public function atualizar($noticiaPublicacao){
        try{
            $this->dao->update($noticiaPublicacao);
        } catch (\Exception $ex) {
            throw new \Exception($ex->getMessage(), $ex->getCode(), $ex->getPrevious());
        }
    }
    
    public function buscarTodos(){
        try{
            return $this->dao->findAll(get_class(new NoticiaPublicacao()));
        } catch (\Exception $ex) {
            throw new \Exception($ex->getMessage(), $ex->getCode(), $ex->getPrevious());
        }
    }
    
    public function excluir($noticiaPublicacao){
        try{
            $noticiaPublicacaoToRemove = $this->buscarPorID($noticiaPublicacao->getId());
            $this->dao->delete($noticiaPublicacaoToRemove);
        } catch (\Exception $ex) {
            throw new \Exception($ex->getMessage(), $ex->getCode(), $ex->getPrevious());
        }
    }
}
