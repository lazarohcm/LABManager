<?php

/**
 * Description of Publicacoes
 *
 * @author Lázaro Henrique <lazarohcm@gmail.com>
 * @version string
 */
class Publicacoes extends CI_Controller {
    public function index(){
        $this->load->model('laboratoriomodel');
        try{
            $lab = $this->laboratoriomodel->buscarPorNome('algo');
        } catch (Exception $ex) {
            throw new Exception($ex->getMessage());
        }
        $this->templateadmin->load('publicacoes/publicacoes',TITULO_SITE, '', TRUE, array());
    }
}
