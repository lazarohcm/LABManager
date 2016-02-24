<?php

/* Arquivo para iniciação de frameworks
 * @autor Lázaro Henrique <lazarohcm@gmail.com>
 * @version 1.0
 */
define("CAMINHO_APLICACAO_DOMINIO", dirname(__FILE__).DIRECTORY_SEPARATOR);


/**
 * MODO_DENSENVOLVIMENTO
 * @param string production     Ambiente de produção
 * @param string test           Ambiente de Teste
 * @param string homolog        Ambiente de Homologação
 */
define("MODO_DESENVOLVIMENTO_DOMINIO", "test");

/**
 * CAMINHO DO DIRETORIO DE LOG
 */
define("MOD_SEGURANCA_CAMINHO_DIRETORIO_LOG", CAMINHO_APLICACAO_DOMINIO . DIRECTORY_SEPARATOR . "log");

/**
 * CAMINHO DO DIRETORIO DE SCHEMA JSON
 */
define("MOD_SEGURANCA_CAMINHO_JSON_SCHEMAS", CAMINHO_APLICACAO_DOMINIO . "REST" . DIRECTORY_SEPARATOR . DIRECTORY_SEPARATOR . "Json" . DIRECTORY_SEPARATOR . "Schemas" . DIRECTORY_SEPARATOR);

/**
 * Auto loading namespace
 * Doctrine 2.4
 * Zend Framework 2.2.5
 */
require_once 'Autoload/autoload.php';
require_once  'vendor/autoload.php';