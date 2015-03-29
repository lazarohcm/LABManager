<?php
namespace LabManager\Bean;

/**
 * Description of Projeto
 *
 * @author Lázaro Henrique <lazarohcm@gmail.com>
 * @version string
 */
use Doctrine\ORM\Mapping as ORM;
use \Doctrine\Common\Collections\ArrayCollection;
/**
 * @ORM\Table(name="PROJETO")
 * @ORM\Entity()
 */
class Projeto {
    
    /**
     * @ORM\Column(type="bigint", unique=true, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @var type 
     */
    private $id;
    
    /**
     * @ORM\Column(type="string", length=300, nullable=false)
     */
    private $nome;
    
    /**
     * @ORM\Column(type="datetime", nullable=false) 
     */
    private $data_inicio;
    
    /**
     * @ORM\Column(type="datetime") 
     */
    private $data_termino;
    
    /**
     * @ORM\Column(type="blob", nullable=false)
     */
    private $imagem;
    
    /**
     * @ORM\Column(type="text", nullable=false)
     */
    private $texto;
    
    /**
     *
     * @ORM\ManyToOne(targetEntity="Membro", inversedBy="chefeProjeto", cascade={"persist", "merge", "detach"}, fetch="EAGER")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="coordenador_id", referencedColumnName="id")
     * })
     */
    private $coordenador;
    
    /**
     *
     * @ORM\ManyToOne(targetEntity="Laboratorio", inversedBy="projeto", cascade={"persist", "merge", "detach"}, fetch="EAGER")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="laboratorio_id", referencedColumnName="id")
     * })
     */
    private $laboratorio;
    
    /**
     * Propriedade privada
     * @var ArrayCollection
     * @ORM\OneToMany(targetEntity="MembroProjeto", mappedBy="membro", cascade={"all"})
     *  
     */
    private $membro_projeto;
    
    /**
     * Propriedade privada
     * @var ArrayCollection
     * @ORM\OneToMany(targetEntity="NoticiaProjeto", mappedBy="projeto_id", cascade={"all"})
     *  
     */
    private $noticiaProjeto;
    
    function __construct($id = NULL, $nome = NULL, $data_inicio = NULL, $data_termino = NULL, $imagem = NULL, $texto = NULL) {
        $this->id = $id;
        $this->nome = $nome;
        $this->data_inicio = $data_inicio;
        $this->data_termino = $data_termino;
        $this->imagem = $imagem;
        $this->texto = $texto;
        
        $this->membro_projeto = new ArrayCollection();
        $this->noticiaProjeto = new ArrayCollection();
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

    function getData_inicio() {
        return $this->data_inicio;
    }

    function getData_termino() {
        return $this->data_termino;
    }

    function getImagem() {
        return $this->imagem;
    }

    function getTexto() {
        return $this->texto;
    }

    function getCoordenador() {
        return $this->coordenador;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setData_inicio($data_inicio) {
        $this->data_inicio = $data_inicio;
    }

    function setData_termino($data_termino) {
        $this->data_termino = $data_termino;
    }

    function setImagem($imagem) {
        $this->imagem = $imagem;
    }

    function setTexto($texto) {
        $this->texto = $texto;
    }

    function setCoordenador($coordenador) {
        $this->coordenador = $coordenador;
    }
    
    function getLaboratorio() {
        return $this->laboratorio;
    }

    function setLaboratorio($laboratorio) {
        $this->laboratorio = $laboratorio;
    }
    
    function getMembroProjeto() {
        return $this->membro_projeto;
    }

    function setMembroProjeto(MembroProjeto $membro_projeto) {
        $membro_projeto->setMembro($this);
        $this->membro_projeto->add($membro_projeto);
    }
    
    function getNoticiaProjeto() {
        return $this->noticiaProjeto;
    }

    function setNoticiaProjeto($noticiaProjeto) {
        $noticiaProjeto->setProjeto($this);
        $this->noticiaProjeto->add($noticiaProjeto);
    }


}
