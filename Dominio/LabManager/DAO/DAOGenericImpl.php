<?php

/**
 * UFMA - LabManager 

 * @author Lázaro Henrique <lazarohcm@gmail.com>   
 * @version 1.0

 */

namespace LabManager\DAO;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\ORMException;
use Doctrine\ORM\ORMInvalidArgumentException;
use InfraEstrutura\Exception\DAOException;
use Zend\Form\Annotation\Object;
use Zend\XmlRpc\Value\String;

/**
 * Camada DAO
 * 
 * @package SigUSeguranca\DAO
 */
class DAOGenericImpl {

    /**
     * @var EntityManager Gerencia conexão e permite
     */
    protected static $entityManager;

    /**
     * Exclui um modelo no banco de dados
     * 
     * @param Object $object Objeto de Domínio   
     */
    public function delete($object) {
        try {
            self::$entityManager->remove($object);
            self::$entityManager->flush();
        } catch (ORMException $exc) {
            throw new DAOException($exc->getMessage(), $exc->getCode(), $exc->getPrevious());
        } catch (\Exception $exc) {
            throw new DAOException($exc->getMessage(), $exc->getCode(), $exc->getPrevious());
        }

        return TRUE;
    }

    /**
     * Salva um modelo no banco de dados
     * 
     * @param Object $object Objeto de Domínio
     */
    public function save($object) {
        try {
            if (self::$entityManager->getUnitOfWork()->getEntityState($object) == 3) {
                self::$entityManager->merge($object);
            } else {
                self::$entityManager->persist($object);
            }
            self::$entityManager->flush();
        } catch (\Exception $exc) {
            throw new DAOException($exc->getMessage(), $exc->getCode(), $exc->getPrevious());
        } catch (ORMException $exc) {
            throw new DAOException($exc->getMessage(), $exc->getCode(), $exc->getPrevious());
        } catch (ORMInvalidArgumentException $exc) {
            throw new DAOException($exc->getMessage(), $exc->getCode(), $exc->getPrevious());
        }

        return $object;
    }

    /**
     * Atualiza a um modelo no banco de dados
     * 
     * @param Object $object Objeto de Domínio
     */
    public function update($object) {
        try {
            self::$entityManager->merge($object);
            self::$entityManager->flush();
        } catch (\Exception $exc) {
            throw new DAOException($exc->getMessage(), $exc->getCode(), $exc->getPrevious());
        }

        return TRUE;
    }

    /**
     * Recupera todos os registros de um entidade
     * 
     * @param Object $object Objeto de Domínio
     */
    public function findAll($object) {
        try {

            return self::$entityManager->getRepository($object)->findAll();
        } catch (ORMException $exc) {
            throw new DAOException($exc->getMessage(), $exc->getCode(), $exc->getPrevious());
        }
    }

    /**
     * Busca um resgistro com base no PK
     *
     * @param $object dominio
     * @param BigInt $id Identificador Chave Primária
     */
    public function findById($object, $id) {
        try {
            return self::$entityManager->getRepository($object)->find($id);
        } catch (ORMException $exc) {
            throw new DAOException($exc->getMessage(), $exc->getCode(), $exc->getPrevious());
        }
    }

    /**
     * Recupera registros conforme a query e os parâmetros
     * 
     * @param String $query Query de consulta a base de dados
     * @param Array $arrayParams Array com os parâmetros [nome][parametro]
     * @param $limit de linhas
     */
    public function findByParam($query, $arrayParams = NULL, $limit = NULL) {
        try {

            $query = self::$entityManager->createQuery($query);

            if ($limit != NULL && is_numeric($limit)) {
                $query->setMaxResults($limit);
            }

            if ($arrayParams != NULL) {
                $query->setParameters($arrayParams);
            }
            return $query->getResult();
        } catch (Exception $exc) {
            throw new DAOException($exc->getMessage(), $exc->getCode(), $exc->getPrevious());
        } catch (ORMException $exc) {
            throw new DAOException($exc->getMessage(), $exc->getCode(), $exc->getPrevious());
        }
    }

    /**
     * Sicroniza uma Entidade com o EnityFramework
     * @param Object $object
     * @return Object
     * @throws DAOException
     */
    public function attachEntity($object) {
        try {
            return self::$entityManager->merge($object);
        } catch (\Exception $exc) {
            throw new DAOException($exc->getMessage(), $exc->getCode(), $exc->getPrevious());
        } catch (\Doctrine\ORM\ORMException $exc) {
            throw new DAOException($exc->getMessage(), $exc->getCode(), $exc->getPrevious());
        }
    }

    /**
     * Define objeto de conexão padrão para o sistema
     * 
     * @param Object $conexaoDatabase     
     */
    public static function setDefaultConnectionDataBase(&$conexaoDatabase) {
        self::$entityManager = $conexaoDatabase;
    }

}
