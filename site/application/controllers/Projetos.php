<?php
/**
 * Description of projetos
 *
 * @author Lázaro Henrique <lazarohcm@gmail.com>
 * @version string
 */
class projetos extends CI_Controller {

    public function index() {
        $this->load->model('projetosmodel');
        try {
            $arrayProjetos = $this->projetosmodel->buscarTodos();
        } catch (Exception $ex) {
            throw new Exception($ex->getMessage());
        }
        $this->templateadmin->load('projetos/projetos', TITULO_SITE, '', TRUE, array('projetos' =>  $arrayProjetos));
    }

    public function cadastrar() {
        $arrayRequest = $this->input->post();
        $this->load->model('projetosmodel');
        try {
            $projeto = $this->projetosmodel->cadastrar($arrayRequest);
        } catch (Exception $ex) {
            throw new Exception($ex->getMessage());
        }
        $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode(array('sucesso' => true, 'projeto' => $projeto)));
    }
    
    public function visualizar($id = NULL){
        if($id == NULL){
            show_404();
        }
        $this->load->model('projetosmodel');
        try {
            $projeto = $this->projetosmodel->buscarPorId($id);
        } catch (Exception $ex) {
            throw new Exception($ex->getMessage());
        }
        $this->templateadmin->load('projetos/view', TITULO_SITE, '', TRUE, array('projeto' =>  $projeto));
    }
    

}
