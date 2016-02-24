<?php

/**
 * Description of Laboratorio
 *
 * @author Lázaro Henrique <lazarohcm@gmail.com>
 */

namespace LabManager\Bean;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Table(name="LABORATORIO")
 * @ORM\Entity()
 */
class Laboratorio {

    /**
     * @ORM\Column(type="bigint", unique=true, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @var type 
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=45, nullable=false)
     * @var type 
     */
    private $nome;

    /**
     * @ORM\Column(type="text")
     * @var type 
     */
    private $descricao;

    /**
     * @ORM\Column(type="string", length=45)
     * @var type 
     */
    private $telefone;
    
    /**
     * @ORM\Column(type="string", length=45)
     */
    private $sigla;

    /**
     * @ORM\Column(type="blob")
     */
    private $capa;

    /**
     * Propriedade privada
     * @var ArrayCollection
     * @ORM\OneToMany(targetEntity="Membro", mappedBy="laboratorio", cascade={"all"}, orphanRemoval=true, fetch="LAZY") 
     */
    private $membro;

    /**
     * @var ArrayCollection
     * @ORM\OneToMany(targetEntity="Projeto", mappedBy="laboratorio", cascade={"all"}, orphanRemoval=true, fetch="LAZY") 
     */
    private $projeto;

    /**
     * @var ArrayCollection
     * @ORM\OneToMany(targetEntity="NoticiaLaboratorio", mappedBy="laboratorio_id", cascade={"all"}, orphanRemoval=true, fetch="LAZY") 
     */
    private $noticia;

    function __construct($id = NULL, $nome = NULL, $descricao = NULL, $telefone = NULL, $capa = NULL, $sigla = NULL) {
        $this->id = $id;
        $this->nome = $nome;
        $this->descricao = $descricao;
        $this->telefone = $telefone;
        $this->capa = $capa;
        $this->sigla = NULL;
        $this->membro = new ArrayCollection();
        $this->projeto = new ArrayCollection();
        $this->noticia = new ArrayCollection();
    }

    public function __toString() {
        return "Nome: " . $this->getNome() . "\n";
    }

    function getId() {
        return $this->id;
    }

    function getNome() {
        return $this->nome;
    }

    function getDescricao() {
        return $this->descricao;
    }

    function getTelefone() {
        return $this->telefone;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

    function setTelefone($telefone) {
        $this->telefone = $telefone;
    }
    
    function getSigla() {
        return $this->sigla;
    }

    function setSigla($sigla) {
        $this->sigla = $sigla;
    }

    
    function getMembro() {
        return $this->membro;
    }

    function setMembro(Membro $membro) {
        $membro->setFuncionario($this);
        $this->membro->add($membro);
    }

    function getProjeto() {
        return $this->projeto;
    }

    function setProjeto(Projeto $projeto) {
        $projeto->setLaboratorio($this);
        $this->projeto->add($projeto);
    }

    function getCapa() {
        return $this->capa;
    }

    function setCapa($capa) {
        $this->capa = $capa;
    }

    function getNoticia() {
        return $this->noticia;
    }

    function setNoticia(ArrayCollection $noticia) {
        $this->noticia = $noticia;
    }

}
