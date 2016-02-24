<?php
/**
 * Description of Acesso
 *
 * @author Lázaro Henrique <lazarohcm@gmail.com>
 * @version string
 */
class Acesso extends CI_Controller {

    public function index() {
        $erro = $this->session->flashdata('erro');
        if ($this->sessioncontrol->isLoggedIn()) {
            redirect('/dashboard/index');
        }
        $this->templateadmin->load('login', TITULO_SITE, '', TRUE, array('erro' => $erro));
    }

    public function autentica() {
        if ($this->sessioncontrol->isLoggedIn()) {
            redirect('/dashboard/index');
        }
        $dados = $this->input->post();
        if($dados == NULL){
            redirect('acesso/');
        }
        $this->load->model('membrosmodel');
        try {
            if ($this->membrosmodel->autentica($dados['usuario'], $dados['senha'])) {
                redirect("dashboard/index");
            } else {
                $this->session->set_flashdata('erro', 'Senha ou usuário inválidos.');
                redirect('acesso/');
            }
        } catch (Exception $ex) {
            $this->session->set_flashdata('erro', $ex->getMessage());
            redirect('acesso/');
        }
    }
    
    public function sair(){
        $this->session->sess_destroy();
        redirect('/home');
    }

}
