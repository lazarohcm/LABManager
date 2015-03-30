<?php

/**
 * UNA-SUS/UFMA - InfraEstrutura
 * 
 * @author Dilson José <dilsonrabelo.unasus@gmail.com>
 * @copyright (C) 2014, CTI UNA-SUS/UFMA
 * @version 1.0
 * @link http://www.unasus.ufma.br/SigU/SigUUnasusStore/
 */

namespace LabManager\Negocio;

use InfraEstrutura\Exception\DAOException;
use InfraEstrutura\Exception\NegocioException;

/**
 * Negocio Abstrato
 *
 * @package SigUUnasusStore\Negocio
 */
abstract class AbstractNegocio {

    protected $beanNegocio;
    protected $dao;

    function getBeanNegocio() {
        return $this->beanNegocio;
    }

    function getDAO() {
        return $this->dao;
    }

    function setBeanNegocio($beanNegocio) {
        $this->beanNegocio = $beanNegocio;
    }

    function setDAO($dao) {
        $this->dao = $dao;
    }

    /**
     * Exclui um objeto
     * 
     * @param  $object
     * @return boolean
     * @throws NegocioException
     */
    public function delete($object) {
        $object = $this->findById($object->getId());
        try {
            $this->dao->delete($object);
        } catch (DAOException $ex) {
            throw new NegocioException($ex->getMessage());
        }

        return TRUE;
    }

    /**
     * Retorna todos
     * @return ArrayCollection
     * @throws NegocioException
     */
    public function findAll() {

        try {
            $retorno = $this->dao->findAll(get_class($this->beanNegocio));
        } catch (DAOException $ex) {
            throw new NegocioException($ex->getMessage());
        }

        return $retorno;
    }

    /**
     * Retorna uma Objeto por um ID especifico
     * @param Integer $id
     * @return Object
     * @throws NegocioException
     */
    public function findById($id) {

        if (!is_numeric($id)) {
            throw new NegocioException("Id deve ser numérico!");
        }

        try {
            $retorno = $this->dao->findById(get_class($this->beanNegocio), $id);
        } catch (DAOException $exc) {
            throw new NegocioException($exc->getMessage());
        }

        return $retorno;
    }
    
    /**
     * Retorna uma Objeto por parâmetro
     * @param Integer $id
     * @return Object
     * @throws NegocioException
     */
    public function findOneBy($param) {
        try {
            $retorno = $this->dao->findOneBy(get_class($this->beanNegocio), $param);
        } catch (DAOException $exc) {
            throw new NegocioException($exc->getMessage());
        }

        return $retorno;
    }

    /**
     * Salva um Objeto
     * @param Object
     * @return boolean
     * @throws NegocioException
     */
    public function save($object) {
        $object = $this->attachEntity($object);
        $this->validarObjeto($object);

        try {
            $this->dao->save($object);
        } catch (DAOException $exc) {
            throw new NegocioException($exc->getMessage());
        }
        return $object;
    }

    /**
     * Atualiza um Objeto
     * @param CategoriaCurso $object
     * @return boolean
     * @throws NegocioException
     */
    public function update($object) {
        $object = $this->attachEntity($object);
        if (!is_numeric($object->getId())) {
            throw new NegocioException("Id deve ser numérico!");
        }

        $this->validarObjeto($object);

        try {
           return  $this->dao->update($object);
        } catch (DAOException $exc) {
            throw new NegocioException($exc->getMessage());
        }
    }
    
    /**
     * Função utilizada para testes
     */
    public function findLast(){
        $last = NULL;
        $arrayObjects = $this->findAll();
        
        if($arrayObjects != NULL){
            $last = end($arrayObjects);
        }
        return $last;
        
    }

    /**
     * ValidaObjeto
     */
    abstract function validarObjeto($object);

    /**
     * Sicroniza com o EntityFramework
     */
    abstract function attachEntity($object);
}
