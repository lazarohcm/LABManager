<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of membros
 *
 * @author Lázaro Henrique <lazarohcm@gmail.com>
 * @version string
 */
class Membros extends CI_Controller {

    public function index() {
        $this->load->model('membrosmodel');
        try {
            $arrayMembros = $this->membrosmodel->buscarTodos();
        } catch (Exception $ex) {
            throw new Exception($ex->getMessage());
        }
        $professores = array();
        $pesquisadores = array();
        $doutorandos = array();
        $mestrandos = array();
        $graduandos = array();
        $membrosAntigos = array();
        foreach ($arrayMembros as $membro) {
            if ($membro->getData_saida() != NULL) {
                $membrosAntigos[] = $membro;
            } else {
                if ($membro->getTipo() == 'Professor') {
                    $professores[] = $membro;
                }
                if ($membro->getTipo() == 'Pesquisador') {
                    $pesquisadores = $membro;
                }
                if ($membro->getTipo() == 'Doutorando') {
                    $doutorandos = $membro;
                }
                if ($membro->getTipo() == 'Mestrando') {
                    $mestrandos = $membro;
                }
                if ($membro->getTipo() == 'Graduando') {
                    $graduandos = $membro;
                }
            }
        }

        $this->templateadmin->load('membros/membros', TITULO_SITE, '', TRUE, array('professores' => $professores, 'pesquisadores' => $pesquisadores,
            'doutorandos' => $doutorandos, 'mestrandos' => $mestrandos, 'graduandos' => $graduandos, 'membrosAntigos' => $membrosAntigos));
    }

    public function cadastrar() {
        $arrayRequest = $this->input->post();
        $this->load->model('membrosmodel');
        try {
            $membro = $this->membrosmodel->cadastrar($arrayRequest);
        } catch (Exception $ex) {
            throw new Exception($ex->getMessage());
        }
        $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode(array('sucesso' => true, 'membro' => $membro)));
    }

    public function atualizarperfil() {
        if (!$this->sessioncontrol->isLoggedIn()) {
            redirect('/acesso/index');
        }
        $userData = $this->sessioncontrol->getUserDataSession();
        $arrayRequest = $this->input->post();
        $arrayRequest['id'] = $userData['id'];
        $this->load->model('membrosmodel');
        try {
            $membro = $this->membrosmodel->atualizarPerfil($arrayRequest);
        } catch (Exception $ex) {
            throw new Exception($ex->getMessage());
        }
        $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode(array('sucesso' => true, 'membro' => $membro)));
    }

    public function atualizarsenha() {
        if (!$this->sessioncontrol->isLoggedIn()) {
            redirect('/acesso/index');
        }
        $userData = $this->sessioncontrol->getUserDataSession();
        $arrayRequest = $this->input->post();
        $arrayRequest['id'] = $userData['id'];
        $this->load->model('membrosmodel');
        try {
            $retorno = $this->membrosmodel->atualizarSenha($arrayRequest);
        } catch (Exception $ex) {
            throw new Exception($ex->getMessage());
        }
        $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode($retorno));
    }

    public function atualizar() {
        $arrayRequest = $this->input->post();
        $this->load->model('membrosmodel');
        try {
            $membro = $this->membrosmodel->atualizar($arrayRequest);
        } catch (Exception $ex) {
            throw new Exception($ex->getMessage());
        }
        $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode(array('sucesso' => true, 'membro' => $membro)));
    }

    public function buscarPorId() {
        $arrayRequest = $this->input->post();
        $this->load->model('membrosmodel');
        try {
            $membro = $this->membrosmodel->buscarPorId($arrayRequest['idUsuario']);
        } catch (Exception $ex) {
            throw new Exception($ex->getMessage());
        }
        if ($membro->getTipo() == 'Professor')
            $tipo = 1;
        if ($membro->getTipo() == 'Pesquisador')
            $tipo = 2;
        if ($membro->getTipo() == 'Soutorando')
            $tipo = 3;
        if ($membro->getTipo() == 'Mestrando')
            $tipo = 4;
        if ($membro->getTipo() == 'Graduando')
            $tipo = 5;
        $saida = NULL;
        if ($membro->getData_saida() != NULL) {
            $saida = $membro->getData_saida()->format('d/m/Y');
        };
        $arrayMembro = array('nome' => $membro->getNome(), 'email' => $membro->getEmail(), 'usuario' => $membro->getUsuario(),
            'laboratorio' => $membro->getlaboratorio()->getId(), 'tipo' => $tipo, 'entrada' => $membro->getData_entrada()->format('d/m/Y'),
            'saida' => $saida, 'ativo' => $membro->getAtivo(), 'admin' => $membro->getAdmin(), 'foto' => stream_get_contents($membro->getFoto()));
        $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode(array('sucesso' => true, 'membro' => $arrayMembro)));
    }

    public function buscarcoordenadores() {
        $this->load->model('membrosmodel');
        try {
            $array = $this->membrosmodel->buscarCoordenadores();
        } catch (Exception $ex) {
            throw new Exception($ex->getMessage());
        }

        $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode(array('sucesso' => true, 'coordenadores' => $array)));
    }

    public function remover() {
        $arrayRequest = $this->input->post();
        $this->load->model('membrosmodel');
        try {
            $retorno = $this->membrosmodel->remover($arrayRequest['idUsuario']);
        } catch (Exception $ex) {
            throw new Exception($ex->getMessage());
        }

        $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode(array('sucesso' => true, 'retorno' => $retorno)));
    }

    public function visualizar($id) {
        $this->load->model('membrosmodel');
        if ($id == NULL) {
            show_404();
        }
        try {
            $membro = $this->membrosmodel->buscarPorID($id);
        } catch (Exception $ex) {
            throw new Exception($ex->getMessage());
        }
        $this->templateadmin->load('membros/view', TITULO_SITE, '', TRUE, array('membro' => $membro));
    }

    public function buscarmembrosprojeto() {
        $arrayRequest = $this->input->post();
        $this->load->model('membrosmodel');
        try {
            $arrayMembros = array();
            $membros = $this->membrosmodel->buscarTodos();
            if ($membros != NULL) {
                foreach ($membros as $membro) {
                    if (isset($arrayRequest['idProjeto']) && $arrayRequest['idProjeto'] != NULL) {
                        $projetos = $membro->getMembroProjeto();
                        $pertence = false;
                        if ($projetos != NULL) {
                            foreach ($projetos as $projeto) {
                                if ($projeto->getProjeto()->getId() == $arrayRequest['idProjeto']) {
                                    $pertence = TRUE;
                                }
                            }
                        }
                    }

                    $arrayMembros[] = array('id' => $membro->getId(), 'nome' => $membro->getNome(), 'pertence' => $pertence);
                }
            }
        } catch (Exception $ex) {
            throw new Exception($ex->getMessage());
        }
        $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode(array('sucesso' => true, 'arrayMembros' => $arrayMembros)));
    }

}
