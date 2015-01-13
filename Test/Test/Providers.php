<?php
/**
 * Description of Providers
 *
 * @author Lázaro Henrique <lazarohcm@gmail.com>
 * @version string
 */

namespace Test;

use LabManager\Bean\Laboratorio;
use LabManager\Bean\Membro;
class Providers {
    
    public function laboratorioProvider(){
        $id = NULL;
        $nome = "LABPai";
        $descricao = "Laboratorio que realiza pesquisas na área de ..";
        $telefone = "98-3237-3232";
        $laboratorio = new Laboratorio($id, $nome, $descricao, $telefone);
        return $laboratorio;
    }
    public function MembroProvider(){
        $id = NULL;
        $nome = "Lázaro";
        $laboratorio = $this->laboratorioProvider();
        $ativo = TRUE;
        $tipo = 'Graduando';
        $data_entrada = new \DateTime();
        $data_saida = new \DateTime();
        
        $membro = new Membro($id,$laboratorio,$nome ,$ativo ,$tipo ,$email = 'lazarohcm@gmail.com' ,$telefone = NULL ,
            $facebook = NULL ,$twitter = NULL ,$linkdl = NULL ,$data_entrada,$data_saida ,$biografia = 'Legal' ,
            $area_interesse = NULL ,$admin = TRUE ,$senha = md5('123456') ,$usuario = 'lazarohcm' ,$lattes = '...' ,$foto = '...');
        $membro->setLaboratorio($laboratorio);
        return $membro;
    }
    
}
