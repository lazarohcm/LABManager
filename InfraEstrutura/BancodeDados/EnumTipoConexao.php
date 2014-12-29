<?php
/**
 * UFMA - LabManager 

 * @author Lázaro Henrique <lazarohcm@gmail.com>   
 * @version 1.0
 
 */

namespace InfraEstrutura\BancodeDados;

/**
 * Enum com os tipos de conexões, será repassado para a fabrica de conexões.
 * @package InfraEstrutura\BancodeDados
 */
class EnumTipoConexao {
    const
        __PDO = 0,
        __DOCTRINE2 = 1,
        __MYSQL = 2;
}
