<?php
namespace LabManager\Negocio;

use LabManager\DAO\DAOGenericImpl;
use LabManager\Bean\Laboratorio;
use LabManager\Negocio\AbstractNegocio;
/**
 * Description of Laboratorio
 *
 * @author lazaro
 */
class LaboratorioNegocio extends AbstractNegocio {
    
    
    function validarObjeto($object) {
        ;
    }
    
    function attachEntity($object) {
        return $object;
    }
            
    function __construct() {
        parent::setDAO(new DAOGenericImpl());
        parent::setBeanNegocio(new Laboratorio());
    }
    
//    public function buscarPorSigla($sigla){
//        try{
//            return $this->dao->findOneBy(array('sigla' => $sigla));
//        } catch (\Exception $ex) {
//            throw new \Exception($ex->getMessage(), $ex->getCode(), $ex->getPrevious());
//        }
//    }    
}
