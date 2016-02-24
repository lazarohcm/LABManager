<?php

/**
 * Description of Publicacoes
 *
 * @author Lázaro Henrique <lazarohcm@gmail.com>
 * @version string
 */
class Publicacoes extends CI_Controller {

    public function index() {
        $this->load->model('publicacoesmodel');
        try {
            $publicacoes = $this->publicacoesmodel->buscarTodosPorAno();
        } catch (Exception $ex) {
            throw new Exception($ex->getMessage());
        }
        $this->templateadmin->load('publicacoes/publicacoes', TITULO_SITE, '', TRUE, array('publicacoesPorAno' => $publicacoes));
    }

    public function cadastrar() {
        if (!$this->sessioncontrol->isLoggedIn()) {
            redirect('/acesso/index');
        }

        if (!$this->input->is_ajax_request()) {
            redirect('home');
        }

        $arrayRequest = $this->input->post();
        $this->load->model('publicacoesmodel');
        try {
            $this->publicacoesmodel->cadastrar($arrayRequest);
            $retorno = array('sucesso' => true, 'msg' => 'Publicação cadastrada com sucesso');
        } catch (\Exception $ex) {
            $retorno = array('sucesso' => false, 'msg' => $ex->getMessage());
        }
        $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode($retorno));
    }
    
    public function atualizar() {
        if (!$this->sessioncontrol->isLoggedIn()) {
            redirect('/acesso/index');
        }

        if (!$this->input->is_ajax_request()) {
            redirect('home');
        }

        $arrayRequest = $this->input->post();
        $this->load->model('publicacoesmodel');
        try {
            $this->publicacoesmodel->atualizar($arrayRequest);
            $retorno = array('sucesso' => true, 'msg' => 'Publicação atualizada com sucesso');
        } catch (\Exception $ex) {
            $retorno = array('sucesso' => false, 'msg' => $ex->getMessage());
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
        $this->load->model('publicacoesmodel');
        
        try {
            $this->publicacoesmodel->remover($arrayRequest['id']);
            $retorno = array('sucesso' => true, 'msg' => 'A publicação removida!');
        } catch (\Exception $ex) {
            $retorno = array('sucesso' => false, 'msg' => $ex->getMessage());
        }
        $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode($retorno));
    }
    
    public function buscarPorId() {
        if (!$this->sessioncontrol->isLoggedIn()) {
            redirect('/acesso/index');
        }

        if (!$this->input->is_ajax_request()) {
            redirect('home');
        }

        $arrayRequest = $this->input->post();
        $this->load->model('publicacoesmodel');
        
        try {
            $publicacao = $this->publicacoesmodel->buscarPorId($arrayRequest['id']);
            $arrayPublicacao = array(
                'titulo' => $publicacao->getTitulo(),
                'data' => $publicacao->getData()->format('d/m/Y'),
                'linkDownload' => $publicacao->getLinkDownload(),
                'arquivo' => $publicacao->getArquivo(),
                'autores' => $publicacao->getAutores(),
                'imagem' => stream_get_contents($publicacao->getImagem()),
                'projeto' => $publicacao->getProjeto()->getId()
            );
            $retorno = array('sucesso' => true, 'publicacao' => $arrayPublicacao);
        } catch (\Exception $ex) {
            $retorno = array('sucesso' => false, 'msg' => $ex->getMessage());
        }
        $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode($retorno));
    }

}
