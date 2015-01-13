<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
use LabManager\Facade\NoticiaFacade;
/**
 * Description of Noticiasmodel
 *
 * @author Lázaro Henrique <lazarohcm@gmail.com>
 * @version string
 */
class NoticiasModel extends CI_Model {
    public function buscarTodos(){
        $facade = new NoticiaFacade();
        try {
            $arrayNoticias = $facade->buscarTodos();
        } catch (Exception $ex) {
            throw new Exception($ex->getMessage());
        }
        
        return $arrayNoticias;
    }
}
