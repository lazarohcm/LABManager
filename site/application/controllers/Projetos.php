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
        if (!$this->sessioncontrol->isLoggedIn()) {
            redirect('/acesso/index');
        }
        
        if (!$this->input->is_ajax_request()) {
            redirect('home');
        }
        
        $arrayRequest = $this->input->post();
        $this->load->model('projetosmodel');
        try {
            $this->projetosmodel->cadastrar($arrayRequest);
            $retorno = array('sucesso' => true, 'msg' => 'O projeto foi cadastrado!');
        } catch (Exception $ex) {
            $retorno = array('sucesso' => false, 'msg' => $ex->getMessage());
        }
        $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode($retorno));
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
    
    public function atualizar(){
        if (!$this->sessioncontrol->isLoggedIn()) {
            redirect('/acesso/index');
        }
        
        if (!$this->input->is_ajax_request()) {
            redirect('home');
        }
        
        $arrayRequest = $this->input->post();
        $this->load->model('projetosmodel');
        try {
            $this->projetosmodel->atualizar($arrayRequest);
            $retorno = array('sucesso' => true, 'msg' => 'Projeto cadastrado com sucesso');
        } catch (Exception $ex) {
            
            $retorno = array('sucesso' => true, 'msg' => $ex->getMessage());
        }
        $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode($retorno));
    }
    
    public function remover(){
        if (!$this->sessioncontrol->isLoggedIn()) {
            redirect('/acesso/index');
        }
        
        if (!$this->input->is_ajax_request()) {
            redirect('home');
        }
        $arrayRequest = $this->input->post();
        $this->load->model('projetosmodel');
        
        try{
            $this->projetosmodel->remover($arrayRequest['idProjeto']);
            $retorno = array('sucesso' => true, 'msg' => 'Projeto removido com sucesso');
        } catch (Exception $ex) {
            $retorno = array('sucesso' => false, 'msg' =>$ex->getMessage());
        }
        $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode($retorno));
    }
    
    public function buscarporid(){
        if (!$this->sessioncontrol->isLoggedIn()) {
            redirect('/acesso/index');
        }
        
        if (!$this->input->is_ajax_request()) {
            redirect('home');
        }
        
        $arrayRequest = $this->input->post();
        $this->load->model('projetosmodel');
        try {
            $projeto = $this->projetosmodel->buscarPorId($arrayRequest['idProjeto']);
            $inicio = NULL;
            $termino = NULL;
            if( $projeto->getData_inicio() != NULL){
                $inicio = $projeto->getData_inicio()->format('d/m/Y');
            }
            if($projeto->getData_termino() != NULL){
                $termino = $projeto->getData_termino()->format('d/m/Y');
            }
            $arrayProjeto = array();
            if($projeto != NULL){
                $arrayProjeto = array('nome' => $projeto->getNome(), 'inicio' => $inicio, 'termino' => $termino, 
                    'laboratorio' => $projeto->getLaboratorio()->getId(),'coordenador' => $projeto->getCoordenador()->getId(), 
                    'descricao'=> $projeto->getTexto(), 'capaProjeto' => stream_get_contents($projeto->getImagem()));
            }
        } catch (Exception $ex) {
            throw new Exception($ex->getMessage());
        }
        $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode(array('sucesso' => true, 'projeto' => $arrayProjeto)));
    }
    
    public function buscarTodosArray(){
        if (!$this->sessioncontrol->isLoggedIn()) {
            redirect('/acesso/index');
        }
        
        if (!$this->input->is_ajax_request()) {
            redirect('home');
        }
        
        $this->load->model('projetosmodel');
        try {
            $projetos = $this->projetosmodel->buscarTodosArray();
            $retorno = array('sucesso' => true, 'projetos' => $projetos);
        } catch (Exception $ex) {
            $retorno = array('sucesso' => false, 'msg' => $ex->getMessage());
        }
        $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode($retorno));
    }
}
