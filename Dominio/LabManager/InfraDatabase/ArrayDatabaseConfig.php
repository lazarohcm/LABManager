<?php
/**
 * LabManager
 * @author Lázaro Henrique <lazarohcm@gmail.com>   
 * @version 1.0
 
 */

namespace LabManager\InfraDatabase;

/**
 * Camada InfraDatabase
 * Arquivos de configuração do banco de dados
 * @author sit-unasus   
 * @version 1.0
 * @package SigUSeguranca\InfraDatabase
 */
class ArrayDatabaseConfig {
  
  /**
   * Método que irá retornar as configurações de conexão com o banco de dados
   * @return Array com a configuração de Banco de Dados e seus respectivos ambientes
   */  
  public static function obterDatabaseConfig(){
  
      // Ambiente de Producao
      $databaseConfig['production']['hostname'] =  '';
      $databaseConfig['production']['username'] =  '';
      $databaseConfig['production']['password'] =  '';
      $databaseConfig['production']['database'] =  'BD_PORTAL_NCA';
      $databaseConfig['production']['dbdriver'] =  'pdo_mysql';
      $databaseConfig['production']['charset'] =  'utf8';
      
      // Ambiente de Teste
      $databaseConfig['test']['hostname'] =  'localhost';
      $databaseConfig['test']['username'] =  'root';
      $databaseConfig['test']['password'] =  '123456';
      $databaseConfig['test']['database'] =  'BD_PORTAL_NCA';
      $databaseConfig['test']['dbdriver'] =  'pdo_mysql';
      $databaseConfig['test']['charset'] =  'utf8';
      
      // Ambiente de Homologacao
      $databaseConfig['homolog']['hostname'] =  '';
      $databaseConfig['homolog']['username'] =  '';
      $databaseConfig['homolog']['password'] =  '';
      $databaseConfig['homolog']['database'] =  '';
      $databaseConfig['homolog']['dbdriver'] =  'pdo_mysql';
      $databaseConfig['homolog']['charset'] =  'utf8';
      
      return $databaseConfig;
  }
    
}
