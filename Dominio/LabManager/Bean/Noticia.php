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
    private $imagem;
    
    function __construct($id = NULL, $titulo = NULL, $text = NULL, $imagem = NULL) {
        $this->id = $id;
        $this->titulo = $titulo;
        $this->texto = $text;
        $this->imagem = $imagem;
    }
    
    function getId() {
        return $this->id;
    }

    function getTitulo() {
        return $this->titulo;
    }

    function getText() {
        return $this->text;
    }

    function getImagem() {
        return $this->imagem;
    }

    function setId(type $id) {
        $this->id = $id;
    }

    function setTitulo(type $titulo) {
        $this->titulo = $titulo;
    }

    function setText(type $text) {
        $this->text = $text;
    }

    function setImagem(type $imagem) {
        $this->imagem = $imagem;
    }



    
    
}
