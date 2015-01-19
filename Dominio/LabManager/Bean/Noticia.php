<?php

namespace LabManager\Bean;

use Doctrine\ORM\Mapping as ORM;
/**
 * Description of Noticia
 *
 * @author Lázaro Henrique <lazarohcm@gmail.com>
 * @version string
 */

/**
 * @ORM\Table(name="NOTICIA")
 * @ORM\Entity()
 */
class Noticia {
    
    /**
     * @ORM\Column(type="bigint", unique=true, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @var type 
     */
    private $id;
    
    /**
     * @ORM\Column(type="string", length=300, nullable=false)
     * @var type 
     */
    private $titulo;
    
    /**
     * @ORM\Column(type="text", nullable=false)
     * @var type 
     */
    private $texto;
    
    /**
     * @ORM\Column(type="blob")
     * @var type 
     */
    private $capa;
    
    /**
     * @ORM\Column(type="datetime")
     * 
     */
    private $data;
    
    function __construct($id = NULL, $titulo = NULL, $texto = NULL, $capa = NULL, $data = NULL) {
        $this->id = $id;
        $this->titulo = $titulo;
        $this->texto = $texto;
        $this->capa = $capa;
        $this->data = $data;
    }
    
    function getId() {
        return $this->id;
    }

    function getTitulo() {
        return $this->titulo;
    }

    function getTexto() {
        return $this->texto;
    }

    function getCapa() {
        return $this->capa;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setTitulo($titulo) {
        $this->titulo = $titulo;
    }

    function setTexto($texto) {
        $this->texto = $texto;
    }

    function setCapa($capa) {
        $this->capa = $capa;
    }
    
    function getData() {
        return $this->data;
    }

    function setData($data) {
        $this->data = $data;
    }


    
}
