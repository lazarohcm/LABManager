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
        return $object;
    }
}
