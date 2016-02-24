<?php

/**
 * Description of Home
 *
 * @author lateds
 */
class home extends CI_Controller{
    
    public function index(){
        $this->load->model('laboratoriomodel');
        $this->load->model('projetosmodel');
        $arrayProjetos = $this->projetosmodel->buscarTodos();
        $arrayLabs = $this->laboratoriomodel->buscarTodos();
        $this->templateadmin->load('portal/home', TITULO_SITE, '', TRUE, array('laboratorios' => $arrayLabs, 'projetos' => $arrayProjetos));
    }
    
    public function contato(){
        $this->load->model('laboratoriomodel');
        $this->templateadmin->load('portal/contato', TITULO_SITE, '', TRUE, array(''));
    }
    public function agendar(){
        $this->load->model('laboratoriomodel');
        $this->templateadmin->load('portal/agendar', TITULO_SITE, '', TRUE, array(''));
    }
}
