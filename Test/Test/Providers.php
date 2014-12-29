<?php
/**
 * Description of Providers
 *
 * @author Lázaro Henrique <lazarohcm@gmail.com>
 * @version string
 */

namespace Test;

use LabManager\Bean\Laboratorio;
class Providers {
    
    public function laboratorioProvider(){
        $id = NULL;
        $nome = "LABPai";
        $descricao = "Laboratorio que realiza pesquisas na área de ..";
        $telefone = "98-3237-3232";
        $laboratorio = new Laboratorio($id, $nome, $descricao, $telefone);
        return $laboratorio;
    }
    
    public function membroProvider(){
        $id = NULL;
        
    }
}
