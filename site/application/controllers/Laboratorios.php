<?php

/**
 * Description of Laboratorios
 *
 * @author lateds
 */
class Laboratorios extends CI_Controller {

    public function cadastrar() {
        if (!$this->sessioncontrol->isLoggedIn()) {
            redirect('/acesso/index');
        }
        $arrayRequest = $this->input->post();
        $this->load->model('laboratoriomodel');
        try {
            $this->laboratoriomodel->salvar($arrayRequest);
            $retorno = array('sucesso' => true, 'msg' => 'Laboraótrio cadastrado com sucesso');
        } catch (Exception $ex) {
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
        $arrayRequest = $this->input->post();
        $this->load->model('laboratoriomodel');
        try {
            $this->laboratoriomodel->atualizar($arrayRequest);
            $retorno = array('sucesso' => true, 'msg' => 'Laboraótrio atualizado com sucesso!');
        } catch (Exception $ex) {
            $retorno = array('sucesso' => false, 'msg' => $ex->getMessage());
        }

        $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode($retorno));
    }

    public function buscarporid() {
        if (!$this->sessioncontrol->isLoggedIn()) {
            redirect('/acesso/index');
        }
        $arrayRequest = $this->input->post();
        $this->load->model('laboratoriomodel');
        try {
            $laboratorio = $this->laboratoriomodel->buscarPorId($arrayRequest['id']);
        } catch (Exception $ex) {
            throw new Exception($ex->getMessage());
        }

        $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode(array('sucesso' => true, 'lab' => $laboratorio)));
    }

    public function buscartodosarray() {
        $this->load->model('laboratoriomodel');
        $arrayRequest = $this->input->post();
        try {
            $laboratorio = $this->laboratoriomodel->buscarTodosArray();
        } catch (Exception $ex) {
            throw new Exception($ex->getMessage());
        }

        $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode(array('sucesso' => true, 'lab' => $laboratorio)));
    }

    public function visualizar($siglaLab) {
        $this->load->model('laboratoriomodel');
        try {
            $lab = $this->laboratoriomodel->buscarPorSigla($siglaLab);
        } catch (Exception $ex) {
            throw new Exception($ex->getMessage());
        }

        if ($lab == NULL) {
            $this->templateadmin->load('laboratorio/not_found', TITULO_SITE, '', TRUE, array());
        } else {
            $this->templateadmin->load('laboratorio/laboratorio', TITULO_SITE, '', TRUE, array('laboratorio' => $lab));
        }
    }

    public function remover() {
        if (!$this->sessioncontrol->isLoggedIn()) {
            redirect('/acesso/index');
        }
        $arrayRequest = $this->input->post();
        $this->load->model('laboratoriomodel');
        try {
            $this->laboratoriomodel->remover($arrayRequest['id']);
            $retorno = array('sucesso' => true, 'msg' => 'Laboratório Removido com Sucesso!');
        } catch (Exception $ex) {
            $retorno = array('sucesso' => false, 'msg' => $ex->getMessage());
        }

        $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode($retorno));
    }

}
