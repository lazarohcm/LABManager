<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

use LabManager\Facade\NoticiaFacade;
use LabManager\Facade\LaboratorioFacade;
use LabManager\Facade\NoticiaLaboratorioFacade;
use LabManager\Bean\Noticia;
use LabManager\Bean\NoticiaLaboratorio;

/**
 * Description of Noticiasmodel
 *
 * @author Lázaro Henrique <lazarohcm@gmail.com>
 * @version string
 */
class NoticiasModel extends CI_Model {

    public function buscarTodos() {
        $facade = new NoticiaFacade();
        try {
            $arrayNoticias = $facade->findAll();
        } catch (Exception $ex) {
            throw new Exception($ex->getMessage());
        }

        return $arrayNoticias;
    }

    public function buscarPorID($id) {
        $facade = new NoticiaFacade();
        try {
            $noticia = $facade->buscarPorID($id);
        } catch (Exception $ex) {
            throw new Exception($ex->getMessage());
        }

        return $noticia;
    }

    public function cadastrar($arrayNoticia) {
        if (strlen($arrayNoticia['titulo']) < 6) {
            throw new Exception('O título da Publicação é muito pequeno');
        } else if (strlen($arrayNoticia['conteudo']) < 10) {
            throw new Exception('Escreva um pouco mais no corpo da notícia');
        }

        $facade = new NoticiaFacade();
        $noticia = new Noticia();
        $noticia->setCapa($arrayNoticia['capa']);
        $noticia->setTitulo($arrayNoticia['titulo']);
        $noticia->setTexto($arrayNoticia['conteudo']);
        $noticia->setData(new DateTime());
        
        try {
            $noticia = $facade->save($noticia);
        } catch (Exception $ex) {
            throw new Exception($ex->getMessage());
        }
        
        if(isset($arrayNoticia['lab']) && $arrayNoticia['lab'] != 0){
            $this->saveNoticiaLaboratorio($noticia, $arrayNoticia['lab']);
        }

        return $noticia;
    }

    public function saveNoticiaLaboratorio($noticia, $idLab) {
        $labFacade = new LaboratorioFacade();
        $noticiaLabFacede = new NoticiaLaboratorioFacade();
        $laboratorio = $labFacade->findById($idLab);
        if ($laboratorio == null){
            throw new Exception('Houve um erro ao linkar esta notício ao laboratório');
        }
        
        $noticiaLab = new NoticiaLaboratorio(NULL, $laboratorio, $noticia);
        
        try{
            $noticiaLabFacede->save($noticiaLab);
        }  catch (\Exception $ex){
            throw new Exception($ex->getMessage());
        }
    }

    public function atualizar($arrayNoticia) {
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

    public function remover($id) {
        $facade = new NoticiaFacade();
        try {
            $noticia = $facade->findById($id);
            $facade->delete($noticia);
        } catch (Exception $ex) {
            throw new Exception($ex->getMessage());
        }

        return TRUE;
    }

}
