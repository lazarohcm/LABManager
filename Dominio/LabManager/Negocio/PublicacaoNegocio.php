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
class PublicacaoNegocio extends AbstractNegocio {

    function __construct() {
        parent::setDAO(new DAOGenericImpl());
        parent::setBeanNegocio(new Publicacao());
    }

    function validarObjeto($object) {
        return TRUE;
    }

    function attachEntity($object) {
        try {
            $object->setProjeto($this->dao->attachEntity($object->getProjeto()));
        } catch (\Exception $ex) {
            throw new Exception($ex->getMessage());
        }
        return $object;
    }
    
    function buscarTodosPorAno(){
        $query = "SELECT publicacao FROM LabManager\Bean\Publicacao publicacao ORDER BY publicacao.data DESC";
        try {
            $publicacoes = $this->dao->findByParam($query);
        } catch (\Exception $ex) {
            throw new \Exception($ex->getMessage());
        }
        return $publicacoes;
    }
    
}
