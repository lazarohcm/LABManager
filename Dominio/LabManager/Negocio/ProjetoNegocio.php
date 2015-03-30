<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace LabManager\Negocio;

use LabManager\DAO\DAOGenericImpl;
use LabManager\Bean\Projeto;
use LabManager\Negocio\LaboratorioNegocio;
use LabManager\Negocio\MembroNegocio;
use LabManager\Negocio\AbstractNegocio;
/**
 * Description of ProjetoNegocio
 *
 * @author Lázaro Henrique <lazarohcm@gmail.com>
 * @version string
 */
class ProjetoNegocio extends AbstractNegocio{
    private $membroNegocio;
    private $labNegocio;
    function __construct() {
        parent::setDAO(new DAOGenericImpl());
        parent::setBeanNegocio(new Projeto());
        $this->membroNegocio = new MembroNegocio();
        $this->labNegocio = new LaboratorioNegocio();
    }
    
    function validarObjeto($object) {
        return TRUE;
    }
    
    function attachEntity($object) {
        return $object;
    }   
    
    public function salvar($projetoData){
        $lab = $this->labNegocio->findById($projetoData['idLab']);
        $coordenador = $this->membroNegocio->buscarPorID($projetoData['idCoordenador']);
        $projeto = $projetoData['projeto'];
        $projeto->setLaboratorio($lab);
        $projeto->setCoordenador($coordenador);
        try{
            return parent::save($projeto);
        } catch (\Exception $ex) {
            throw new \Exception($ex->getMessage(), $ex->getCode(), $ex->getPrevious());
        }
    }
    
    public function atualizar($projetoData){
        $lab = $this->labNegocio->findById($projetoData['idLab']);
        $coordenador = $this->membroNegocio->findById($projetoData['idCoordenador']);
        $projeto = $projetoData['projeto'];
        $projeto->setLaboratorio($lab);
        $projeto->setCoordenador($coordenador);
        try{
            $this->dao->update($projeto);
        } catch (\Exception $ex) {
            throw new \Exception($ex->getMessage(), $ex->getCode(), $ex->getPrevious());
        }
    }
}
