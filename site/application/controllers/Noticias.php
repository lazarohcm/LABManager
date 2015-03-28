<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Noticias
 *
 * @author Lázaro Henrique <lazarohcm@gmail.com>
 * @version string
 */
class Noticias extends CI_Controller {

    public function index() {
        $this->load->model('noticiasmodel');
        try {
            $noticias = $this->noticiasmodel->buscarTodos();
        } catch (Exception $ex) {
            throw new Exception($ex->getMessage());
        }
        $this->templateadmin->load('noticias/noticias', TITULO_SITE, '', TRUE, array('noticias' => $noticias));
    }
    
    public function cadastrar(){
        $arrayRequest = $this->input->post();
        $this->load->model('noticiasmodel');
        try {
            $this->noticiasmodel->cadastrar($arrayRequest);
            $retorno = array('sucesso' => true, 'msg' => 'A notícia foi cadastrada');
        } catch (Exception $ex) {
            $retorno =  array ('sucesso' => false, 'msg' => $ex->getMessage());
        }
        $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode(array('sucesso' => true, 'noticia' => $retorno)));
    }
    
    public function read($id = NULL){
        $this->load->model('noticiasmodel');
        if($id == NULL){
            show_404();
        }
        try {
            $noticia = $this->noticiasmodel->buscarPorID($id);
        } catch (Exception $ex) {
            throw new Exception($ex->getMessage());
        }
        $this->templateadmin->load('noticias/read', TITULO_SITE, '', TRUE, array('noticia' => $noticia));
    }
    
    public function buscarporid(){
        $arrayRequest = $this->input->post();
        $this->load->model('noticiasmodel');
        try {
            $noticia = $this->noticiasmodel->buscarPorID($arrayRequest['id']);
            $array = array('id' => $noticia->getId(), 'titulo' => $noticia->getTitulo(), 'texto' => $noticia->getTexto(),  
                'capa' => stream_get_contents($noticia->getCapa()));
        } catch (Exception $ex) {
            throw new Exception($ex->getMessage());
        }
        $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode(array('sucesso' => true, 'noticia' => $array)));
    }
    
    public function atualizar(){
        $arrayRequest = $this->input->post();
        $this->load->model('noticiasmodel');
        try {
            $noticia = $this->noticiasmodel->atualizar($arrayRequest);
        } catch (Exception $ex) {
            throw new Exception($ex->getMessage());
        }
        $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode(array('sucesso' => true)));
    }
    
    
    public function remover(){
        $arrayRequest = $this->input->post();
        $this->load->model('noticiasmodel');
        try {
            $this->noticiasmodel->remover($arrayRequest['id']);
            $retorno = array('sucesso' => true, 'msg' => 'A notícia foi removida');
        } catch (Exception $ex) {
            $retorno = array('sucesso' => false, 'msg' => $ex->getMessage());
        }
        $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode($retorno));
    }

}
