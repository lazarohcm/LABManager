<?php
/**
 * UFMA - LabManager 

 * @author Lázaro Henrique <lazarohcm@gmail.com>   
 * @version 1.0
 
 */

namespace InfraEstrutura\Utils;

use JsonSchema\Uri\UriRetriever;
use JsonSchema\Validator;

/**
 * Validador de schema JSON
 *
 * @package InfraEstrutura\Utils
 */
class JsonSchemaValidator {

    /**
     * Propriedade privada
     * @var $uriRetriever
     */
    private $uriRetriever;

    /**
     * Propriedade privada
     * @var $validatorJson
     */
    private $validatorJson;

    /**
     * Propriedade privada
     * @var $arrayErros
     */
    private $arrayErros;
    
    /**
     * Inicializacao de objetos para uso interno na classe
     */
    function __construct() {
        $this->uriRetriever = new UriRetriever();
        $this->validatorJson = new Validator();
    }
    
    /**
     * Realiza a validacao do JSON
     * @param  $uriSchema 
     * @param  $jsonLoaded
     * @return boolean
     */
    public function isValid($uriSchema, $jsonLoaded) {        
        $schema = $this->uriRetriever->retrieve($uriSchema);
        $dataArray = json_decode($jsonLoaded);
               
        $this->validatorJson->check($dataArray, $schema);
        $this->arrayErros = $this->validatorJson->getErrors();
        
        return $this->validatorJson->isValid();
    }
    
    /**
     * Retorna array de erros
     * @return array $arrayErros
     */
    public function getErros() {
        return $this->arrayErros;
    }
}
