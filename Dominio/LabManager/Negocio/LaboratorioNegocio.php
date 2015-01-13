<?php
namespace LabManager\Negocio;

use LabManager\DAO\DAOGenericImpl;
use LabManager\Bean\Laboratorio;
/**
 * Description of Laboratorio
 *
 * @author lazaro
 */
class LaboratorioNegocio {
    
    private $dao;
    
    function __construct() {
        $this->dao = new DAOGenericImpl();
    }
    
    public function salvar($laboratorio){
        try{
            return $this->dao->save($laboratorio);
        } catch (\Exception $ex) {
            throw new \Exception($ex->getMessage(), $ex->getCode(), $ex->getPrevious());
        }
    }
    
    public function buscarPorID($id){
        try{
            return $this->dao->findById(get_class(new Laboratorio()), $id);
        } catch (\Exception $ex) {
            throw new \Exception($ex->getMessage(), $ex->getCode(), $ex->getPrevious());
        }
    }
    
    public function atualizar($laboratorio){
        try{
            $this->dao->update($laboratorio);
        } catch (\Exception $ex) {
            throw new \Exception($ex->getMessage(), $ex->getCode(), $ex->getPrevious());
        }
    }
    
    public function buscarTodos(){
        try{
            return $this->dao->findAll(get_class(new Laboratorio()));
        } catch (\Exception $ex) {
            throw new \Exception($ex->getMessage(), $ex->getCode(), $ex->getPrevious());
        }
    }
    
    public function buscarPorNome($nome){
        $query = "SELECT laboratorio FROM LabManager\Bean\Laboratorio laboratorio WHERE LOWER(laboratorio.nome) = :nome";
        try{
            return $this->dao->findByParam($query, array('nome' => $nome));
        } catch (\Exception $ex) {
            throw new \Exception($ex->getMessage(), $ex->getCode(), $ex->getPrevious());
        }
    }
    
    public function excluir($laboratorio){
        try{
            $labToRemove = $this->buscarPorID($laboratorio->getId());
            $this->dao->delete($labToRemove);
        } catch (\Exception $ex) {
            throw new \Exception($ex->getMessage(), $ex->getCode(), $ex->getPrevious());
        }
    }
    
}
