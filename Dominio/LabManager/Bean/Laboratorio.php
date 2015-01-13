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
     * Propriedade privada
     * @var ArrayCollection
     * @ORM\OneToMany(targetEntity="Membro", mappedBy="laboratorio", cascade={"all"}, orphanRemoval=true, fetch="LAZY") 
     */
    private $membro;
    
    function __construct($id = NULL,$nome = NULL,$descricao = NULL,$telefone = NULL) {
        $this->id = $id;
        $this->nome = $nome;
        $this->descricao = $descricao;
        $this->telefone = $telefone;
        $this->membro = new ArrayCollection();
    }
    
    public function __toString() {
        return "Nome: ".$this->getNome()."\n";
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
    
    function getMembro() {
        return $this->membro;
    }

    function setMembro(ArrayCollection $membro) {
        $membro->setFuncionario($this);
        $this->membro->add($membro);
    }



    
    
}
