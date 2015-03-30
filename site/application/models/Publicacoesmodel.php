<?php
//defined('BASEPATH') OR exit('No direct script access allowed');

use LabManager\Facade\PublicacaoFacade;

/**
 * Description of Publicacaomodel
 *
 * @author lazaro
 */
class Publicacoesmodel extends CI_Model {
    public function buscarTodos(){
        $facade = new PublicacaoFacade();
        try{
            $publicacoes = $facade->findAll();
        }  catch (\Exception $ex){
            throw new Exception($ex->getMessage());
        }
        return $publicacoes;
    }
}
