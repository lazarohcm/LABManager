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
    public function cadastrar(){
        $arrayRequest = $this->input->post();
        $this->load->model('membrosmodel'); 
        try{
            $membro = $this->membrosmodel->cadastrar($arrayRequest);
        } catch (Exception $ex) {
            throw new Exception($ex->getMessage());
        }
        $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode(array('sucesso' => true, 'membro' =>$membro)));
    }
    
    public function buscarPorId(){
        $arrayRequest = $this->input->post();
        $this->load->model('membrosmodel'); 
        try{
            $membro = $this->membrosmodel->buscarPorId($arrayRequest['idUsuario']);
        } catch (Exception $ex) {
            throw new Exception($ex->getMessage());
        }
        $arrayMembro = array('nome' => $membro->getNome(), 'email'  => $membro->getEmail(), 'usuario'  => $membro->getUsuario(), 
            'laboratorio'  => $membro->getlaboratorio()->getId(),'tipo' => $membro->getTipo(), 'entrada'  => $membro->getData_entrada()->format('d/m/Y'), 
            'saida'  => $membro->getData_saida()->format('d/m/Y'), 'ativo'  => $membro->getAtivo(), 'admin'  => $membro->getAdmin(), 'foto'  => stream_get_contents($membro->getFoto()));
        $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode(array('sucesso' => true, 'membro' =>$arrayMembro)));
    }
    
    public function remover(){
        $arrayRequest = $this->input->post();
        $this->load->model('membrosmodel'); 
        try{
            $retorno = $this->membrosmodel->remover($arrayRequest['idUsuario']);
        } catch (Exception $ex) {
            throw new Exception($ex->getMessage());
        }
        
        $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode(array('sucesso' => true, 'retorno' =>$retorno)));
    }
    
}
