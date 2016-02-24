<?php
namespace LabManager\Bean;
use Doctrine\ORM\Mapping as ORM;

/**
 * Description of NoticiaProjeto
 *
 * @author Lázaro Henrique <lazarohcm@gmail.com>
 * @version string
 */

/**
 * @ORM\Table(name="NOTICIA_PROJETO")
 * @ORM\Entity()
 */
class NoticiaProjeto {
    /**
     * @ORM\Column(type="bigint", unique=true, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @var type 
     */
    private $id;
     /**
     * @ORM\OneToOne(targetEntity="Noticia", inversedBy="projeto", cascade={"persist"}, fetch="EAGER")
     * @ORM\JoinColumn(name="noticia_id", referencedColumnName="id")
     */
    private $noticia_id;
    
    /**
     * @ORM\ManyToOne(targetEntity="Projeto", inversedBy="noticiaProjeto", cascade={"persist"},fetch="EAGER")
     * @ORM\JoinColumn(name="projeto_id", referencedColumnName="id")
     */
    private $projeto_id;
    
    function __construct($id = NULL, $noticia_id = NULL, $projeto = NULL) {
        $this->id = $id;
        $this->noticia_id = $noticia_id;
        $this->projeto_id = $projeto;
    }
    
    function getId() {
        return $this->id;
    }

    function getNoticia() {
        return $this->noticia_id;
    }

    function getProjeto() {
        return $this->projeto_id;
    }

    function setId(type $id) {
        $this->id = $id;
    }

    function setNoticia($noticia_id) {
        $this->noticia_id = $noticia_id;
    }

    function setProjeto($projeto) {
        $this->projeto_id = $projeto;
    }



}
