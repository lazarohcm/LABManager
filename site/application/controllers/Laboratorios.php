<?php
/**
 * Description of Laboratorios
 *
 * @author lateds
 */
class Laboratorios extends CI_Controller {
    public function cadastrar(){
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
    
    public function buscartodosarray(){
        $this->load->model('laboratoriomodel');
        try{
            $array = $this->laboratoriomodel->buscarTodosArray();
        } catch (Exception $ex) {
            throw new Exception($ex->getMessage());
        }
        
        $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode(array('sucesso' => true, 'lab' =>$array)));
    }
    
    public function lab($nomeLab){
        $this->load->model('laboratoriomodel');
        try{
            $lab = $this->laboratoriomodel->buscarPorNome($nomeLab);
        } catch (Exception $ex) {
            throw new Exception($ex->getMessage());
        }
        $this->templateadmin->load('laboratorio/laboratorio',TITULO_SITE, '', TRUE, array('laboratorio' => $lab));
    }
    
    public function remover(){
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
