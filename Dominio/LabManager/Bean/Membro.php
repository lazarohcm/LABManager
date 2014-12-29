<?php
namespace LabManager\Bean;
use Doctrine\ORM\Mappingas as ORM;
use Doctrine\Common\Collections\ArrayCollection;
/**
 * Description of Membro
 *
 * @author Lázaro Henrique <lazarohcm@gmail.com>
 * @version string
 */

/**
 * @ORM\Table(name="MEMBRO")
 * @Entity(repositoryClass="MEMBRO")
 */
class Membro {
    
    /**
     * @Column(type="bigint", unique=true, nullable=false)
     * @var type 
     */
    private $id;
    
    /**
     * @ManyToMany(targetEntity="Laboratorio", mappedBy="laboratorio")
     * @var type 
     */
    private $laboratorio;
    
    /**
     *@Column(type="string", length=100, nullable=false)
     * @var type 
     */
    private $nome;
    
    /**
     * @Column(type="boolean", nullable=false)
     * @var type 
     */
    private $ativo;
    
    /**
     * @Column(type="string", length=32, nullable=false)
     * @var type 
     */
    private $tipo;
    
    /**
     * @Column(type="string", length=45, unique=true)
     * @var type 
     */
    private $email;
    
    /**
     * @Column(type="string", length=45)
     * @var type 
     */
    private $telefone;
    
    /**
     *@Column(type="string", length=50)
     * @var type 
     */
    private $facebook;
    
    /**
     * @Column(type="string", length=50)
     * @var type 
     */
    private $twitter;
    
    /**
     * @Column(type="string", length=50)
     * @var type 
     */
    private $linkdl;
    
    /**
     * @Column(type="date", nullable=false)
     * @var type 
     */
    private $data_entrada;
    
    /**
     * @Column(type="date", nullable=false)
     * @var type 
     */
    private $data_saida;
    
    /**
     * @Column(type="text")
     * @var type 
     */
    private $biografia;
    
    /**
     * @Column(type="string", length=300)
     * @var type 
     */
    private $area_interesse;
    
    /**
     * @Column(type="boolean", nullable=false)
     * @var type 
     */
    private $admin;
    
    /**
     * @Column(type="string", length=45)
     * @var type 
     */
    private $senha;
    
    /**
     * @Column(type="string", length=45)
     * @var type 
     */
    private $usuario;
    
    /**
     * @Column(type="string", length=45, nullable=false)
     * @var type 
     */
    private $lattes;
    
    /**
     * @Column(type="blob")
     * @var type 
     */
    private $foto;
    
    function __construct($id = NULL ,$laboratorio = NULL ,$nome = NULL ,$ativo = NULL ,$tipo = NULL ,$email = NULL ,$telefone = NULL ,
            $facebook = NULL ,$twitter = NULL ,$linkdl = NULL ,$data_entrada = NULL ,$data_saida = NULL ,$biografia = NULL ,
            $area_interesse = NULL ,$admin = NULL ,$senha = NULL ,$usuario = NULL ,$lattes = NULL ,$foto = NULL ) {
        $this->id = $id;
        $this->laboratorio = new ArrayCollection();
        $this->nome = $nome;
        $this->ativo = $ativo;
        $this->tipo = $tipo;
        $this->email = $email;
        $this->telefone = $telefone;
        $this->facebook = $facebook;
        $this->twitter = $twitter;
        $this->linkdl = $linkdl;
        $this->data_entrada = $data_entrada;
        $this->data_saida = $data_saida;
        $this->biografia = $biografia;
        $this->area_interesse = $area_interesse;
        $this->admin = $admin;
        $this->senha = $senha;
        $this->usuario = $usuario;
        $this->lattes = $lattes;
        $this->foto = $foto;
    }
    
    function getId() {
        return $this->id;
    }

    function getLaboratorio() {
        return $this->laboratorio;
    }

    function getNome() {
        return $this->nome;
    }

    function getAtivo() {
        return $this->ativo;
    }

    function getTipo() {
        return $this->tipo;
    }

    function getEmail() {
        return $this->email;
    }

    function getTelefone() {
        return $this->telefone;
    }

    function getFacebook() {
        return $this->facebook;
    }

    function getTwitter() {
        return $this->twitter;
    }

    function getLinkdl() {
        return $this->linkdl;
    }

    function getData_entrada() {
        return $this->data_entrada;
    }

    function getData_saida() {
        return $this->data_saida;
    }

    function getBiografia() {
        return $this->biografia;
    }

    function getArea_interesse() {
        return $this->area_interesse;
    }

    function getAdmin() {
        return $this->admin;
    }

    function getSenha() {
        return $this->senha;
    }

    function getUsuario() {
        return $this->usuario;
    }

    function getLattes() {
        return $this->lattes;
    }

    function getFoto() {
        return $this->foto;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setLaboratorio($laboratorio) {
        $this->laboratorio = $laboratorio;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setAtivo($ativo) {
        $this->ativo = $ativo;
    }

    function setTipo($tipo) {
        $this->tipo = $tipo;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setTelefone($telefone) {
        $this->telefone = $telefone;
    }

    function setFacebook($facebook) {
        $this->facebook = $facebook;
    }

    function setTwitter($twitter) {
        $this->twitter = $twitter;
    }

    function setLinkdl($linkdl) {
        $this->linkdl = $linkdl;
    }

    function setData_entrada($data_entrada) {
        $this->data_entrada = $data_entrada;
    }

    function setData_saida($data_saida) {
        $this->data_saida = $data_saida;
    }

    function setBiografia($biografia) {
        $this->biografia = $biografia;
    }

    function setArea_interesse($area_interesse) {
        $this->area_interesse = $area_interesse;
    }

    function setAdmin($admin) {
        $this->admin = $admin;
    }

    function setSenha($senha) {
        $this->senha = $senha;
    }

    function setUsuario($usuario) {
        $this->usuario = $usuario;
    }

    function setLattes($lattes) {
        $this->lattes = $lattes;
    }

    function setFoto($foto) {
        $this->foto = $foto;
    }


}