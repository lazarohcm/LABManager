<?php

/**
 * Description of Home
 *
 * @author lateds
 */
class home extends CI_Controller{
    
    public function index(){
        $this->load->model('laboratoriomodel');
        $arrayLabs = $this->laboratoriomodel->buscarTodos();
        $this->templateadmin->load('portal/home', TITULO_SITE, '', TRUE, array('laboratorios' => $arrayLabs));
    }
    
    public function contato(){
        $this->load->model('laboratoriomodel');
        $this->templateadmin->load('contato', TITULO_SITE, '', TRUE, array(''));
    }
}
