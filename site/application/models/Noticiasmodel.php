<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

use LabManager\Facade\NoticiaFacade;
use LabManager\Facade\LaboratorioFacade;
use LabManager\Facade\ProjetoFacade;

use LabManager\Bean\Noticia;
use LabManager\Bean\NoticiaLaboratorio;
use LabManager\Bean\NoticiaProjeto;

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
            $noticia = $facade->findById($id);
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
        
        if (isset($arrayNoticia['lab']) && $arrayNoticia['lab'] != 0) {
            $noticia->setNoticiaLaboratorio($this->createNoticiaLaboratorio($noticia, $arrayNoticia['lab']));
        }
        if (isset($arrayNoticia['projeto']) && $arrayNoticia['projeto'] != 0) {
            $noticia->setNoticiaProjeto($this->createNoticiaProjeto($noticia, $arrayNoticia['projeto']));
        }

        try {
            $noticia = $facade->save($noticia);
        } catch (Exception $ex) {
            throw new Exception($ex->getMessage());
        }



        return $noticia;
    }

    public function atualizar($arrayNoticia) {
        $facade = new NoticiaFacade();
        $noticia = new Noticia();
        $noticia = $facade->findById($arrayNoticia['id']);
        $noticia->setCapa($arrayNoticia['capa']);
        $noticia->setTitulo($arrayNoticia['titulo']);
        $noticia->setTexto($arrayNoticia['conteudo']);
        $noticia->setData(new DateTime());
        if (isset($arrayNoticia['lab']) && $arrayNoticia['lab'] != 0) {
            $noticia->setNoticiaLaboratorio($this->createNoticiaLaboratorio($noticia, $arrayNoticia['lab']));
        }else{
            $noticia->setNoticiaLaboratorio(NULL);
        }
        if (isset($arrayNoticia['projeto']) && $arrayNoticia['projeto'] != 0) {
            $noticia->setNoticiaProjeto($this->createNoticiaProjeto($noticia, $arrayNoticia['projeto']));
        }else{
            $noticia->setNoticiaProjeto(NULL);
        }
        try {
            $retorno = $facade->update($noticia);
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

    public function createNoticiaLaboratorio($noticia, $idLab) {
        $labFacade = new LaboratorioFacade();
        $laboratorio = $labFacade->findById($idLab);
        if ($laboratorio == null) {
            throw new Exception('Houve um erro ao linkar esta notício ao laboratório');
        }

        return new NoticiaLaboratorio(NULL, $laboratorio, $noticia);
    }

    public function createNoticiaProjeto($noticia, $idProjeto) {
        $projetoFacade = new ProjetoFacade();
        $projeto = $projetoFacade->findById($idProjeto);
        if ($projeto == null) {
            throw new Exception('Houve um erro ao linkar esta notício ao laboratório');
        }

        return new NoticiaProjeto(NULL, $noticia, $projeto);
    }

}
