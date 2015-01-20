<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
use LabManager\Facade\NoticiaFacade;
use LabManager\Bean\Noticia;
/**
 * Description of Noticiasmodel
 *
 * @author Lázaro Henrique <lazarohcm@gmail.com>
 * @version string
 */
class NoticiasModel extends CI_Model {
    public function buscarTodos(){
        $facade = new NoticiaFacade();
        try {
            $arrayNoticias = $facade->buscarTodos();
        } catch (Exception $ex) {
            throw new Exception($ex->getMessage());
        }
        
        return $arrayNoticias;
    }
    
    public function buscarPorID($id){
       $facade = new NoticiaFacade();
        try {
            $noticia = $facade->buscarPorID($id);
        } catch (Exception $ex) {
            throw new Exception($ex->getMessage());
        }
        
        return $noticia; 
    }
    
    public function cadastrar($arrayNoticia){
        $facade = new NoticiaFacade();
        $noticia = new Noticia();
        $noticia->setCapa($arrayNoticia['capa']);
        $noticia->setTitulo($arrayNoticia['titulo']);
        $noticia->setTexto($arrayNoticia['conteudo']);
        $noticia->setData(new DateTime());
        try {
            $retorno = $facade->salvar($noticia);
        } catch (Exception $ex) {
            throw new Exception($ex->getMessage());
        }
        
        return $retorno;
        
    }
    
    public function atualizar($arrayNoticia){
        $facade = new NoticiaFacade();
        $noticia = new Noticia();
        $noticia = $facade->buscarPorID($arrayNoticia['id']);
        $noticia->setCapa($arrayNoticia['capa']);
        $noticia->setTitulo($arrayNoticia['titulo']);
        $noticia->setTexto($arrayNoticia['conteudo']);
        $noticia->setData(new DateTime());
        try {
            $retorno = $facade->atualizar($noticia);
        } catch (Exception $ex) {
            throw new Exception($ex->getMessage());
        }
        return TRUE;
    }
    
    public function remover($id){
        $facade = new NoticiaFacade();
        try {
            $noticia = $facade->buscarPorID($id);
            $facade->excluir($noticia);
        } catch (Exception $ex) {
            throw new Exception($ex->getMessage());
        }
        
        return TRUE;
    }
}
