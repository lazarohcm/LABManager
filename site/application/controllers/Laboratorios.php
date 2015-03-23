<?php
/**
 * Description of Laboratorios
 *
 * @author lateds
 */
class Laboratorios extends CI_Controller {
    public function cadastrar(){
        if (!$this->sessioncontrol->isLoggedIn()) {
            redirect('/acesso/index');
        }
        $arrayRequest = $this->input->post();
        $this->load->model('laboratoriomodel');
        try{
            $lab = $this->laboratoriomodel->salvar($arrayRequest);
        } catch (Exception $ex) {
            throw new Exception($ex->getMessage());
        }
        
        $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode(array('sucesso' => true, 'lab' =>$lab)));
        
    }
    
    public function atualizar(){
        if (!$this->sessioncontrol->isLoggedIn()) {
            redirect('/acesso/index');
        }
        $arrayRequest = $this->input->post();
        $this->load->model('laboratoriomodel');
        try{
            $this->laboratoriomodel->atualizar($arrayRequest);
        } catch (Exception $ex) {
            throw new Exception($ex->getMessage());
        }
        
        $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode(array('sucesso' => true)));
    }
    
    public function buscarporid(){
        if (!$this->sessioncontrol->isLoggedIn()) {
            redirect('/acesso/index');
        }
        $arrayRequest = $this->input->post();
        $this->load->model('laboratoriomodel');
        try{
            $laboratorio  = $this->laboratoriomodel->buscarPorId($arrayRequest);
        } catch (Exception $ex) {
            throw new Exception($ex->getMessage());
        }
        
        $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode(array('sucesso' => true ,'lab' => $laboratorio)));
    }
    
    public function buscartodosarray(){
        $this->load->model('laboratoriomodel');
        $arrayRequest = $this->input->post();
        try{
            $laboratorio = $this->laboratoriomodel->buscarTodosArray();
        } catch (Exception $ex) {
            throw new Exception($ex->getMessage());
        }
        
        $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode(array('sucesso' => true, 'lab' =>$laboratorio)));
    }
    
    public function visualizar($nomeLab){
        $this->load->model('laboratoriomodel');
        try{
            $lab = $this->laboratoriomodel->buscarPorNome($nomeLab);
        } catch (Exception $ex) {
            throw new Exception($ex->getMessage());
        }
        $this->templateadmin->load('laboratorio/laboratorio',TITULO_SITE, '', TRUE, array('laboratorio' => $lab));
    }
    
    public function remover(){
        if (!$this->sessioncontrol->isLoggedIn()) {
            redirect('/acesso/index');
        }
        $arrayRequest = $this->input->post();
        $this->load->model('laboratoriomodel');
        try{
            $this->laboratoriomodel->remover($arrayRequest['id']);
        } catch (Exception $ex) {
            throw new Exception($ex->getMessage());
        }
        
        $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode(array('sucesso' => true)));
        
    }
}
