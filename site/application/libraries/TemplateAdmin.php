<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Description of TemplateAdmin
 *
 * @author lateds
 */
class TemplateAdmin {
    /**
     * Carrega a view do tempalte
     * 
     * @param string $contents
     * @param string $title Título da view
     * @param type $menu Menu que será carregado na view
     * @param boolean $bIncluirButtonMenuResponsivo Indica o botão com informações de usuário será responsivo ou não
     * @param array $view_data Conteúdo a ser passado para a view
     */
    public function load($contents, $title = TITULO_SITE, $menu = '', $bIncluirButtonMenuResponsivo = TRUE, $view_data = array()) 
    {
        $this->CI =& get_instance();
        $this->CI->load->library('template');       
        
        $this->CI->template->set('title', $title);
        $this->CI->template->set('menu', $menu);        
        $this->CI->template->set('bIncluirButtonMenuResponsivo', $bIncluirButtonMenuResponsivo);
        $this->CI->load->model('laboratoriomodel');
        $arrayLaboratorios = $this->CI->laboratoriomodel->buscarTodos();
        $view_data['laboratorios'] = $arrayLaboratorios;
        $this->CI->template->load('layout/modelo', $contents, $view_data);  
    }
}
