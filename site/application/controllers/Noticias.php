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

    public function cadastrar() {
        if (!$this->sessioncontrol->isLoggedIn()) {
            redirect('/acesso/index');
        }
        
        if (!$this->input->is_ajax_request()) {
            redirect('home');
        }
        
        $arrayRequest = $this->input->post();
        $this->load->model('noticiasmodel');
        try {
            $this->noticiasmodel->cadastrar($arrayRequest);
            $retorno = array('sucesso' => true, 'msg' => 'A notícia foi cadastrada');
        } catch (Exception $ex) {
            $retorno = array('sucesso' => false, 'msg' => $ex->getMessage());
        }
        $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode($retorno));
    }

    public function read($id = NULL) {
        $this->load->model('noticiasmodel');
        if ($id == NULL) {
            show_404();
        }
        try {
            $noticia = $this->noticiasmodel->buscarPorID($id);
        } catch (Exception $ex) {
            throw new Exception($ex->getMessage());
        }
        $this->templateadmin->load('noticias/read', TITULO_SITE, '', TRUE, array('noticia' => $noticia));
    }

    public function buscarporid() {
        if (!$this->sessioncontrol->isLoggedIn()) {
            redirect('/acesso/index');
        }
        
        if (!$this->input->is_ajax_request()) {
            redirect('home');
        }
        
        $arrayRequest = $this->input->post();
        $this->load->model('noticiasmodel');
        try {
            $noticia = $this->noticiasmodel->buscarPorID($arrayRequest['id']);
            $idLab = 0;
            $idProjeto = 0;
            $capa = '';
            if($noticia->getNoticiaLaboratorio() != NULL){
                $idLab = $noticia->getNoticiaLaboratorio()->getLaboratorio()->getId();
            }
            if($noticia->getNoticiaProjeto() != NULL){
                $idProjeto = $noticia->getNoticiaProjeto()->getProjeto()->getId();
            }
            if($noticia->getCapa() != NULL){
                $capa = stream_get_contents($noticia->getCapa());
            }
            $array = array('id' => $noticia->getId(), 'titulo' => $noticia->getTitulo(), 'texto' => $noticia->getTexto(),
                'capa' => $capa, 'laboratorio' => $idLab,'projeto' => $idProjeto);
        } catch (Exception $ex) {
            throw new Exception($ex->getMessage());
        }
        $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode(array('sucesso' => true, 'noticia' => $array)));
    }

    public function atualizar() {
        if (!$this->sessioncontrol->isLoggedIn()) {
            redirect('/acesso/index');
        }
        
        if (!$this->input->is_ajax_request()) {
            redirect('home');
        }
        
        $arrayRequest = $this->input->post();
        $this->load->model('noticiasmodel');
        try {
            $this->noticiasmodel->atualizar($arrayRequest);
            $retorno = array('sucesso' => true, 'msg' => 'A notícia foi alterada');
        } catch (Exception $ex) {
            $retorno = $ex->getMessage();
        }
        $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode($retorno));
    }

    public function remover() {
        if (!$this->sessioncontrol->isLoggedIn()) {
            redirect('/acesso/index');
        }
        
        if (!$this->input->is_ajax_request()) {
            redirect('home');
        }
        
        $arrayRequest = $this->input->post();
        $this->load->model('noticiasmodel');
        try {
            if (isset($arrayRequest['id'])) {
                $this->noticiasmodel->remover($arrayRequest['id']);
                $retorno = array('sucesso' => true, 'msg' => 'A notícia foi removida');
            } else {
                $retorno = array('sucesso' => false, 'msg' => 'Erro ao remover notícia, id não encontrado');
            }
        } catch (Exception $ex) {
            $retorno = array('sucesso' => false, 'msg' => $ex->getMessage());
        }
        $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode($retorno));
    }

}
