<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Description of Dashboard
 *
 * @author lateds
 */
class dashboard extends CI_Controller {

    public function index() {
        redirect('dashboard/noticias');
    }

    public function laboratorios() {
        if (!$this->sessioncontrol->isLoggedIn()) {
            redirect('/acesso/index');
        }
        $this->load->model('laboratoriomodel');
        $userData = $this->sessioncontrol->getUserDataSession();
        if (!$userData['admin'])
            redirect('/dashboard/perfil');
        $arrayLaboratorios = $this->laboratoriomodel->buscarTodos();
        $sidebar = $this->load->view('layout/sidebar', array('usuario' => $userData), true);
        $this->templateadmin->load('dashboard/laboratorios', TITULO_SITE, $sidebar, TRUE, array('laboratorios' => $arrayLaboratorios));
    }

    public function membros() {
        if (!$this->sessioncontrol->isLoggedIn()) {
            redirect('/acesso/index');
        }
        $this->load->model('membrosmodel');
        $arrayMembros = $this->membrosmodel->buscarTodos();
        $userData = $this->sessioncontrol->getUserDataSession();
        if (!$userData['admin'])
            redirect('/dashboard/perfil');
        $sidebar = $this->load->view('layout/sidebar', array('usuario' => $userData), true);
        $this->templateadmin->load('dashboard/membros', TITULO_SITE, $sidebar, TRUE, array('membros' => $arrayMembros));
    }

    public function perfil() {
        if (!$this->sessioncontrol->isLoggedIn()) {
            redirect('/acesso/index');
        }
        $userData = $this->sessioncontrol->getUserDataSession();
        $this->load->model('membrosmodel');
        $membro = $this->membrosmodel->buscarPorId($userData['id']);
        $sidebar = $this->load->view('layout/sidebar', array('usuario' => $userData), true);
        $this->templateadmin->load('dashboard/perfil', TITULO_SITE, $sidebar, TRUE, array('membro' => $membro));
    }

    public function noticias() {
        if (!$this->sessioncontrol->isLoggedIn()) {
            redirect('/acesso/index');
        }
        $userData = $this->sessioncontrol->getUserDataSession();
        if (!$userData['admin'])
            redirect('/dashboard/perfil');
        $this->load->model('noticiasmodel');
        $arrayNoticias = $this->noticiasmodel->buscarTodos();
        $sidebar = $this->load->view('layout/sidebar', array('usuario' => $userData), true);
        $this->templateadmin->load('dashboard/noticias', TITULO_SITE, $sidebar, TRUE, array('noticias' => $arrayNoticias));
    }

    public function projetos() {
        if (!$this->sessioncontrol->isLoggedIn()) {
            redirect('acesso/index');
        }
        $userData = $this->sessioncontrol->getUserDataSession();
        if (!$userData['admin'])
            redirect('/dashboard/perfil');
        $this->load->model('projetosmodel');
        $arrayProjetos = $this->projetosmodel->buscarTodos();
        $sidebar = $this->load->view('layout/sidebar', array('usuario' => $userData), true);
        $this->templateadmin->load('dashboard/projetos', TITULO_SITE, $sidebar, TRUE, array('projetos' => $arrayProjetos));
    }
    
    public function publicacoes(){
        if (!$this->sessioncontrol->isLoggedIn()) {
            redirect('/acesso/index');
        }
        $userData = $this->sessioncontrol->getUserDataSession();
        if (!$userData['admin'])
            redirect('/dashboard/perfil');
        
        $this->load->model('publicacoesmodel');
        $arrayPublicacoes = $this->publicacoesmodel->buscarTodos();
        $sidebar = $this->load->view('layout/sidebar', array('usuario' => $userData), true);
        $this->templateadmin->load('dashboard/publicacoes', TITULO_SITE, $sidebar, TRUE, array('publicacoes' => $arrayPublicacoes));
    }

}
