<?php
namespace LabManager\Bean;

/**
 * Description of Publicacao
 *
 * @author Lázaro Henrique <lazarohcm@gmail.com>
 * @version string
 */
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="PUBLICACAO")
 * @ORM\Entity()
 */
class Publicacao {
    
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
    private $titulo;
    
    /**
     * @ORM\Column(type="datetime")
     */
    private $data;
    
    /**
     * @ORM\Column(type="string", length=500)
     */
    private $linkDownload;
    
    /**
     * @ORM\Column(type="blob")
     */
    private $arquivo;
    
    /**
     * @ORM\Column(type="string", length=1000)
     */
    private $autores;
    
    /**
     * @ORM\Column(type="blob")
     */
    private $imagem;
    
    /**
     *
     * @ORM\ManyToOne(targetEntity="Projeto", inversedBy="publicacao", cascade={"persist"}, fetch="EAGER")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="projeto_id", referencedColumnName="id")
     * })
     */
    private $projeto_id;
    
    function __construct($id = NULL, $titulo = NULL, $data = NULL, $linkDownload = NULL, 
            $arquivo = NULL, $autores = NULL, $imagem = NULL) {
        $this->id = $id;
        $this->titulo = $titulo;
        $this->data = $data;
        $this->linkDownload = $linkDownload;
        $this->arquivo = $arquivo;
        $this->autores = $autores;
        $this->imagem = $imagem;
        $this->projeto_id = new Projeto();
    }
    
    function getId() {
        return $this->id;
    }

    function getTitulo() {
        return $this->titulo;
    }

    function getData() {
        return $this->data;
    }

    function getLinkDownload() {
        return $this->linkDownload;
    }

    function getArquivo() {
        return $this->arquivo;
    }

    function getAutores() {
        return $this->autores;
    }

    function getImagem() {
        return $this->imagem;
    }

    function getProjeto() {
        return $this->projeto_id;
    }

    function setId(type $id) {
        $this->id = $id;
    }

    function setTitulo($titulo) {
        $this->titulo = $titulo;
    }

    function setData($data) {
        $this->data = $data;
    }

    function setLinkDownload($linkDownload) {
        $this->linkDownload = $linkDownload;
    }

    function setArquivo($arquivo) {
        $this->arquivo = $arquivo;
    }

    function setAutores($autores) {
        $this->autores = $autores;
    }

    function setImagem($imagem) {
        $this->imagem = $imagem;
    }

    function setProjeto($projeto_id) {
        $this->projeto_id = $projeto_id;
    }



    
}
