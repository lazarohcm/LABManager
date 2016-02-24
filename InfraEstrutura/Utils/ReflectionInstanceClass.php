<?php
/**
 * UFMA - LabManager 

 * @author Lázaro Henrique <lazarohcm@gmail.com>   
 * @version 1.0
 
 */

namespace InfraEstrutura\Utils;

/**
 * Classe de Reflection
 *
 * @package InfraEstrutura\Utils
 */
class ReflectionInstanceClass {

    /**
     * Faz a reflexao da classe, a partir de um nome, e retorna um objeto
     * @param  string $className nome da classe
     * @return object            objeto gerado a partir da reflection
     */
    public static function instanceClass($className) {
        if (!class_exists($className))
            throw new \Exception("Classe não encontrada.");

        $objeto = new \ReflectionClass($className);
        return $objeto->newInstance();
    }

    /**
     * Class casting
     * 
     * @param string|object $destination
     * @param array $sourceArray
     * @return object
     */
    function cast($destination, array $sourceArray) {
        $sourceObject = json_decode(json_encode($sourceArray));
        if (is_string($destination)) {
            $destination = new $destination();
        }
        $sourceReflection = new \ReflectionObject($sourceObject);
        $destinationReflection = new \ReflectionObject($destination);
        $sourceProperties = $sourceReflection->getProperties();
        foreach ($sourceProperties as $sourceProperty) {
            $sourceProperty->setAccessible(true);
            $name = $sourceProperty->getName();
            $value = $sourceProperty->getValue($sourceObject);
            if ($destinationReflection->hasProperty($name)) {
                $propDest = $destinationReflection->getProperty($name);
                $propDest->setAccessible(true);
                $propDest->setValue($destination, $value);
            } else {
                $destination->$name = $value;
            }
        }
        return $destination;
    }
}