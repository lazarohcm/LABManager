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
    
    public function buscarPorNome($nome){
        $query = "SELECT laboratorio FROM LabManager\Bean\Laboratorio laboratorio WHERE LOWER(laboratorio.nome) = :nome";
        try{
            return $this->dao->findByParam($query, array('nome' => $nome));
        } catch (\Exception $ex) {
            throw new \Exception($ex->getMessage(), $ex->getCode(), $ex->getPrevious());
        }
    }    
}
