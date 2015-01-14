<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of projetos
 *
 * @author Lázaro Henrique <lazarohcm@gmail.com>
 * @version string
 */
class projetos  extends CI_Controller{
    
    public function index(){
        $this->load->model('laboratoriomodel');
        try{
            $lab = $this->laboratoriomodel->buscarPorNome('algo');
        } catch (Exception $ex) {
            throw new Exception($ex->getMessage());
        }
        $this->templateadmin->load('projetos/projetos',TITULO_SITE, '', TRUE, array());
    }
}
