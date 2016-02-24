<?php

namespace LabManager\Bean;

/**
 * Description of MembroProjeto
 *
 * @author Lázaro Henrique <lazarohcm@gmail.com>
 * @version string
 */
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="MEMBRO_PROJETO")
 * @ORM\Entity()
 */
class MembroProjeto {

    /**
     * @ORM\Column(type="bigint", unique=true, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @var type 
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="Membro", inversedBy="membro_projeto", cascade={"persist"},fetch="EAGER")
     * @ORM\JoinColumn(name="membro_id", referencedColumnName="id")
     * @var type 
     */
    private $membro;

    /**
     * @ORM\ManyToOne(targetEntity="Projeto", inversedBy="membro_projeto", cascade={"persist"},fetch="EAGER")
     * @ORM\JoinColumn(name="projeto_id", referencedColumnName="id")
     * @var type 
     */
    private $projeto;

    function __construct($id = NULL, $membro = NULL, $projeto = NULL) {
        $this->id = $id;
        $this->membro = $membro;
        $this->projeto = $projeto;
    }

    function getId() {
        return $this->id;
    }

    function getMembro() {
        return $this->membro;
    }

    function getProjeto() {
        return $this->projeto;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setMembro($membro) {
        $this->membro = $membro;
    }

    function setProjeto($projeto) {
        $this->projeto = $projeto;
    }

}
