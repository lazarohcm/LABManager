<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace LabManager\Negocio;

use LabManager\DAO\DAOGenericImpl;
use LabManager\Bean\Noticia;
use LabManager\Negocio\AbstractNegocio;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Description of NoticiaNegocio
 *
 * @author Lázaro Henrique <lazarohcm@gmail.com>
 * @version string
 */
class NoticiaNegocio extends AbstractNegocio {

    function __construct() {
        parent::setDAO(new DAOGenericImpl());
        parent::setBeanNegocio(new Noticia());
    }

    function validarObjeto($object) {
        return TRUE;
    }

    function attachEntity($object) {
        try {
            if ($object->getNoticiaLaboratorio() != NULL) {
                $object->setNoticiaLaboratorio($this->dao->attachEntity($object->getNoticiaLaboratorio()));
            }
            if ($object->getNoticiaProjeto() != NULL) {
                $object->setNoticiaProjeto($this->dao->attachEntity($object->getNoticiaProjeto()));
            }
            return $object;
        } catch (Exception $ex) {
            throw new \Exception($ex->getMessage(), $ex->getCode(), $ex->getPrevious());
        }
    }

}
