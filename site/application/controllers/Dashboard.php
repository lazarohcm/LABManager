<?php

/**
 * Description of Dashboard
 *
 * @author lateds
 */
class dashboard extends CI_Controller {
    
    public function index(){
        redirect('dashboard/laboratorios');
    }
    
    public function laboratorios(){
        $this->load->model('laboratoriomodel');
        $arrayLaboratorios = $this->laboratoriomodel->buscarTodos();
        $sidebar = $this->load->view('layout/sidebar', '', true);
        $this->templateadmin->load('dashboard/laboratorios',TITULO_SITE, $sidebar, TRUE, array('laboratorios' => $arrayLaboratorios));
    }
    
}
