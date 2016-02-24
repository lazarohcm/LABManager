<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace LabManager\Negocio;

use LabManager\DAO\DAOGenericImpl;
use LabManager\Bean\NoticiaLaboratorio;
use LabManager\Negocio\AbstractNegocio;

/**
 * Description of NoticiaLaboratorioNegocio
 *
 * @author Lázaro Henrique <lazarohcm@gmail.com>
 * @version string
 */
class NoticiaLaboratorioNegocio extends AbstractNegocio {

    function __construct() {
        parent::setDAO(new DAOGenericImpl());
        parent::setBeanNegocio(new NoticiaLaboratorio());
    }

    function validarObjeto($object) {
        return TRUE;
    }

    function attachEntity($object) {
        try {
            $object->setLaboratorio($this->dao->attachEntity($object->getLaboratorio()));
            $object->setNoticia($this->dao->attachEntity($object->getNoticia()));
            return $object;
        } catch (Exception $ex) {
            throw new \Exception($ex->getMessage(), $ex->getCode(), $ex->getPrevious());
        }
    }

}
