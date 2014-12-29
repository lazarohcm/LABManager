<?php
/**
 * UFMA - LabManager 

 * @author Lázaro Henrique <lazarohcm@gmail.com>   
 * @version 1.0
 
 */

namespace InfraEstrutura\BancodeDados\FabricaConexao;

use \InfraEstrutura\BancodeDados\FabricaConexao\AbstractFabricaConexao;
use \InfraEstrutura\BancodeDados\AtributosConexao;
use \InfraEstrutura\Exception\InfraEstruturaException;
use \InfraEstrutura\Utils\Constantes;
use \Doctrine\ORM\Tools\Setup;
use \Doctrine\ORM\EntityManager;
use Doctrine\Common\Annotations\AnnotationRegistry;

/**
 * Fabrica conexão do tipo Framework Doctrine2
 * 
 * @package InfraEstrutura\BancodeDados\FabricaConexao
 */
class FabricaConexaoDoctrine extends AbstractFabricaConexao  {

    /**
     * Fábrica que cria a conexão com o banco de dados.
     * 
     * @param AtributosConexao $configuracoes
     * @return EntityManager Conexão de acesso ao banco de dados
     * @throws Exception
     */
    public function criarConexao(AtributosConexao $configuracoes) {
        
        $config = Setup::createConfiguration(FALSE);
        $config->setAutoGenerateProxyClasses(TRUE);
        $config->setProxyDir(CAMINHO_APLICACAO_DOMINIO . DIRECTORY_SEPARATOR . "tmp" . DIRECTORY_SEPARATOR);
        
        $driver = new \Doctrine\ORM\Mapping\Driver\AnnotationDriver(new \Doctrine\Common\Annotations\AnnotationReader(), array($configuracoes->getPath_model()));
        $config->setMetadataDriverImpl($driver);
        
        AnnotationRegistry::registerFile(CAMINHO_APLICACAO_DOMINIO . '/vendor/doctrine/orm/lib/Doctrine/ORM/Mapping/Driver/DoctrineAnnotations.php');

        $arrayConfigConnection = array(
            'dbname' => $configuracoes->getDbname(),
            'user' => $configuracoes->getUser(),
            'password' => $configuracoes->getPassword(),
            'host' => $configuracoes->getHost(),
            'driver' => $configuracoes->getDbdriver(),
            'charset' => $configuracoes->getCharset(),
        );

        try {            
            $entityManager = EntityManager::create($arrayConfigConnection, $config);
            
            $entityManager->getConnection()->connect();
                                            
            return $entityManager;
        } catch (\Doctrine\ORM\ORMException $exc) {
            throw new InfraEstruturaException("Erro ao abrir conexão com banco de dados.", $exc->getCode());
        } catch (\InvalidArgumentException $exc){
            throw new InfraEstruturaException("Erro ao abrir conexão com banco de dados.", $exc->getCode());
        } catch (\Exception $exc) {
            throw new InfraEstruturaException("Erro ao abrir conexão com banco de dados.", $exc->getCode());
        }
    }

}